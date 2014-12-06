<?php
//VIsta que contiene logo, formulario de login y registro o datos usuario
class VistaCabeceraAdmin {
	//Funcion costruye. Genera el codigo html correspondiente a la cabecera
	static function construye() {
		//ruta y accion que debe realizar el formulario de registro
		$ruta = DIR_RAIZ_APP . INDEX2;
		$ruta2 = DIR_RAIZ_APP;
		$accionLogin="Usuario/login_usuario";
		$accion="Juego/inicio";
		$accionRegistro = "Usuario/alta_usuario_get";
		$cerrarSesion="Juego/inicio";
		$cabecera="";
		$cont=0;
		
		$cabecera.= "
				<div class='col-xs-12 logo-login' >
					<a href='{$ruta}admin/portada'><img src='{$ruta2}/imagenes/logoadmin.png' class=' col-xs-5' /></a>
				</div>
				<div class='col-xs-12 col-md-12 pestanas'>
					<ul class='nav nav-tabs nav-justified' role='tablist'>
						<li class='naranja'><a href='#'><span class='glyphicon glyphicon-home'></span></a></li>
						<li class='negro' ><a href='{$ruta}admin/usuarios'><b>USUARIOS</b></a></li>
						<li class='naranja'><a href='{$ruta}admin/juegos'><b>JUEGOS</b></a></li>
						<li class='negro'><a href='{$ruta}admin/consolas'><b>CONSOLAS</b></a></li>
						<li class='naranja'><a href='{$ruta}admin/noticias'><b>NOTICIAS</b></a></li>
						<li class='negro'><a href='#'><b>EVENTOS</b></a></li>
					</ul>
				</div>";
		return $cabecera;
	}
}
?>
