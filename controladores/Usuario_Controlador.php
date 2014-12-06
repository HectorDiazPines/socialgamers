<?php
class Usuario_Controlador {
	static function alta_usuario_get($request, $sesion) {
		$titulo = "Alta Usuario";
		$avisos = "";
		// $cabecera = VistaCabecera::construye((isset($_SESSION['usuarioRegistrado']))? $_SESSION['usuarioRegistrado'] : "");
		// $request = array (
		// "correo" => "",
		// "nombre" => "",
		// "apellido" => "",
		// "pass" => "",
		// "foto" => "",
		// "pais" => "",
		// "ciudad" => "",
		// "sexo" => "",
		// "fecha" => ""
		// );
		
		$contenido = VistaAltaUsuario::construye ( 'Alta' );
		// $opciones = array('post/listado'); // opciones a visualizar
		$paginaAcceso = new PlantillaPagina ( $titulo, $contenido );
		$paginaAcceso->mostrar ();
	}
	static function alta_usuario_post($request = "", $files = "", $sesion = "") {
		try {
			Modelo_Usuario::altaUsuario ( $request, $files );
			$titulo = "Usuario correctamente dado de alta";
			$contenido = VistaRegistrado::construye ();
			$paginaRegistrado = new PlantillaPagina ( $titulo, $contenido );
			$paginaRegistrado->mostrar ();
		} catch ( LogicException $le ) { // error en los campos enviados desde el formulario
			$titulo = "Error en el alta de usuario";
			$contenido = VistaRegistro::construye ( $request, $le->getMessage (), "alta" ); // se pasan los avisos recibidos
			$paginaErrorLogicaAltaUsuario = new PlantillaPagina ( $titulo, $contenido );
			$paginaErrorLogicaAltaUsuario->mostrar ();
		} catch ( Exception $e ) {
			$titulo = "Error en el proceso de alta de usuario";
			$contenido = VistaErrorAltaUsuario::construye ( $request ['nombre'], $e->getMessage () );
			$paginaErrorAltaUsuario = new PlantillaPagina ( $titulo, $contenido );
			$paginaErrorAltaUsuario->mostrar ();
		}
	}
	
	// ------------------------Pagina de inicio, Registro y alta--------------------------------------------------------------------
	static function cerrarSesion($request, $sesion) {
		session_destroy ();
		
		$mensaje = " fue desconectado con exito ";
		$_SESSION ['id'] = "";
		Juego_Controlador::inicio ( $request, $sesion );
	}
	static function login_usuario($request, $file) {
		if ($request ['pass'] != "" && $request ['correo'] != "") {
			if (modelo_Usuario::existeCorreo ( $request )) {
				if (modelo_Usuario::existeUsuario ( $request )) {
					$estado = ModeloAdmin::saberEstado ( $request );
					if ($estado == "activo") {
						$respuesta = modelo_Usuario::loginUsuario ( $request );
						$_SESSION ['usuario'] = $respuesta ['usuario'];
						$_SESSION ['correo'] = $respuesta ['correo'];
						$_SESSION ['id'] = $respuesta ['id'];
						
						$mensaje = "¡Hola " . $respuesta ['usuario'] . "!";
						VistaCabecera::pintaLogin ( $mensaje );
					} else {
						if ($estado == "sancionado") {
							;
							$sancion = ModeloAdmin::saberSancion ( $request );
							$mensaje = "Estas sancionado por: <b>" . $sancion [1] . "</b>. Hasta la fecha: <b>" . $sancion [2] . "</b>";
							$contenido = VistaCabecera::pintaMensaje ( $mensaje );
						} else {
							$mensaje = "El usuario se dio de baja";
							$contenido = VistaCabecera::pintaMensaje ( $mensaje );
						}
					}
				} else {
					$mensaje = "Contraseña incorrecta";
					$contenido = VistaCabecera::pintaMensaje ( $mensaje );
				}
			} else {
				$mensaje = "El correo no pertenece a ninguna cuenta";
				$contenido = VistaCabecera::pintaMensaje ( $mensaje );
			}
		} else {
			$mensaje = "Tienes que rellenar los dos campos";
			$contenido = VistaCabecera::pintaMensaje ( $mensaje );
		}
	}
	static function VerPerfil($request, $sesion) {
		$titulo = "VerPerfil";
		$avisos = "";
		$datosUsuario = modelo_Usuario::datosUsuario ( $request, $sesion );
		$datosConsola = Modelo_Juego::VerConsolas ();
		$cabecera = VistaCabecera::construye ( $datosConsola );
		$lateral = VistaLateral::construye ( $sesion );
		$contenido = VistaPerfilUsuario::construye($datosUsuario);
		$paginaAcceso = new PlantillaPagina ( $titulo, $cabecera, $lateral, $contenido );
		$paginaAcceso->mostrar ();
	}
	static function ModificarPerfil($request,  $sesion) {
		$titulo = "Modificar Perfil";
		$avisos = "";
		$datosUsuario = modelo_Usuario::datosUsuario ( $request, $sesion );
		
		
		$contenido =VistaAltaUsuario::construye("modificar",$datosUsuario);
		// $opciones = array('post/listado'); // opciones a visualizar
		
		$paginaAcceso = new PlantillaPagina ( $titulo, $contenido );
		$paginaAcceso->mostrar ();
	}
}
?>