<?php
	/*
	 * Este archivo es usado para hacer consultas a la api
	 * simulando a un cliente. 
 	 */

	//TEST
	$opciones = array(
	  	'http'=>array(
	    	'method'=>"GET",
	    	'header'=>"Accept-language: en\r\n" .
	              "X-AuthToken: MonitoDelBoom\r\n".
	              "Accept: text/plain\r\n"
	  	)
	);

	$contexto = stream_context_create($opciones);

	//FIN_TEST

	//$response = file_get_contents('http://localhost/recetalia-server/api/Recipe/32/Ingredients/?sort=date,rank',false,$contexto);
	$response = file_get_contents('http://localhost/recetalia-server/api/Ingredients/metodo',false,$contexto);

	echo "RESPONSE:<br>";
	print("<pre>".print_r($response,true)."</pre>");
	echo "<br>";
	echo "RESPONSE HEADER:<br>";
	print("<pre>".print_r($http_response_header,true)."</pre>");
	echo "<br></html>";

?>