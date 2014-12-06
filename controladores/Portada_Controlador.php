<?php

class Portada_Controlador {
	
	static function consultaNoticias($request, $sesion) {
		$titulo = "Inicio";
		$datosJuego="";
		$datosNoticias= Modelo_Portada::VerNoticias();
		$contenido= VistaPortada::construye($datosNoticias);
	}
	
	static function consultaMovil($request, $sesion) {
		$titulo = "Inicio";
		$datosJuego="";
		$datosJuego= Modelo_Juego::consultaMovil($request);
		$contenido= VistaContenido::pintaBusqueda($datosJuego);
	}
	
	static function abreNoticia($request, $sesion) {
		$id = $request['id'];
		$titulo = "ConsultaLetra";
		$datosJuego="";
		$datosJuego= Modelo_Portada::abreNoticia($id);
		$contenido= VistaPortada::pintaNoticia($datosJuego);
	}
}
?>