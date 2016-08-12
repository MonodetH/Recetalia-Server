<?php

	class MUser_Ingredient extends CoreModel{

		protected static $_table = 'User_Ingredient';
		protected static $_scheme = array(
			'id_user' => array('tipo' => 'int','default' => 0),
			'id_ingredient' => array('tipo' => 'int','default' => 0)

		);
	}

?>