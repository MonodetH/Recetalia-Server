<?php
//Conexión
class Connectivity
{
	
	protected static function connect()
	{
		// Por mientras uso una bd de prueba, esto eventualmente va a cambiar
		$conn_mysqli =  new mysqli("localhost", "root", "test_con", "recetalia");
		$conn_mysqli->set_charset("utf8");
		if($conn_mysqli->connect_errno)
		{
			$_SESSION['data']['error'] = "Error al conectar a la bd " . $conn_mysqli -> connect_errno . ")" . $conn_mysqli -> connect_error;
			return NULL;
		}
		return $conn_mysqli;
	}
	
	// Consulta de prueba, se usa para probar la conexión a la bd
	public static function test_query()
	{
		$conn_mysqli = self::connect();
		$peticion = "INSERT INTO account(nombre) VALUES('will smith');";
		if(!$result = $conn_mysqli->query($peticion))
		{
			die('Error ' . $conn_mysqli->error );
		}
	}
	
	protected static function insertar()
	{
		
	}
	
	protected static function borrar()
	{
		
	}
	
	protected static function actualizar()
	{
		
	}
	
	protected static function close_conn($conexion)
	{
			mysqli_close($conexion);
			return;
	}
}
	$db = new Connectivity();
	$db->test_query();
?>