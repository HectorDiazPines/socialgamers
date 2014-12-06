<?php
class BBDD{
function conecta() {
	$dsn = 'mysql:host=localhost;dbname=socialgamers';
	$usuario = "root";
	$contraseña = "";
	try {
		$conexion = new PDO($dsn, $usuario, $contraseña);
		return $conexion;
	} catch (PDOException $e) {
		echo 'Fallo la conexión. ' ;
		echo $e->getMessage() ;
		return false;
	}

}

}
?>