<?php

	class MRecipe extends CoreModel{

		protected static $_table = 'Recipe';
		protected static $_scheme = array(
			'id' => array('tipo' => 'int','default' => 0),
			'id_author' => array('tipo' => 'int','default' => 0),
			'id_locale' => array('tipo' => 'int','default' => 0),
			'porciones' => array('tipo' => 'int','default' => 0)
		);
	}

?>