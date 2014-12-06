<?php
// Clase Usuario
class Usuario {

  private $id;
  private $usuario;
  private $correo;	
  private $fecha_nacimiento;
  private $pass;
  private $fecha_alta;
  private $foto;
  private $pais;
  private $ciudad;
  private $genero;
  private $estado;
    
//  private $contador;
 
  function Usuario($id, $usuario, $correo, $pass, $fecha_nacimiento, $fecha_alta, $foto, $pais, $ciudad, $genero,$estado) {
  	$this->id = $id;
  	$this->usuario = $usuario;
    $this->correo = $correo;
    $this->pass = $pass;
    $this->fecha_nacimiento= $fecha_nacimiento;
    $this->fecha_alta = $fecha_alta;
    $this->foto = $foto;
    $this->pais = $pais;
    $this->ciudad = $ciudad;
    $this->genero = $genero;
    $this->estado = $estado;
  }
  
  function ponId($id) {
  	$this->id = $id;
  }
  
  function devuelveId() {
  	return $this->id;
  }

  function ponUsuario($usuario) {
    $this->usuario = $usuario;
  }

  function devuelveUsuario() {
    return $this->usuario;
  }

  function ponCorreo($correo) {
    $this->correo = $correo;
  }

  function devuelveCorreo() {
    return $this->correo;
  }

  function ponPass($pass){
    $this->pass= $pass;
  }

  function devuelvePass() {
    return $this->pass;
  }  
  
  function ponFecha_nacimiento($fecha_nacimiento) {
    $this->fecha_nacimiento= $fecha_nacimiento;
  }

  function devuelveFecha_nacimiento() {
    return $this->fecha_nacimiento;
  }

  function ponFecha_alta($fecha_alta) {
    $this->fecha_alta= $fecha_alta;
  }

  function devuelveFecha_alta() {
    return $this->fecha_alta;
  }
  
  function ponFoto($foto) {
  	$this->foto = $foto;
  }
  
  function devuelveFoto() {
  	return $this->foto;
  }
  
  function ponPais($pais) {
  	$this->pais = $pais;
  }
  
  function devuelvePais() {
  	return $this->pais;
  }
  
  function ponCiudad($ciudad) {
  	$this->ciudad = $ciudad;
  }
  
  function devuelveCiudad() {
  	return $this->ciudad;
  }
  
  function ponGenero($genero) {
  	$this->genero = $genero;
  }
  
  function devuelveGenero() {
  	return $this->genero;
  }
  
  function ponEstado($estado) {
  	$this->estado = $estado;
  }
  
  function devuelveEstado() {
  	return $this->estado;
  } 
   function info() {
    print $this->id . " - " . $this->usuario . " - " . $this->correo. " - " . $this->pass. " - " . $this->fecha_nacimiento
          . " - " . $this->fecha_alta . " - ". $this->foto  . " - ". $this->pais . " - ". $this->ciudad . " - ". $this->genero . " - ". $this->estado;
    print "<br /> \n";
  }



}

?>