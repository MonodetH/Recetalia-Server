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