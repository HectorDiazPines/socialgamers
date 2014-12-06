<?php 

class VistaPerfil {

  static function construye($request, $respuesta="",$propio="",$aficiones="") {
	$ruta = DIR_RAIZ_APP . INDEX;
	$img = DIR_RAIZ_APP . '/imagenes/';
	$accion = "usuario/pasa_alta";
	$accion2 = "usuario/darse_baja";
	$fecha_actual = date("Y/m/d");
	$propio="";
	$propio2="";
	
    $contenido = <<<CONT
      <html>
<head>
</head>
<body>
Hola tu
</body>
</html>
CONT;
    
    return $contenido;
  }
}
?>