<?php

class VistaPortadaAdmin {
	static function construye() {
		$ruta = DIR_RAIZ_APP;
		$ruta2 = DIR_RAIZ_APP . INDEX2;
		$accionCrearJuego = 'Admin/juegos';
		$accionCrearNoticia= 'Admin/noticias';
		$accionCrearEvento='Admin/eventos';
		$accionCrearConsola= 'Admin/consolas';
		$accionUsuario = 'Admin/usuarios';
		$accionCancelar = 'Juego/inicio';
		$contenido ="

<div class='codrops-top clearfix'>
<ul class='grid cs-style-3'>
	<li>
		<figure>
			<img src='{$ruta}/imagenes/usuario.png' alt='img01'>
			<figcaption>
				<h3>Usuarios</h3>
				<a href='{$ruta2}{$accionUsuario}'>Administrar</a>
			</figcaption>
		</figure>
	</li>
	<li>
		<figure>
			<img src='{$ruta}/imagenes/juego.png' alt='img02'>
			<figcaption>
				<h3>Juegos</h3>
				<a id='1' href='{$ruta2}{$accionCrearJuego}'>Crear</a>
				<a id='2' href='{$ruta2}{$accionCrearJuego}'>Editar</a>
			</figcaption>
		</figure>
	</li>
	<li>
		<figure>
			<img src='{$ruta}/imagenes/consola.png' alt='img05'>
			<figcaption>
			<h3>Consolas</h3>
			<a id='1' href='{$ruta2}{$accionCrearConsola}'>Crear</a>
				<a id='2' href='{$ruta2}{$accionCrearConsola}'>Editar</a>
			</figcaption>
		</figure>
	</li>
	<li>
		<figure>
			<img src='{$ruta}/imagenes/noticias.png' alt='img03'>
			<figcaption>
				<h3>Noticias</h3>
				<a id='1' href='{$ruta2}{$accionCrearNoticia}'>Crear</a>
				<a id='2' href='{$ruta2}{$accionCrearNoticia}'>Editar</a>
			</figcaption>
		</figure>
	</li>
	<li>
		<figure>
		<img src='{$ruta}/imagenes/eventos.png' alt='img06'>
			<figcaption>
				<h3>Eventos</h3>
				<a id='1' href='{$ruta2}{$accionCrearEvento}'>Crear</a>
				<a id='2' href='{$ruta2}{$accionCrearEvento}'>Editar</a>
			</figcaption>
		</figure>
	</li>
</ul>
</div><!-- /container -->	";
		
		return $contenido;
	}
}
?>