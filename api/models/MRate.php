<?php

	class MRate extends CoreModel{

		protected static $_table = 'Rate';
		protected static $_scheme = array(
			'id' => array('tipo' => 'int','default' => 0),
			'id_user' => array('tipo' => 'int','default' => 0),
			'id_recipe' => array('tipo' => 'int','default' => 0),
			'calificacion' => array('tipo' => 'int','default' => 0)
		);
	}

?>