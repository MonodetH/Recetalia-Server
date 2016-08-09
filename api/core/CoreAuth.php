<?php
	#
	# CoreAuth class file
	# Asistente de autenticacion
	#
	
	class CoreAuth{
		/*
		 * Esta clase es la encargada de comprobar si un cliente tiene 
		 * los permisos para realizar ciertas operaciones
		 * Por ejemplo: deberia denegar el permiso de un usuario para 
		 * modificar las preferencias de otro usuario 
		 *
		 * Las principales funciones que debe tener son de validacion
		 * como "hasPermitions()", "getUser($token)", etc 
		 */


		/*
		*/
		private static function getUser(){
		}
		

		/*
		 *Funcion encargada de verificar si un usuario posee los permisos necesarios para poder modificar una receta
		 *Para ello, se comprueba si su nombre de usuario corresponde con el nombre del usuario que creo la receta
		 *O en su defecto, si quien desea modificar algo es un administrador
		*/
		public static function hasPermitions(){
			$name = CoreAuth::getUser();
			//Solicitar a la BD el ID del creador de la receta

			if($name === $author){
				return TRUE;
			}
			return FALSE;
		}
	}


?>