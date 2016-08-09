<?
	#
	# Usuario model
	#

	class MUsuario extends CoreModel{

		protected static $_table = 'User';
		protected static $_scheme = array(
			'id' => array(
				'tipo' => 'int',
				'encode' => false,
				'default' => 0
				),
			'email' => array('tipo'=>'text','encode'=>false,'default'=>'mail@a.com'),
			'username' => array('tipo'=>'text','encode'=>false,'default'=>'username'),
			'rank' => array('tipo'=>'int' ,'encode'=>false ,'default'=>0 )
		);

		# Comprueba la existencia de un usuario por su username
		public static function existeUsername($username){
			$mysqli = self::connect();
			if($mysqli==NULL){return;}

			$query = "SELECT * FROM User WHERE username ='".$username."'";
			$mysqli->query($query);
			return ($mysqli->affected_rows != 0);
		}
		# Comprueba la existencia de un usuario por su email
		public static function existeEmail($email){
			$mysqli = self::connect();
			if($mysqli==NULL){return;}

			$query = "SELECT * FROM User WHERE email ='".$email."'";
			$mysqli->query($query);
			return ($mysqli->affected_rows != 0);
		}

		# devuelve los datos de un usuario
		public static function getUser($user){
			$mysqli = self::connect();
			if($mysqli==NULL){return;}

			$query = "SELECT * FROM User WHERE ".((self::existeEmail($user))?"email='":"username='").$user."' LIMIT 1";

			$result = $mysqli->query($query);
			
			return ($result)?$result->fetch_assoc():NULL;
		}
	}



?>