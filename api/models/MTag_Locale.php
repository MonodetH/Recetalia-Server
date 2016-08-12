<?php

	class MTag_Locale extends CoreModel{

		protected static $_table = 'Tag_Locale';
		protected static $_scheme = array(
			'id_tag' => array('tipo' => 'int','default' => 0),
			'id_locale' => array('tipo' => 'int','default' => 0),
			'traduccion' => array('tipo' => 'text','default' => 'default')
		);
	}

?>