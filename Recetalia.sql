SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS Recetalia DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE Recetalia;

CREATE TABLE Account (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Account_Locale (
  `id_account` bigint(20) UNSIGNED NOT NULL,
  `id_locale` bigint(20) UNSIGNED NOT NULL,
  `traduccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Comment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_recipe` bigint(20) UNSIGNED NOT NULL,
  `comentario` text NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Ingredient (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Ingredient_Locale (
  `id_ingredient` bigint(20) UNSIGNED NOT NULL,
  `id_locale` bigint(20) UNSIGNED NOT NULL,
  `traduccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Locale (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `codigo` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Rank (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Rank_Locale (
  `id_rank` bigint(20) UNSIGNED NOT NULL,
  `id_locale` bigint(20) UNSIGNED NOT NULL,
  `traduccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Rate (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_recipe` bigint(20) UNSIGNED NOT NULL,
  `calificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Recipe (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_autor` bigint(20) UNSIGNED NOT NULL,
  `id_locale` bigint(20) UNSIGNED NOT NULL,
  `porciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Recipe_Ingredient (
  `id_recipe` bigint(20) UNSIGNED NOT NULL,
  `id_ingredient` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `opcional` tinyint(4) NOT NULL DEFAULT '0',
  `id_sustituto` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Recipe_Tag (
  `id_recipe` bigint(20) UNSIGNED NOT NULL,
  `id_tag` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Step (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_recipe` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(120) NOT NULL,
  `duracion` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `opcional` tinyint(4) NOT NULL DEFAULT '0',
  `orden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Tag (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` int(11) NOT NULL,
  `categoria` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Tag_Locale (
  `id_tag` bigint(20) UNSIGNED NOT NULL,
  `id_locale` bigint(20) UNSIGNED NOT NULL,
  `traduccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `User` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rank` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE User_Account (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_account` bigint(20) UNSIGNED NOT NULL,
  `expiracion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE User_Ingredient (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_ingredient` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `Account`
  ADD PRIMARY KEY (`id`);

ALTER TABLE Account_Locale
  ADD PRIMARY KEY (`id_account`,`id_locale`),
  ADD KEY `id_locale` (`id_locale`);

ALTER TABLE `Comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fecha` (`fecha`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_recipe` (`id_recipe`);

ALTER TABLE Ingredient
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombre` (`nombre`);

ALTER TABLE Ingredient_Locale
  ADD PRIMARY KEY (`id_ingredient`,`id_locale`),
  ADD KEY `id_locale` (`id_locale`);

ALTER TABLE Locale
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

ALTER TABLE Rank
  ADD PRIMARY KEY (`id`);

ALTER TABLE Rank_Locale
  ADD PRIMARY KEY (`id_rank`,`id_locale`),
  ADD KEY `id_locale` (`id_locale`);

ALTER TABLE Rate
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_recipe` (`id_recipe`);

ALTER TABLE Recipe
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_autor` (`id_autor`),
  ADD KEY `id_locale` (`id_locale`);

ALTER TABLE Recipe_Ingredient
  ADD PRIMARY KEY (`id_recipe`,`id_ingredient`),
  ADD KEY `id_sustituto` (`id_sustituto`),
  ADD KEY `opcional` (`opcional`),
  ADD KEY `id_ingredient` (`id_ingredient`);

ALTER TABLE Recipe_Tag
  ADD PRIMARY KEY (`id_recipe`,`id_tag`),
  ADD KEY `id_tag` (`id_tag`);

ALTER TABLE Step
  ADD PRIMARY KEY (`id`),
  ADD KEY `orden` (`orden`),
  ADD KEY `id_recipe` (`id_recipe`);

ALTER TABLE Tag
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria` (`categoria`),
  ADD KEY `nombre` (`nombre`);

ALTER TABLE Tag_Locale
  ADD PRIMARY KEY (`id_tag`,`id_locale`),
  ADD KEY `id_locale` (`id_locale`);

ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `rank` (`rank`);

ALTER TABLE User_Account
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_account` (`id_account`),
  ADD KEY `expiration` (`expiracion`);

ALTER TABLE User_Ingredient
  ADD PRIMARY KEY (`id_user`,`id_ingredient`),
  ADD KEY `id_ingredient` (`id_ingredient`);


ALTER TABLE `Account`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `Comment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE Ingredient
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE Locale
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE Rank
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE Rate
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE Recipe
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE Step
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE Tag
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `User`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE User_Account
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE Account_Locale
  ADD CONSTRAINT `Account_Locale_ibfk_1` FOREIGN KEY (`id_locale`) REFERENCES `Locale` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Account_Locale_ibfk_2` FOREIGN KEY (`id_account`) REFERENCES Account (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Comment`
  ADD CONSTRAINT `Comment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `User` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Comment_ibfk_2` FOREIGN KEY (`id_recipe`) REFERENCES Recipe (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE Ingredient_Locale
  ADD CONSTRAINT `Ingredient_Locale_ibfk_1` FOREIGN KEY (`id_ingredient`) REFERENCES Ingredient (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Ingredient_Locale_ibfk_2` FOREIGN KEY (`id_locale`) REFERENCES `Locale` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE Rank_Locale
  ADD CONSTRAINT `Rank_Locale_ibfk_1` FOREIGN KEY (`id_rank`) REFERENCES Rank (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Rank_Locale_ibfk_2` FOREIGN KEY (`id_locale`) REFERENCES `Locale` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE Rate
  ADD CONSTRAINT `Rate_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `User` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE Recipe
  ADD CONSTRAINT `Recipe_ibfk_1` FOREIGN KEY (`id_locale`) REFERENCES `Locale` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Recipe_ibfk_2` FOREIGN KEY (`id_autor`) REFERENCES `User` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE Recipe_Ingredient
  ADD CONSTRAINT `Recipe_Ingredient_ibfk_1` FOREIGN KEY (`id_recipe`) REFERENCES Recipe (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Recipe_Ingredient_ibfk_2` FOREIGN KEY (`id_ingredient`) REFERENCES Ingredient (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE Recipe_Tag
  ADD CONSTRAINT `Recipe_Tag_ibfk_1` FOREIGN KEY (`id_recipe`) REFERENCES Recipe (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Recipe_Tag_ibfk_2` FOREIGN KEY (`id_tag`) REFERENCES Tag (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE Step
  ADD CONSTRAINT `Step_ibfk_1` FOREIGN KEY (`id_recipe`) REFERENCES Recipe (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE Tag_Locale
  ADD CONSTRAINT `Tag_Locale_ibfk_1` FOREIGN KEY (`id_tag`) REFERENCES Tag (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Tag_Locale_ibfk_2` FOREIGN KEY (`id_locale`) REFERENCES `Locale` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `User`
  ADD CONSTRAINT `User_ibfk_1` FOREIGN KEY (`rank`) REFERENCES Rank (`id`) ON UPDATE CASCADE;

ALTER TABLE User_Account
  ADD CONSTRAINT `User_Account_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES Account (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `User_Account_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `User` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE User_Ingredient
  ADD CONSTRAINT `User_Ingredient_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `User` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `User_Ingredient_ibfk_2` FOREIGN KEY (`id_ingredient`) REFERENCES Ingredient (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
