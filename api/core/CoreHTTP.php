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

		/*
		 *Funcion encargada de consultar el servidor por el idioma del cliente y lo retorna
		*/
		public static function getLocale(){
			return ($_SERVER["HTTP_ACCEPT_LANGUAGE"]);
		}
		
		//Agregar funcion que recibe una peticion y encodea la respuesta en cierto formato (desde $_SERVER[HTTP_ACCEPT])

		/*Funcion encargada de manualmente traspasar un texto con formato de "array" a un texto con formato XML
		*Recibe un objeto SimpleXMLElement y el arreglo a transformar
		*Se recorre el arreglo (con foreach, lo que siginfica que posee "llaves" y "valores")
		*Y transforma aquellas "llaves" y "valores" a formato XML (ej: [A] => b lo transforma a <A> b </A>)
		*Cada vez que el valor sea un arreglo, se hace una llamada recursiva
		*/
		private static function array_to_xml(array $arr, SimpleXMLElement $xml){
			foreach ($arr as $key => $value) {
				is_array($value)?array_to_xml($value,$xml->addChild($key)):$xml->addChild($key,$value);
			}
			return $xml;
		}

		/*Funcion que se encarga de dar formato a la respuesta por parte del servidor
		*Recibe texto en la variable $body
		*Dependiendo de lo que posea HTTP_ACCEPT da el formato
		*Imprime por pantalla, por lo que no necesita retorno
		*/
		public static function encodeResponse($body){
			if(isset($_SERVER["HTTP_ACCEPT"])){
				switch ($_SERVER["HTTP_ACCEPT"]){
					//Retorna el texto en formato XML
					case "application/xml":
						$xml = new SimpleXMLElement('<response/>');
						$xml = CoreHTTP::array_to_xml($body,$xml);
						echo $xml->asXML();
						break;
						
					//Retorna texto plano
					case "text/plain":
						print_r($body);
						break;

					//Retorna el texto en formato JSON (por defecto)
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