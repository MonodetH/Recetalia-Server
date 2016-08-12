<?php

	class MRecipe_Locale extends CoreModel{

		protected static $_table = 'Recipe_Locale';
		protected static $_scheme = array(
			'id_recipe' => array('tipo' => 'int','default' => 0),
			'id_ingredient' => array('tipo' => 'int','default' => 0),
			'cantidad' => array('tipo' => 'int','default' => 0),
			'opcional' => array('tipo' => 'int','default' => 0),
			'id_sustituto' => array('tipo' => 'int','default' => 0)
		);
	}

?>