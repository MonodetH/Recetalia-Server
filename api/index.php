<?
	#
	# Punto de entrada de la API. Crea y ejecuta la aplicacion
	#

	# Constante API_PATH. Ruta a la API
	defined('API_PATH') or define('API_PATH',dirname(__FILE__).'/');

	/* Se incluye la clase API */
	include_once(API_PATH.'API.php');

	$api = new API();
	$api->run();

?>
