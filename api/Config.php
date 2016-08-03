<?php 
	
	#
	# Config class file
	# configuraciones flags y rutas
	#

	class Config{

		public static $route = array(
			'Controller' => array(
				'inicio' => 'Inicio.php',
				'Inicio' => 'Inicio.php'
				)
		);

		
		public static $config = array(
			/* Datos de base de datos */
			'BD' => array(
				'server' => '',
				'bd' => '',
				'user' => '',
				'password' => ''
				)
		);

	}
?>
