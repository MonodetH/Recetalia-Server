<?php

	class MUser_Account extends CoreModel{

		protected static $_table = 'User_Account';
		protected static $_scheme = array(
			'id' => array('tipo' => 'int','default' => 0),
			'id_user' => array('tipo' => 'int','default' => 0),
			'id_account' => array('tipo' => 'int','default' => 0),
			'expiracion' => array('tipo' => 'text','default' => '0000-00-00'),

		);
	}

?>