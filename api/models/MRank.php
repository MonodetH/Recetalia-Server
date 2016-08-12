<?php

	class MRank extends CoreModel{

		protected static $_table = 'Rank';
		protected static $_scheme = array(
			'id' => array('tipo' => 'int','default' => 0),
			'nombre' => array('tipo'=>'text','default'=>'default')
		);
	}

?>