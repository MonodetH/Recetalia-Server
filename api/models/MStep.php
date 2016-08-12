<?php

	class MStep extends CoreModel{

		protected static $_table = 'Step';
		protected static $_scheme = array(
			'id' => array('tipo' => 'int','default' => 0),
			'id_recipe' => array('tipo' => 'int','default' => 0),
			'titulo' => array('tipo' => 'text','default' => 'default'),
			'duracion' => array('tipo' => 'int','default' => 0),
			'descripcion' => array('tipo' => 'text','default' => 'default'),
			'opcional' => array('tipo' => 'int','default' => 0),
			'orden' => array('tipo' => 'int','default' => 0)
		);
	}

?>