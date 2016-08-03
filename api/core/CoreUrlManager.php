<? 
	#
	# CoreUrlManager class file
	# Manejo de urls amigables
	#

	class CoreUrlManager{		
		## Metodos estaticos
		
		# Obtiene la URL de la llamada y la devuelve como array
		public static function getUrl() {
			$param = array();
			$url = parse_url($_SERVER['REQUEST_URI']);

			foreach(explode("/", $url['path']) as $p){
				if ($p!='') {$param[] = $p;} 
			}
			return $param;
		}

		public static function encodeUrl(){
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
				
		
	}

?>