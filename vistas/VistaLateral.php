<?php
class VistaLateral {
	static function construye($session) {
		$ruta = DIR_RAIZ_APP . INDEX;
		$accionRegistro = "Usuario/alta_usuario_get";
		$accionModificacion="Usuario/VerPerfil";
		$aUsuario = "";
		$registro = "";
		if (isset ( $session ['id'] )) {
			if ($session ['id'] != "") {
				$aUsuario = "<hr><li><a href='{$ruta}{$accionModificacion}'>Perfil Usuario</a></li><hr>";
			} else {
				$registro = "<li ><a href='{$ruta}{$accionRegistro}'>Registrate aqui</a></li>
				<hr>";
			}
		} else {
			$registro = "<li ><a href='{$ruta}{$accionRegistro}'>Registrate aqui</a></li>
		<hr>";
		}
		
		$contenido = "
		<div class=' col-xs-3 col-md-2 lateral'>
		<div id='lateral'>
		
			<ul class='nav nav-pills nav-stacked'>
				$registro
				$aUsuario
				<li ><a class='busquedaAvanzada'>Busqueda avanzada</a></li>
				<hr>
				<li ><a onclick='showUser()'>Busqueda Juegos</a></li>
				<hr>
				<li ><a>Datos consola</a></li>
			</ul>
		</div>	
		</div>
		";
		return $contenido;
	}
	// cuando se registra añade por ajax al lateral las nuevas opciones que tendra el usuario
	static function construye2($session) {
		$aUsuario = "";
		$ruta = DIR_RAIZ_APP . INDEX;
		$accionModificacion="Usuario/ModificarPerfil";
		if (isset ( $session ['id'] )) {
			if ($session ['id'] != "") {
				$aUsuario = "<hr><li><a href='{$ruta}{$accionModificacion}>Perfil Usuario</a></li><hr>";
			}
		}
		
		$contenido = "
		<ul class='nav nav-pills nav-stacked'>
		$aUsuario
		<hr>
		<li ><a class='busquedaAvanzada'>Busqueda avanzada</a></li>
		<hr>
		<li ><a onclick='showUser()'>Busqueda Juegos</a></li>
		<hr>
		<li ><a>Datos consola</a></li>
		
		
		</ul>
		
		";
		print $contenido;
	}
}