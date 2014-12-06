<?php 
require_once "conf/constantes.php";
class VistaPie {

  private static $mensajeOpciones = array(
                   "post/listado" => "Ir a la página de inicio (listado de posts)", 
                   "post/detalle" => "Detalle de un post", 
				   "post/envio_get" => "Enviar un post",
				   "usuario/alta_get" => "Dar de alta un usuario",
				   "usuario/listado" => "Listado de usuarios",
  					"post/detalleListado"=>"Listar post",
  					 "post/desconectar" => "Desconectar", 
  					"usuario/autenticacion_get"=>"Registrar usuario"
				 );								   

  static function construye($opciones) {
	$ruta = DIR_RAIZ_APP . INDEX;
	$pie = "";
	if (sizeof($opciones) > 0) {  // se reciben opciones
      $pie = "
        <table border='0' cellpadding='10'>
	    <tr>	  
      ";		
      for ($i = 0; $i < count($opciones); $i++) {
	    // print $i;
	    $opcion = $opciones[$i];
		$mensaje = self::$mensajeOpciones[$opciones[$i]];
	    $pie .= "<td style='border: green solid 3px;'><a href='{$ruta}$opcion'>$mensaje</a></td>";
/*	    if ($opciones($i) == "post/listado")
	      $contenido . = "<td><a href='{$ruta}post/listado'>Ir a la página principal</a></td>";
		if ($opciones($i) == "acceso")
	      $contenido . = "<td><a href='{$ruta}acceso'>Enviar un post</a></td>";  
		if ($opciones($i) == "post/envio")
	      $contenido . = "<td><a href='{$ruta}acceso'>Enviar un post</a></td>";  		  
*/
	  }
	  $pie .= "
	    </tr>
        </table>	  
      ";
    }
    return $pie;
  }
}
?>