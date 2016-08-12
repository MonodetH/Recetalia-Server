<?php

	class MRecipe_Tag extends CoreModel{

		protected static $_table = 'Recipe_Tag';
		protected static $_scheme = array(
			'id_recipe' => array('tipo' => 'int','default' => 0),
			'id_tag' => array('tipo' => 'int','default' => 0)
		);
	}

?>