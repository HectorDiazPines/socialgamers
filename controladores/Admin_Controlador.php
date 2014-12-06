<?php
class Admin_Controlador {
	
	static function inicio($mensaje){
		$titulo="ADMIN: SocialGamers";
		$contenido=VistaInicioAdmin::construye($mensaje);
		$paginaRegistrado = new PlantillaPaginaAdmin($titulo, $cabecera="",$contenido);
		$paginaRegistrado->mostrar();
	}
	
	static function portada(){
		$titulo="ADMIN: SocialGamers";
			$cabecera=VistaCabeceraAdmin::construye();
			$contenido=VistaPortadaAdmin::construye();
			$paginaRegistrado = new PlantillaPaginaAdmin($titulo, $cabecera,$contenido);
			$paginaRegistrado->mostrar();
	}
	
	static function login($request) {
		if(isset($request['correo']) && $request['correo'] =="admin" && $request['pass']=="admin"){
			$titulo="ADMIN: SocialGamers";
			$cabecera=VistaCabeceraAdmin::construye();
			$contenido=VistaPortadaAdmin::construye();
			$paginaRegistrado = new PlantillaPaginaAdmin($titulo, $cabecera,$contenido);
			$paginaRegistrado->mostrar();
		}else{
			$mensaje='No tiene permisos de acceso';
			self::inicio($mensaje);
		}
	}
	
	
	static function usuarios($request,$propio) {
		$respuesta=ModeloAdmin::listadoUsuarios($request);
		$bloqueados=ModeloAdmin::listadoBloqueados($request);
		$bajas=ModeloAdmin::listadoBajas($request);
		$titulo="ADMIN: Listado Usuarios";
		$cabecera=VistaCabeceraAdmin::construye();
		$contenido=VistaListadoUsuarios::construye($request,$respuesta,$bloqueados,$bajas);
		$paginaRegistrado = new PlantillaPaginaAdmin($titulo, $cabecera,$contenido);
		$paginaRegistrado->mostrar();
	}
	
	static function juegos($request,$propio) {
		$titulo="ADMIN: Nuevo juego";
		$cabecera=VistaCabeceraAdmin::construye();
		$contenido=VistaInsertaJuegos::construye();
		$paginaRegistrado = new PlantillaPaginaAdmin($titulo, $cabecera,$contenido);
		$paginaRegistrado->mostrar();
	}
	
	static function insertaJuego($request,$propio) {
		$titulo="ADMIN: Listado Usuarios";
		ModeloAdmin::insertaJuego($request);
		self::inicio($mensaje="");
	}
	
	static function consolas($request,$propio) {
		$titulo="ADMIN: Nueva consola";
		$cabecera=VistaCabeceraAdmin::construye();
		$contenido=VistaInsertaConsolas::construye();
		$paginaRegistrado = new PlantillaPaginaAdmin($titulo, $cabecera,$contenido);
		$paginaRegistrado->mostrar();
	}
	
	static function insertaConsola($request,$propio) {
		ModeloAdmin::insertaConsola($request);
	}
	
	static function noticias($request,$propio) {
		$titulo="ADMIN: Nueva noticia";
		$cabecera=VistaCabeceraAdmin::construye();
		$contenido=VistaInsertaNoticias::construye();
		$paginaRegistrado = new PlantillaPaginaAdmin($titulo, $cabecera,$contenido);
		$paginaRegistrado->mostrar();
	}

	static function insertaNoticia($request,$propio) {
		ModeloAdmin::insertaNoticia($request);
	}
	
	static function eventos($request,$propio) {
		$titulo="ADMIN: Nuevo evento";
		$cabecera=VistaCabeceraAdmin::construye();
		$contenido=VistaInsertaEventos::construye();
		$paginaRegistrado = new PlantillaPaginaAdmin($titulo, $cabecera,$contenido);
		$paginaRegistrado->mostrar();
	}
	
	static function insertaEvento($request,$propio) {
		ModeloAdmin::insertaEvento($request);
	}
	
	static function bloquea_usuario($request,$propio) {
		$estado=ModeloAdmin::saberEstado($request);
		ModeloAdmin::bloqueaUsuario($request);
	}
	
	static function recuperar_cuenta($request,$sesion) {
		ModeloAdmin::recuperaCuenta($request);
		//self::listado($request, $propio="");
		header('Location:listado');
		exit();
	
	}
	

}
?>