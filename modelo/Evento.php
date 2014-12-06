<?php
// Clase Noticia
class Evento {

  private $id;
  private $nombre;
  private $imagen;
  private $descripcion;
  private $fecha;

  function Evento($id, $nombre,$imagen, $descripcion,$fecha) {
    $this->id = $id;
    $this->nombre = $nombre;
    $this->imagen= $imagen;
    $this->descripcion= $descripcion;
    $this->fecha= $fecha;
  }

  function ponId($id) {
    $this->id = $id;
  }

  function devuelveId() {
    return $this->id;
  }

  function ponNombre($nombre) {
    $this->nombre = $nombre;
  }

  function devuelveNombre() {
    return $this->nombre;
  }
  
  function ponImagen($imagen) {
  	$this->imagen= $imagen;
  }
  
  function devuelveImagen() {
  	return $this->imagen;
  }

  function ponDescripcion($descripcion) {
  	$this->descripcion = $descripcion;
  }
  
  function devuelveDescripcion() {
  	return $this->descripcion;
  }
  
  
  function ponFecha($fecha) {
  	$this->fecha= $fecha;
  }
  
  function devuelveFecha() {
  	return $this->fecha;
  }
   function info() {
    print $this->id . " - " . $this->nombre.  " - " . $this->imagen. " - " . $this->descripcion. " - " . $this->fecha;
    print "<br /> \n";
  }

//  function __destruct() {};

}

?>