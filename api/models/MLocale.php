<?php

	class MLocale extends CoreModel{

		protected static $_table = 'Locale';
		protected static $_scheme = array(
			'id' => array('tipo' => 'int','default' => 0),
			'nombre' => array('tipo'=>'text','default'=>'default'),
			'codigo' => array('tipo'=>'text','default'=>'es_CL')
		);
	}

?>