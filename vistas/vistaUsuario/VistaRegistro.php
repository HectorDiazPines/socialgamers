<?php 

class VistaRegistro {

  static function construye($usuario="") {
   // $titulo = "Usuario $usuario correctamente dado de alta";
    $ruta = DIR_RAIZ_APP . INDEX;
    $accion2 = "usuario/login_usuario";
    $contenido = <<<CONT
      <!-- <p>Esta conectado con el usuario <b>$usuario</b></p> -->
           <form name='f1'  action={$ruta}{$accion2}>
		<table align='left' border='0px' cellpadding='2' id='tabla'>
      		<tr>
				<td colspan=2><br><h3>¿Desea iniciar sesion ahora?</h3></td>
			</tr>
			<tr>
				<td>Usuario</td>
				<td>Contraseña</td>
			</tr>
		<tr>
			<td><input type='text' id='correo' name='correo'></td>
			<td><input type='text' id='pass' name='pass'></td>
			<td width='30%'><input type='submit' id='enviar' name='enviar' value='Iniciar Sesión'></td>
		</tr>
      	<tr>
			<td><br><a href='portada'>Volver a la pagina principal</a></td>
		</tr>
      		
      	<table>
	</form>
CONT;
    return $contenido;
  }
}
?>