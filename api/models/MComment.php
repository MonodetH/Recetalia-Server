<?php

	class MComment extends CoreModel{

		protected static $_table = 'Comment';
		protected static $_scheme = array(
			'id' => array('tipo' => 'int','default' => 0),
			'id_user' => array('tipo' => 'int','default' => 0),
			'id_recipe' => array('tipo' => 'int','default' => 0),
			'comentario' => array('tipo'=>'text','default'=>'default'),
			'fecha' => array('tipo' => 'text','default' => '0000-00-00')
		);
	}

?>