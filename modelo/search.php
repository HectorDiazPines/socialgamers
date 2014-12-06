<?php


// limpio la palabra que se busca
$search= trim($_GET['search']);

// la busco 
$result= search($search);

// seteo la cabecera como json
header('Content-type: application/json; charset=utf-8');

//imprimo el resultado como un json
echo json_encode($result);



function search($searchWord)
{
    
		$searchWord=$searchWord."%";
		$dsn = 'mysql:host=localhost;dbname=socialgamers';
		$usuario = "root";
		$contraseña = "";
		$conexion = new PDO($dsn, $usuario, $contraseña);
		$result=array();
		$consultaSQL = "SELECT nombre FROM  juegos WHERE nombre LIKE :nombre ";
		$consulta = $conexion->prepare ( $consultaSQL );
		$resultado = $consulta->execute ( array (
				":nombre" => "$searchWord") );
		/*$consulta = $conexion->prepare ( $consultaSQL );
	
		$resultado = $consulta->execute ();*/
		foreach ( $consulta as $dato ) {
		$nombre=$dato['nombre'];
			    
				$result [] = $nombre;
				
			;
		}
			
		 asort($result);
    return $result;	
}


?>
