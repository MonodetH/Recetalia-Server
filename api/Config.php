<?php 
	
	#
	# Config class file
	# configuraciones flags y rutas
	#

	class Config{

		public static $route = array(
			'Controller' => array(
				'inicio' => 'Inicio.php',
				'Inicio' => 'Inicio.php'
				)
		);

		
		public static $locale = 'es-CL';

		public static $config = array(
			/* Datos de base de datos */
			'DB' => array(
				'server' => 'localhost',
				'db' => 'Recetalia',
				'user' => 'root',
				'password' => ''
				)
		);

	}
?>
