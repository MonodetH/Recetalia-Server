<?php

	class MIngredient_Locale extends CoreModel{

		protected static $_table = 'Ingredient_Locale';
		protected static $_scheme = array(
			'id_ingredient' => array('tipo' => 'int','default' => 0),
			'id_locale' => array('tipo' => 'int','default' => 0),
			'traduccion' => array('tipo'=>'text','default'=>'default')
		);
	}

?>