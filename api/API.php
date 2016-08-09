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
				include_once(API_PATH.'core/'.$coreClass.'.php');
			});
			
			# Incluir MODELS. 
			spl_autoload_register(function ($coreClass){
				include_once(API_PATH.'models/'.$coreClass.'.php');
			});

		}		
		
		#punto de partida de la aplicacion
		public function run(){
			
			$url = CoreUrlManager::getUrl();
			
			//print_r($url);
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