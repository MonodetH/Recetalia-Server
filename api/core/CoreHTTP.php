<?
	#
	# CoreHTTP class file
	# Asistente de HTTP. 
	#
	
	class CoreAuth{
		/*
		 * Esta clase es en realidad una libreria que contiene todas
		 * las funciones referentes a HTTP, como lo son las necesarias 
		 * para leer una peticion, obtener cabeceras y escribir una respuesta
		 * por parte del servidor
		 */

		# Redirector (Mediante cabecera HTTP)
		public static function redirect($redir){
			header('Location:'.$redir);
		}

	}




?>