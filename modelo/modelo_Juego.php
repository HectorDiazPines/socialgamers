<?php
require_once 'Juego.php';
require_once 'Consolas.php';
class Modelo_Juego {
	// ----------------------------------Muestra el muro---------------------
	static function VerConsolas() {
		$conexion = BBDD::conecta ();
		$datosConsola = array ();
		$consultaSQL = "SELECT * FROM  consolas ";
		$consulta = $conexion->prepare ( $consultaSQL );
		$resultado = $consulta->execute ();
		/*
		 * $consulta = $conexion->prepare ( $consultaSQL );
		 *
		 * $resultado = $consulta->execute ();
		 */
		foreach ( $consulta as $dato ) {
			$consola = new Consolas ( $dato ['id'], $dato ['nombre'], $dato ['descripcion'], $dato ['imagen'] );
			$datosConsola [] = $consola;
			
			;
		}
		
		return $datosConsola;
	}
	// Nos muestra la primera carga con todos los juegos, con el filtro de la consola si estas en una pestaña de una consola
	// y si es la pestaña de todos los juegos no s muestra sin filtro
	static function VerJuegos($session) {
		// definiendo las variables necesarias
		$consolaS = $_SESSION ['consola'];
		$conexion = BBDD::conecta ();
		$consolasJuego = "";
		$datosJuego = array ();
		// primer filtro comprueba si consola es igual a "" quiere decir que esta en la pesataña de todos los jugos
		if ($consolaS == "") {
			// consulta para todos los juegos
			$consultaSQL = "SELECT * FROM  juegos";
			$consulta = $conexion->prepare ( $consultaSQL );
			$resultado = $consulta->execute ();
			
			// recorre la respuesta con todos los juegos que encotro
			foreach ( $consulta as $dato ) {
				$consolasJuego = "";
				$idjuego = $dato ['id_juego'];
				
				$consultaSQL2 = "SELECT nombre FROM consolas WHERE id IN (SELECT id_consola FROM juegos_consolas WHERE id_juego LIKE :id_juego )";
				$consulta2 = $conexion->prepare ( $consultaSQL2 );
				$resultado = $consulta2->execute ( array (
						":id_juego" => $idjuego 
				) );
				
				foreach ( $consulta2 as $dato2 ) {
					
					$consolasJuego .= $dato2 ['nombre'] . ",";
				}
				// por cada juego nos contruye un array de objeto juego y le añade la consola
				
				$juego = new Juego ( $dato ['id_juego'], $dato ['nombre'], $dato ['anio'], $dato ['num_jugadores'], $dato ['online'], $dato ['categoria'], $dato ['descripcion'], $dato ['puntuacion'], $dato ['imagen'], $consolasJuego );
				$datosJuego [] = $juego;
			}
			// para las pestañas que perteneces alguna consola,filtro consola distinto de ""
		} else {
			// consulta que nos filtra por tipo de consola
			$consola = "%" . $consolaS . "%";
			$consultaSQL = "SELECT * FROM  juegos WHERE id_juego IN (SELECT id_juego FROM juegos_consolas WHERE id_consola LIKE :consola )";
			$consulta = $conexion->prepare ( $consultaSQL );
			$resultado = $consulta->execute ( array (
					":consola" => "$consola" 
			) );
			foreach ( $consulta as $dato ) {
				// creando el objeto tipo juego
				$juego = new Juego ( $dato ['id_juego'], $dato ['nombre'], $dato ['anio'], $dato ['num_jugadores'], $dato ['online'], $dato ['categoria'], $dato ['descripcion'], $dato ['puntuacion'], $dato ['imagen'], $consolasJuego );
				$datosJuego [] = $juego;
			}
		}
		// nos devuelve el objeto juego
		return $datosJuego;
	}
	// metodo para filtrar busaqueda por letra
	static function consultaLetra($q, $session) {
		// variables
		$consolaS = $_SESSION ['consola'];
		
		$conexion = BBDD::conecta ();
		$datosJuego = array ();
		$nombre = "" . $q . "%";
		$consolasJuego = "";
		
		if ($consolaS == "") {
			
			// consulta para todos los juegos con filtro de letra inicial
			$consultaSQL = "SELECT * FROM  juegos WHERE nombre LIKE :nombre ;";
			$consulta = $conexion->prepare ( $consultaSQL );
			$resultado = $consulta->execute ( array (
					":nombre" => "$nombre" 
			) );
			// recorre la respuesta con todos los juegos que encotro
			foreach ( $consulta as $dato ) {
				$consolasJuego = "";
				$idjuego = $dato ['id_juego'];
				
				$consultaSQL2 = "SELECT nombre FROM consolas WHERE id IN (SELECT id_consola FROM juegos_consolas WHERE id_juego LIKE :id_juego )";
				$consulta2 = $conexion->prepare ( $consultaSQL2 );
				$resultado = $consulta2->execute ( array (
						":id_juego" => $idjuego 
				) );
				
				foreach ( $consulta2 as $dato2 ) {
					
					$consolasJuego .= $dato2 ['nombre'] . ",";
				}
				// por cada juego nos contruye un array de objeto juego y le añade la consola
				
				$juego = new Juego ( $dato ['id_juego'], $dato ['nombre'], $dato ['anio'], $dato ['num_jugadores'], $dato ['online'], $dato ['categoria'], $dato ['descripcion'], $dato ['puntuacion'], $dato ['imagen'], $consolasJuego );
				$datosJuego [] = $juego;
			}
			// para las pestañas que perteneces alguna consola,filtro consola distinto de ""
		} else {
			$consola = "%" . $consolaS . "%";
			//consulta filtrada
			$consultaSQL = "SELECT * FROM  juegos WHERE nombre LIKE :nombre AND id_juego IN (SELECT id_juego FROM juegos_consolas WHERE id_consola LIKE :consola ) ";
			$consulta = $conexion->prepare ( $consultaSQL );
			$resultado = $consulta->execute ( array (
					":nombre" => "$nombre",
					":consola" => "$consola" 
			) );
			//objeto tipo juego que termina devolviendo para montar la vista
			foreach ( $consulta as $dato ) {
				
				$juego = new Juego ( $dato ['id_juego'], $dato ['nombre'], $dato ['anio'], $dato ['num_jugadores'], $dato ['online'], $dato ['categoria'], $dato ['descripcion'], $dato ['puntuacion'], $dato ['imagen'], $consolasJuego );
				$datosJuego [] = $juego;
			}
		}
		return $datosJuego;
	}
	//Control de los filtros de la busqueda avanzada
	static function consultaMovil($request, $session) {
		$consolaS = $_SESSION ['consola'];
		//variables controladas por si la envian vacia
		$nombre = "";
		// $num_jugadores = "";
		$fechadesde = "0000-00-00";
		$fechahasta = "9999-99-99";
		$categoria = "";
		$puntuaciondesde = "0";
		$puntuacionhasta = "10";
		
		// /----------comprobamos que recibamos datos si no las dejamo en blanco
		if ($_REQUEST ["q"] == "") {
			$nombre = "%%";
		} else {
			$nombre = $_REQUEST ["q"] . "%";
		}
		if ($_REQUEST ["c"] == "") {
			
			$categoria = "%%";
		} else {
			
			$categoria = $_REQUEST ["c"];
		}
		if ($_REQUEST ["fd"] != "") {
			$fechadesde = $_REQUEST ["fd"];
		}
		if ($_REQUEST ["fh"] != "") {
			$fechahasta = $_REQUEST ["fh"];
		}
		if ($_REQUEST ["pd"] != "") {
			$puntuaciondesde = $_REQUEST ["pd"];
		}
		if ($_REQUEST ["ph"] != "") {
			$puntuacionhasta = $_REQUEST ["ph"];
		}
		
		$conexion = BBDD::conecta ();
		$consolasJuego = "";
		
		if ($consolaS == "") {
			
			// consulta para todos los juegos con filtro 
			$consultaSQL = "SELECT * FROM  juegos WHERE   nombre LIKE :nombre AND categoria LIKE :categoria AND  anio >= :desde AND anio <= :hasta AND  puntuacion >= :pdesde AND puntuacion <= :phasta ";
			$consulta = $conexion->prepare ( $consultaSQL );
			$resultado = $consulta->execute ( array (
					":nombre" => "$nombre",
					":categoria" => "$categoria",
					":desde" => "$fechadesde",
					":hasta" => "$fechahasta",
					":pdesde" => $puntuaciondesde,
					":phasta" => $puntuacionhasta 
			) );
			// recorre la respuesta con todos los juegos que encotro
			foreach ( $consulta as $dato ) {
				$consolasJuego = "";
				$idjuego = $dato ['id_juego'];
				
				$consultaSQL2 = "SELECT nombre FROM consolas WHERE id IN (SELECT id_consola FROM juegos_consolas WHERE id_juego LIKE :id_juego )";
				$consulta2 = $conexion->prepare ( $consultaSQL2 );
				$resultado = $consulta2->execute ( array (
						":id_juego" => $idjuego 
				) );
				
				foreach ( $consulta2 as $dato2 ) {
					
					$consolasJuego .= $dato2 ['nombre'] . ",";
				}
				// por cada juego nos contruye un array de objeto juego y le añade la consola
				
				$juego = new Juego ( $dato ['id_juego'], $dato ['nombre'], $dato ['anio'], $dato ['num_jugadores'], $dato ['online'], $dato ['categoria'], $dato ['descripcion'], $dato ['puntuacion'], $dato ['imagen'], $consolasJuego );
				$datosJuego [] = $juego;
			}
			// para las pestañas que perteneces alguna consola,filtro consola distinto de ""
		} else {
			$consola = "%" . $consolaS . "%";
			$consultaSQL = "SELECT * FROM  juegos WHERE   nombre LIKE :nombre AND categoria LIKE :categoria AND  anio >= :desde AND anio <= :hasta AND  puntuacion >= :pdesde AND puntuacion <= :phasta AND id_juego IN (SELECT id_juego FROM juegos_consolas WHERE id_consola LIKE :consola )";
			$consulta = $conexion->prepare ( $consultaSQL );
			$resultado = $consulta->execute ( array (
					
					":nombre" => "$nombre",
					":categoria" => "$categoria",
					":desde" => "$fechadesde",
					":hasta" => "$fechahasta",
					":pdesde" => $puntuaciondesde,
					":phasta" => $puntuacionhasta,
					":consola" => "$consola" 
			) );
			$datosJuego = array ();
			
			if ($resultado) {
				
				foreach ( $consulta as $dato ) {
					
					$juego = new Juego ( $dato ['id_juego'], $dato ['nombre'], $dato ['anio'], $dato ['num_jugadores'], $dato ['online'], $dato ['categoria'], $dato ['descripcion'], $dato ['puntuacion'], $dato ['imagen'], $consolasJuego );
					$datosJuego [] = $juego;
				}
			}
		}
		return $datosJuego;
	}
	// busca juego por id y devuelve sus datos
	static function buscaJuegoId($idjuego, $sesion) {
		$consolaS = $_SESSION ['consola'];
		$consola = "%" . $consolaS . "%";
		$conexion = BBDD::conecta ();
		$datosJuego = array ();
		$consolasJuego = "";
		$consultaSQL = "SELECT * FROM  juegos WHERE id_juego LIKE :idjuego AND id_juego IN (SELECT id_juego FROM juegos_consolas WHERE id_consola LIKE :consola ) ";
		$consulta = $conexion->prepare ( $consultaSQL );
		$resultado = $consulta->execute ( array (
				":idjuego" => "$idjuego",
				":consola" => "$consola" 
		) );
		//busca el tipo de consola que tiene
		foreach ( $consulta as $dato ) {
			$consolasJuego = "";
			$idjuego = $dato ['id_juego'];
			
			$consultaSQL2 = "SELECT nombre FROM consolas WHERE id IN (SELECT id_consola FROM juegos_consolas WHERE id_juego LIKE :id_juego )";
			$consulta2 = $conexion->prepare ( $consultaSQL2 );
			$resultado = $consulta2->execute ( array (
					":id_juego" => $idjuego 
			) );
			
			foreach ( $consulta2 as $dato2 ) {
				
				$consolasJuego .= $dato2 ['nombre'] . ",";
			}
			
			$juego = new Juego ( $dato ['id_juego'], $dato ['nombre'], $dato ['anio'], $dato ['num_jugadores'], $dato ['online'], $dato ['categoria'], $dato ['descripcion'], $dato ['puntuacion'], $dato ['imagen'], $consolasJuego );
		}
		
		return $juego;
	}
}
?>