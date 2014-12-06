<?php
// Clase Noticia
class Consolas {

  private $id;
  private $nombre;
  private $descripcion;
  private $imagen;
 

  function Consolas($id, $nombre, $descripcion,$imagen) {
    $this->id = $id;
    $this->nombre = $nombre;
    $this->descripcion= $descripcion;
    $this->imagen= $imagen;
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
  function ponDescripcion($descripcion) {
  	$this->descripcion = $descripcion;
  }
  
  function devuelveDescripcion() {
  	return $this->descripcion;
  }
  function ponImagen($imagen) {
  	$this->imagen= $imagen;
  }
  
  function devuelveImagen() {
  	return $this->imagen;
  }
   function info() {
    print $this->id . " - " . $this->nombre. " - " . $this->descripcion.  " - " . $this->imagen ;
    print "<br /> \n";
  }


}

?>