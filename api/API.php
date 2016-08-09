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
		
		#punto de partida de la aplicacion
		public function run(){
			
			$url = CoreHTTP::getApiCall();
			print_r($url);

			//MUsuario::insertar(array("username"=>"will smith","rank"=>11));
			
			CoreHTTP::setStatusCode(204); // TEST. Setear el codigo de status de la respuesta a 204

			// Imprimir como respuesta los datos de la llamada
			echo "CALL:<br>";
			CoreHTTP::encodeResponse($_SERVER);

			//Se entrega el idioma del usuario
			echo '<br>User Language: '.CoreHTTP::getLocale().'<br>';

			/*
			
			//redireccionar a controlador
			if(isset($url[0])){
				if(isset($url[1])){
					CoreBase::runController($url[0],$url[1]);
				}else{
					CoreBase::runController($url[0]);			
				}
			}else{
				CoreBase::runController();
			}

			*/
		}

	}
?>