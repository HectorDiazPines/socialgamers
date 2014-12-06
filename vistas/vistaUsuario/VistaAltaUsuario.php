<?php
class VistaAltaUsuario {
	static function construye($funcionalidad, $datosUsuario = "") {
		$ruta = DIR_RAIZ_APP . INDEX;
		if ($funcionalidad == "Alta") {
			$accion = 'Usuario/alta_usuario_post';
			$accionCancelar = 'Juego/inicio';
			$contenido = "
			<div class='col-xs-5 alta'>
			<h3>FORMULARIO DE REGISTRO:</h3>
			<br>
			<form role='form' action='{$ruta}{$accion}' method='POST'>
					<input type='hidden' class='form-control' name='fecha_alta' id='fecha_alta' value='2012-12-12'>
					<input type='hidden' class='form-control' name='foto' id='foto' value='foto'>
				  <div class='form-group'>
				    <label for='correo'>Correo electrónico</label>
				    <input type='email' class='form-control' name='correo' id='correo' placeholder='Correo electrónico' required>
				  </div>
				  <div class='form-group'>
				    <label for='pass'>Contraseña</label>
				    <input type='password' class='form-control' name='pass' id='pass' placeholder='Contraseña' required>
				  </div>
				 <div class='form-group'>
				    <label for='usuario'>Usuario</label>
				    <input type='text' class='form-control' name='usuario' id='usuario' placeholder='Usuario' required>
				 </div>
				 <div class='form-group'>  
					<label for='fecha_nac'>Fecha Nacimiento</label>
					<div class='input-group datepicker'>
					    <input type='text' class='form-control date' data-date-format='DD/MM/YYYY' name='fecha_nacimiento' id='fecha_nacimiento' placeholder='Fecha Nacimiento' required>
					    <span class='input-group-addon '>
	   				 		<span class='glyphicon-calendar glyphicon ' id='dialog'></span>
						</span>
				   	</div>
			  	 </div>
				 <div class='form-group'>
				    <label for='pais'>País</label>
				    <input type='text' class='form-control ' name='pais' id='pais' placeholder='País' required>
				 </div>
					<div class='form-group'>
				    <label for='ciudad'>Ciudad</label>
				    <input type='text' class='form-control' name='ciudad' id='ciudad' placeholder='Ciudad' required>
				 </div>
				<div class='form-group'>  
					<label for='genero'>Género</label>
					<div>
					    <input type='radio' name='genero' id='mujer' value='mujer' checked> Mujer
					    &nbsp;
					    <input type='radio' name='genero' id='hombre' value='hombre'> Hombre
					</div>
				</div>
     			<div class='form-group'>
				    <label for='foto'>Foto</label>
				    <input type='file' id='foto'>
				 </div>				  
				 <button type='submit' class='btn btn-success'>Registrarse</button>
				 <button type='reset' class='btn btn-warning'>Borrar Formulario</button>
				 <a href='{$ruta}{$accionCancelar}'><button type='button' class='btn btn-danger'>Cancelar</button></a>
			</form>
			
			
		</div>
		<div class='col-xs-2 medio'>
		</div>
		<div class='col-xs-5 inicia_sesion'>
		<h3>¿YA TIENES CUENTA? INICIAR SESIÓN:</h3>
		</div>				
				";
		} else {
			$accion = 'Usuario/alta_usuario_post';
			$accionCancelar = 'Juego/inicio';
			$usuario = $datosUsuario->devuelveUsuario ();
			$pass=$datosUsuario->devuelvePass ();
			$correo = $datosUsuario->devuelveCorreo ();
			$fecha_nacimiento = $datosUsuario->devuelveFecha_nacimiento ();
			$fecha_alta = $datosUsuario->devuelveFecha_alta ();
			$foto = $datosUsuario->devuelveFoto ();
			$pais = $datosUsuario->devuelvePais ();
			$ciudad = $datosUsuario->devuelveCiudad ();
			$genero = $datosUsuario->devuelveGenero ();
			$contenido = "
<div class='col-xs-5 modificacion'>
				<h3>FORMULARIO DE MODIFICACION:</h3>
				<br>
				<h5>Usuario $usuario</h5>
				<form role='form' class='form-horizontal' action='{$ruta}{$accion}' method='POST'>
					<input type='hidden' class='form-control' name='foto' id='foto' value='foto'>				
					<div class='form-group'>
						<label for='pass'>Cambiar contraseña</label>
						<input type='password' class='form-control' name='pass' id='pass' value='$pass' placeholder='Contraseña' required>
					</div>
					<div class='form-group'>
						<label for='fecha_nac'>Fecha Nacimiento</label>
						<div class='input-group datepicker'>
							<input type='text' class='form-control date' data-date-format='DD/MM/YYYY' value='$fecha_nacimiento' name='fecha_nacimiento' id='fecha_nacimiento' placeholder='Fecha Nacimiento' required>
							<span class='input-group-addon '>
								<span class='glyphicon-calendar glyphicon ' id='dialog'></span>
							</span>
						</div>	
					</div>
					<div class='form-group'>
						<label for='pais'>País</label>
						<input type='text' class='form-control ' name='pais' id='pais' value='$pais' placeholder='País' required>
					</div>
					<div class='form-group'>
						<label for='ciudad'>Ciudad</label>
						<input type='text' class='form-control' name='ciudad' id='ciudad' value='$ciudad' placeholder='Ciudad' required>
					</div>
					<div class='form-group'>
						<label for='foto'>Foto</label>
						<input type='file' id='foto'>
					</div>
					<button type='submit' class='btn btn-success'>Modificar</button>
					<a href='{$ruta}{$accionCancelar}'><button type='button' class='btn btn-danger'>Cancelar</button></a>
				</form>								
</div>
			";
		}
		return $contenido;
	}
}
?>
