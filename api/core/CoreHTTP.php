<?php
	#
	# CoreHTTP class file
	# Asistente de HTTP. 
	#
	
	class CoreHTTP{
		/*
		 * Esta clase es en realidad una libreria que contiene todas
		 * las funciones referentes a HTTP, como lo son las necesarias 
		 * para leer una peticion, obtener cabeceras y escribir una respuesta
		 * por parte del servidor
		 */

		//Agregar algo a HTTP 
		//Agregar funcion que recibe una peticion y encodea la respuesta en cierto formato (desde $_SERVER[HTTP_ACCEPT])

		/*Funcion que se encarga de dar formato a la respuesta por parte del servidor
		*Recibe texto en la variable $body
		*Dependiendo de lo que posea HTTP_ACCEPT da el formato
		*Imprime por pantalla, por lo que no necesita retorno
		*/
		public static function encodeResponse($body){
			if(isset($_SERVER["HTTP_ACCEPT"])){
				switch ($_SERVER["HTTP_ACCEPT"]){
					case "application/xml":
					//ARREGLAR
						/*$xml = new SimpleXMLElement('<root/>');
						array_walk_recursive($body, array ($xml,'addChild'));
						echo $xml->asXML();*/
						break;

					case "text/plain":
						print_r($body);
						break;

					default:
						echo json_encode($body);
						break;
				}
			}else{
				echo json_encode($body);
			}
			
		}

		/* setStatusCode
		 * Setea la cabecera HTTP principal de la respuesta con el protocolo http/1.1
		 * y un codigo de status.
		 * @param $code Un entero que contiene el codigo de status HTTP
		 * @return Nada
		 */
		public static function setStatusCode($code){
			if(array_key_exists($code, self::$_http_codes)){
				header("HTTP/1.1 ".$code." ".self::$_http_codes[$code]);
			}
		}

		# Redirector (Mediante cabecera HTTP)
		public static function redirect($redir){
			header('Location:'.$redir);
		}

		# Obtiene la URL de la llamada y la devuelve como array
		public static function getApiCall() {
			$param = array();
			$url = parse_url($_SERVER['REQUEST_URI']);

			foreach(explode("/", $url['path']) as $p){
				if ($p!='') {$param[] = $p;} 
			}

			$flag = 0;
			foreach($param as $value){
				switch ($flag) {
					case 1:
						$apiCall['controller'] = $value;
						$flag++;
						break;
					case 2:
						$apiCall['method'] = $value;
						$flag++;
						break;
					case 3:
						$apiCall['controller2'] = $value;
						$flag++;
						break;
					case 4:
						$apiCall['method2'] = $value;
						$flag++;
						break;
				}
				if($value == 'api') $flag = 1;
			} 

			foreach(explode("&", $url['query']) as $option){
				if ($option!='') {
					$option = explode("=", $option);
					if($option[0]!='' && isset($option[1]) && $option[1]!=''){
						foreach(explode(",", $option[1]) as $value){
							if ($value!='') {$apiCall['options'][$option[0]][] = $value;} 
						}
					}
				} 
			}

			return $apiCall;
		}

		# Devuelve un string que puede ser usado como url
		public static function encodeUrl($url){
			// Tranformamos todo a minusculas
			$url = strtolower($url);

			//Rememplazamos caracteres especiales latinos
			$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
			$repl = array('a', 'e', 'i', 'o', 'u', 'n');
			$url = str_replace ($find, $repl, $url);
			
			// Añadimos los guiones
			$find = array(' ', '&', '\r\n', '\n', '+'); 
			$url = str_replace ($find, '-', $url);

			// Eliminamos y Reemplazamos demás caracteres especiales
			$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
			$repl = array('', '-', '');
			$url = preg_replace ($find, $repl, $url);

			return $url;
		}

		/* Array asociativo de los codigos de estado de HTTP y su significado */
		protected static $_http_codes = array(
		    100 => 'Continue',
		    101 => 'Switching Protocols',
		    102 => 'Processing',
		    103 => 'Checkpoint',
		    200 => 'OK',
		    201 => 'Created',
		    202 => 'Accepted',
		    203 => 'Non-Authoritative Information',
		    204 => 'No Content',
		    205 => 'Reset Content',
		    206 => 'Partial Content',
		    207 => 'Multi-Status',
		    208 => 'Already Reported',
		    226 => 'IM Used',
		    300 => 'Multiple Choices',
		    301 => 'Moved Permanently',
		    302 => 'Found',
		    303 => 'See Other',
		    304 => 'Not Modified',
		    305 => 'Use Proxy',
		    306 => 'Switch Proxy',
		    307 => 'Temporary Redirect',
		    400 => 'Bad Request',
		    401 => 'Unauthorized',
		    402 => 'Payment Required',
		    403 => 'Forbidden',
		    404 => 'Not Found',
		    405 => 'Method Not Allowed',
		    406 => 'Not Acceptable',
		    407 => 'Proxy Authentication Required',
		    408 => 'Request Timeout',
		    409 => 'Conflict',
		    410 => 'Gone',
		    411 => 'Length Required',
		    412 => 'Precondition Failed',
		    413 => 'Payload Too Large',
		    414 => 'URI Too Long',
		    415 => 'Unsupported Media Type',
		    416 => 'Requested Range Not Satisfiable',
		    417 => 'Expectation Failed',
		    418 => 'I\'m a teapot',
		    422 => 'Unprocessable Entity',
		    423 => 'Locked',
		    424 => 'Failed Dependency',
		    425 => 'Unordered Collection',
		    426 => 'Upgrade Required',
		    428 => 'Precondition Required',
		    429 => 'Too Many Requests',
		    431 => 'Request Header Fields Too Large',
		    449 => 'Retry With',
		    451 => 'Unavailable For Legal Reasons',
		    450 => 'Blocked by Windows Parental Controls',
		    500 => 'Internal Server Error',
		    501 => 'Not Implemented',
		    502 => 'Bad Gateway',
		    503 => 'Service Unavailable',
		    504 => 'Gateway Timeout',
		    505 => 'HTTP Version Not Supported',
		    506 => 'Variant Also Negotiates',
		    507 => 'Insufficient Storage',
		    508 => 'Loop Detected',
		    509 => 'Bandwidth Limit Exceeded',
		    510 => 'Not Extended',
		    511 => 'Network Authentication Required'
		);

	}




?>