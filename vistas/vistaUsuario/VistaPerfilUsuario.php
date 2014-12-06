<?php
class VistaPerfilUsuario {
	static function construye($datosUsuario) {
		$ruta = DIR_RAIZ_APP . INDEX;
		$ruta2 = DIR_RAIZ_APP;
		$accionModificacion="Usuario/ModificarPerfil";
		$usuario=$datosUsuario->devuelveUsuario();
		$correo = $datosUsuario->devuelveCorreo ();
		$fecha_nacimiento = $datosUsuario->devuelveFecha_nacimiento ();
		$fecha_alta = $datosUsuario->devuelveFecha_alta ();
		$foto = $datosUsuario->devuelveFoto ();
		$pais = $datosUsuario->devuelvePais ();
		$ciudad = $datosUsuario->devuelveCiudad ();
		$genero = $datosUsuario->devuelveGenero ();
		
		$Vistausu = "
		<div class='col-xs-8 col-md-10 contenido'>		
			
			<div class='col-md-12 nomUsu'>
			<h1>$usuario</h1>
			</div>
			<div class='col-sm-4  imgUsu'>
				<img  src='{$ruta2}/imagenes/$foto'>
			</div>
				<div class='col-sm-7 col-sm-offset-1 datosUsu'>
						<table class='col-sm-12 tabladatos'>
							<tr>
								<td>Correo : </td><td>$correo</td>
							</tr>
							<tr>
								<td>Fecha de nacimiento :</td><td>$fecha_nacimiento</td>
							</tr>
							<tr>
								<td>Pais</td><td>$pais</td>
							</tr>
							<tr>
								<td>Genero</td><td>$genero</td>
							</tr>
							<tr>
								<td>Fecha de Alta :</td><td>$fecha_alta</td>
							</tr>
						</table>
				</div>
				<div class=' col-md-12'>
				<form class='form-inline col-md-2 Modificar' role='form' action='{$ruta}{$accionModificacion}' method='POST'>
							<button type='submit' class='btn btn-default'>Modificar Perfil</button>
					</form>
					<form class='form-inline col-md-2 Borrar' role='form' action='' method='POST'>
							<button type='submit' class='btn btn-default'>Borrar cuenta</button>
					</form>
				<div>
		</div>

		";
		return  $Vistausu;
	}
}
?>