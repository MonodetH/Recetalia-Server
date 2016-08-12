<?php

	class MRank_Locale extends CoreModel{

		protected static $_table = 'Rank_Locale';
		protected static $_scheme = array(
			'id_rank' => array('tipo' => 'int','default' => 0),
			'id_locale' => array('tipo' => 'int','default' => 0),
			'traduccion' => array('tipo'=>'text','default'=>'default')
		);
	}

?>