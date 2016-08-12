<?php

	class MTag extends CoreModel{

		protected static $_table = 'Tag';
		protected static $_scheme = array(
			'id' => array('tipo' => 'int','default' => 0),
			'nombre' => array('tipo' => 'text','default' => 'default'),
			'categoria' => array('tipo' => 'int','default' => 0)
		);
	}

?>