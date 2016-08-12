<?php

	class MToken extends CoreModel{

		protected static $_table = 'Token';
		protected static $_scheme = array(
			'token' => array('tipo' => 'int','default' => 0),
			'id_user' => array('tipo' => 'int','default' => 0)
		);
	}

?>