<?php
require_once 'Noticia.php';
require_once 'Evento.php';
class Modelo_Portada {
	// ----------------------------------Muestra los elemenetos de la portada---------------------
	
	static function VerNoticias() {
		
		$conexion = BBDD::conecta ();
		$datosNoticias = array ();
		$consultaSQL = "SELECT * FROM  noticias";
		$consulta = $conexion->prepare ( $consultaSQL );
		$resultado = $consulta->execute ();
		foreach ($consulta as $dato) {
			$noticia = new Noticia($dato['id'], $dato['titular'], $dato['imagen'], $dato['descripcion'], $dato['fecha']);
			$datosNoticias [] = $noticia;
		}
		return $datosNoticias;
	}
	
	static function VerEventos() {
	
		$conexion = BBDD::conecta ();
		$datosEventos = array ();
		$consultaSQL = "SELECT * FROM  eventos";
		$consulta = $conexion->prepare ( $consultaSQL );
		$resultado = $consulta->execute ();
		foreach ($consulta as $dato) {
			$evento = new Evento($dato['id'], $dato['nombre'], $dato['imagen'], $dato['descripcion'], $dato['fecha']);
			$datosEventos [] = $evento;
		}
		return $datosEventos;
	}
static function abreNoticia($id) {
		
		$conexion = BBDD::conecta ();
		$datosNoticias = array ();
		$consultaSQL = "SELECT * FROM  noticias  WHERE id= :id";
		$consulta = $conexion->prepare ( $consultaSQL );
		$resultado = $consulta->execute ( array (":id" => "$id") );
		foreach ($consulta as $dato) {
			$noticia = new Noticia($dato['id'], $dato['titular'], $dato['imagen'], $dato['descripcion'], $dato['fecha']);
			$datosNoticias [] = $noticia;
		}
		return $datosNoticias;
	}

}
?>