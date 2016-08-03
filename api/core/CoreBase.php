<?php 
	#
	# CoreBase class file
	# Asistente de operaciones fundamentales
	#
	
	class CoreBase{
		## Metodos estaticos

		# disparador de Controlador
		public static function runController($control = 'inicio',$request = 'render',$data = array()){

			$route = Config::$route['Controller'];
			$_SESSION['page']['current']= $control;

			//si existe el controlador lo incluyo
			if(isset($route[$control])){

				// Se llama al controlador
				include_once(WEB_PATH.'controllers/'.$route[$control]);
				$controller = new $control($request, $data);

			}else{
				echo '<h3>Controlador '.$control.' no existe</h3>';
			}
		}

		
	}
?>
