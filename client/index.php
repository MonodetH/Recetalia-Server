<?php
	/*
	 * Este archivo es usado para hacer consultas a la api
	 * simulando a un cliente. 
 	 */

	$response = file_get_contents('http://localhost/recetalia-server/api/Ingredients?sort=date');

	echo "RESPONSE:<br>";
	print("<pre>".print_r($response,true)."</pre>");
	echo "<br>";
	echo "RESPONSE HEADER:<br>";
	print("<pre>".print_r($http_response_header,true)."</pre>");
	echo "<br></html>";

?>