<?php
// Clase Usuario
class Juego {

  private $id_juego;
  private $nombre;	
  private $anio;
  private $num_jugadores;
  private $online;
  private $categoria;
  private $descripcion;
  private $puntuacion;
  private $imagen;
  private $consola;
  
//  private $contador;
 
  function Juego($id_juego, $nombre, $anio, $num_jugadores, $online,$categoria,$descripcion,$puntuacion,$imagen,$consola) {
    $this->id_juego = $id_juego;
    $this->nombre = $nombre;
    $this->anio = $anio;
    $this->num_jugadores= $num_jugadores;
    $this->online = $online;
    $this->categoria = $categoria;
    $this->descripcion= $descripcion;
    $this->puntuacion= $puntuacion;
    $this->imagen= $imagen;
    $this->consola= $consola;
  }

  function ponId_juego($id_juego) {
    $this->id_juego = $id_juego;
  }

  function devuelveId_juego() {
    return $this->id_juego;
  }

  function ponNombre($nombre) {
    $this->nombre = $nombre;
  }

  function devuelveNombre() {
    return $this->nombre;
  }

  function ponAnio($anio){
    $this->anio= $anio;
  }

  function devuelveAnio() {
    return $this->anio;
  }  
  
  function ponNum_jugadores($num_jugadores) {
    $this->num_jugadores= $num_jugadores;
  }

  function devuelveNum_jugadores() {
    return $this->num_jugadores;
  }

  function ponOnline($online) {
    $this->online= $online;
  }

  function devuelveOnline() {
    return $this->online;
  }
  function ponCategoria($categoria) {
  	$this->categoria= $categoria;
  }
  
  function devuelveCategoria() {
  	return $this->categoria;
  }
  function ponDescripcion($descripcion) {
  	$this->descripcion = $descripcion;
  }
  
  function devuelveDescripcion() {
  	return $this->descripcion;
  }
  
  function ponPuntuacion($puntuacion) {
  	$this->puntuacion= $puntuacion;
  }
  
  function devuelvePuntuacion() {
  	return $this->puntuacion;
  }
  
  function ponImagen($imagen) {
  	$this->imagen= $imagen;
  }
  
  function devuelveImagen() {
  	return $this->imagen;
  }
  function ponConsola($consola) {
  	$this->consola= $consola;
  }
  
  function devuelveConsola() {
  	return $this->consola;
  }
   function info() {
    print $this->id_juego . " - " . $this->nombre. " - " . $this->anio. " - " . $this->num_jugadores
          . " - " . $this->online. " - " . $this->categoria. " - " . $this->descripcion. " - " . $this->puntuacion. " - " . $this->imagen. " - " . $this->consola;;
    print "<br /> \n";
  }

//  function __destruct() {};

}

?>