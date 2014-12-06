<?php
class Juego_Controlador {
	
	// ------------------------------pagina para modificar imagen---------------------------------
	static function inicio($request, $sesion) {
		$titulo = "SocialGamers";
		if (! isset ( $_SESSION ['id'] )) {
			$_SESSION ['id'] = "";
		}
		
		$_SESSION ['consola'] = "";
		$datosConsola = Modelo_Juego::VerConsolas ();
		$cabecera = VistaCabecera::construye ( $datosConsola );
		$datosNoticias = Modelo_Portada::VerNoticias ();
		$datosEventos = Modelo_Portada::VerEventos ();
		$contenido = VistaPortada::construye ( $datosNoticias, $datosEventos );
		$paginaAcceso = new PlantillaPagina ( $titulo, $cabecera, $contenido );
		$paginaAcceso->mostrar ();
	}
	static function inicio2($request, $sesion) {
		$titulo = "Consolas";
		if (isset ( $request ['consola'] )) {
			$consola = $request ['consola'];
			$_SESSION ['consola'] = $consola;
		}
		
		$datosJuego = "";
		$datosJuego = Modelo_Juego::VerJuegos ( $sesion );
		$datosConsola = Modelo_Juego::VerConsolas ();
		$cabecera = VistaCabecera::construye ( $datosConsola );
		$lateral = VistaLateral::construye ( $sesion );
		$contenido = VistaContenido::construye ( $datosJuego );
		$paginaAcceso = new PlantillaPagina ( $titulo, $cabecera, $lateral, $contenido );
		$paginaAcceso->mostrar ();
	}
	static function consultaLetra($request, $sesion) {
		$q = $_GET ['q'];
		$titulo = "ConsultaLetra";
		$datosJuego = "";
		$datosJuego = Modelo_Juego::consultaLetra ( $q,$sesion );
		$contenido = VistaContenido::pintaBusqueda ( $datosJuego );
	}
	static function consultaMovil($request, $sesion) {
		$titulo = "consultaMovil";
		$datosJuego = "";
		$datosJuego = Modelo_Juego::consultaMovil ( $request,$sesion );
		$contenido = VistaContenido::pintaBusqueda ( $datosJuego );
	}
	static function detalleJuego($request, $sesion) {
		$titulo = "detalleJuego";
		$idjuego = $request ['idjuego'];
		$datosJuego = "";
		$datosJuego = Modelo_Juego::buscaJuegoId ( $idjuego,$sesion );
		$contenido = VistaDetalleJuego::construye ( $datosJuego );
	}
	static function cargarcambios($request, $sesion) {
		$titulo = "conectado";
		
		$lateral = VistaLateral::construye2 ( $sesion );
	}
}
?>