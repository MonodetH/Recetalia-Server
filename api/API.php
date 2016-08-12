<?php
	#
	# Constructor de la API
	# Carga configuracion, incluye librerias y 
	#
	
	class API{
		
		# seteo inicial
		public function __construct(){
			
			// Recuperar datos de sesion
			// session_start();

			# Incluir Config. Clase que contiene un conjunto de datos de configuracion
			include_once(API_PATH.'Config.php');

			# Incluir librerias CORE. 
			spl_autoload_register(function ($coreClass){
				if(is_file(API_PATH.'core/'.$coreClass.'.php'))
				include_once(API_PATH.'core/'.$coreClass.'.php');
			},false);
			
			# Incluir MODELS. 
			spl_autoload_register(function ($modelClass){
				if(is_file(API_PATH.'models/'.$modelClass.'.php'))
				include_once(API_PATH.'models/'.$modelClass.'.php');
			},false);

			# Incluir CONTROLLERS. 
			spl_autoload_register(function ($controllerClass){
				if(is_file(API_PATH.'controllers/'.$controllerClass.'.php'))
				include_once(API_PATH.'controllers/'.$controllerClass.'.php');
			});

		}		
		
		# Punto de partida de la aplicacion
		public function run(){
			// Se recupera los datos desde la url
			$url = CoreHTTP::getApiCall();

			#######################
			###### TEST ZONE ######
			/*

			print_r($url);

			//MUsuario::insertar(array("username"=>"will smith","rank"=>11));
			
			CoreHTTP::setStatusCode(204); // TEST. Setear el codigo de status de la respuesta a 204

			// Imprimir como respuesta los datos de la llamada
			echo "CALL:<br>";
			CoreHTTP::encodeResponse($_SERVER);

			//Se entrega el idioma del usuario
			echo '<br>User Language: '.CoreHTTP::getLocale().'<br>';

			*/
			#### END TEST ZONE ####
			#######################

			// Redireccionar a controlador
			if(isset($url['controller'])){
				$controller = new $url['controller']($url);
				$controller->run();
			}else{
				// Mostrar documentacion y llamadas de la api
				echo "Mostrar documentacion y llamadas de la api";
			}

		}

	}
?>