<?php 

class VistaRegistrado {

  static function construye($request="",$error="") {
  	$ruta = DIR_RAIZ_APP . INDEX;
  	$img = DIR_RAIZ_APP . '/imagenes/';
  	$accion = "usuario/alta_usuario";

    $contenido = <<<CONT
 <html>
	<head>
	</head>
<body>
hola
</body>
</html>
CONT;
    return $contenido;
  }
}
?>