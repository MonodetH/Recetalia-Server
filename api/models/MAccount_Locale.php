<?php

	class MAccount_Locale extends CoreModel{

		protected static $_table = 'Account_Locale';
		protected static $_scheme = array(
			'id_account' => array(
				'tipo' => 'int',
				'default' => 0
				),
			'id_account' => array('tipo' => 'int','default' => 0),
			'traduccion' => array('tipo'=>'text','default'=>'default')
		);
	}

?>