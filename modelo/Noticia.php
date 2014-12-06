<?php
// Clase Noticia
class Noticia {

  private $id;
  private $titular;
  private $imagen;
  private $descripcion;
  private $fecha;

  function Noticia($id, $titular,$imagen, $descripcion,$fecha) {
    $this->id = $id;
    $this->titular = $titular;
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

  function ponTitular($titular) {
    $this->titular = $titular;
  }

  function devuelveTitular() {
    return $this->titular;
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
    print $this->id . " - " . $this->titular.  " - " . $this->imagen. " - " . $this->descripcion. " - " . $this->fecha;
    print "<br /> \n";
  }

//  function __destruct() {};

}

?>