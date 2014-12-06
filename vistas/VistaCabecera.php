<?php
//VIsta que contiene logo, formulario de login y registro o datos usuario
class VistaCabecera {
	//Funcion costruye. Genera el codigo html correspondiente a la cabecera
	static function construye($datosConsola) {
		//ruta y accion que debe realizar el formulario de registro
		$ruta = DIR_RAIZ_APP . INDEX;
		$ruta2 = DIR_RAIZ_APP;
		$accionLogin="Usuario/login_usuario";
		$accion="Juego/inicio";
		$accionRegistro = "Usuario/alta_usuario_get";
		$cerrarSesion="Usuario/cerrarSesion";
		$cabecera="";
		$cont=0;
		$idjuego="";
		
		if(!isset($_SESSION['id'])){
			$login="
					<form class='form-inline col-md-10 login-mensaje' role='form'  method='POST'>
							<input type='text' class='form-control' id='correo' name='correo' placeholder='Correo electrónico' required>
							<input type='password' class='form-control' id='pass' name='pass' placeholder='Contraseña'required>
							<button type='button' class='btn btn-default' onclick='login()'>Login</button>
					</form>
					<form class='form-inline col-md-2 registro-mensaje' role='form' action='{$ruta}{$accionRegistro}' method='POST'>
							<button type='submit' class='btn btn-default'>Registro</button>
					</form>
			";
		}else{
			if($_SESSION['id']==""){
				$login="<form class='form-inline col-md-10 login-mensaje' role='form'  method='POST'>
							<input type='text' class='form-control' id='correo' name='correo' placeholder='Correo electrónico' required>
							<input type='password' class='form-control' id='pass' name='pass' placeholder='Contraseña'required>
							<button type='button' class='btn btn-default' onclick='login()'>Login</button>
						</form>
					<form class='form-inline col-md-2 registro-mensaje' role='form' action='{$ruta}{$accionRegistro}' method='POST'>
							<button type='submit' class='btn btn-default'>Registro</button>
						</form>";
				
			}else{
			$login="<form class='form-inline desconectar' role='form' action='{$ruta}{$cerrarSesion}' method='POST'>¡Hola <b>{$_SESSION['usuario']}</b>!
						
							<input type='image' name='submit' src='{$ruta2}/imagenes/cerrar_sesion.png' border='0' alt='Submit' />
						</form>
						";
						
			}			
		}
		$cabecera.= "
				<div class='col-xs-12 logo-login' >
					<a href='{$ruta}juego/inicio'><img src='{$ruta2}/imagenes/logo.png' class=' col-xs-3' /></a>
					<div class='col-xs-9 log-reg' id='log-reg'>
						$login
					</div>	
				</div>
				<div class='col-xs-12 col-md-12 pestanas'>
					<ul class='nav nav-tabs nav-justified' role='tablist'>
						<li class='naranja'><a href='{$ruta}juego/inicio'><span class='glyphicon glyphicon-home'></span></a></li>
						<li class='negro' ><a href='{$ruta}juego/inicio2?consola=$idjuego'>Todos los juegos</a></li>";
		for($i = 0; $i < sizeof ( $datosConsola ); $i ++) {
			$cont++;
			
			$idjuego=$datosConsola[$i]->devuelveId();
			$nombre=$datosConsola[$i]->devuelveNombre();
			$descipcion = $datosConsola [$i]->devuelveDescripcion ();
			$imagen = $datosConsola [$i]->devuelveImagen ();
			if ($cont%2==0){
				$color="negro";
			    
			}else{
				$color="naranja";
			   
			}
				$cabecera.="		
				<li class=$color ><a href='{$ruta}juego/inicio2?consola=$idjuego'>$nombre</a></li>";
			}			
			$cabecera.="</ul>
				</div>";
		return $cabecera;
	}
	
	/// recibe mensaje de error al conectar, y pinta el error y el login de nuevo
	static function pintaMensaje($mensaje){
		$ruta = DIR_RAIZ_APP . INDEX;
		$ruta2 = DIR_RAIZ_APP;
		$accionLogin="Usuario/login_usuario";
		$accionRegistro = "Usuario/alta_usuario_get";
// 		if($login=="no"){
// 			$login="<span class='glyphicon glyphicon-off'></span>";
// 		}else{
// 			$login="<form class='form-inline' role='form' action='{$ruta}{$accionRegistro}' method='POST'>
// 			<input type='text' class='form-control' id='correo' name='correo' placeholder='Correo electrónico' required>
// 			<input type='password' class='form-control' id='pass' name='pass' placeholder='Contraseña'required>
// 			<button type='button' class='btn btn-default' onclick='login()'>Login</button>
// 			<button type='submit' class='btn btn-default'>Registro</button>
// 			</form>";
// 		}
		$error="<form class='form-inline col-md-10 login-mensaje' role='form'  method='POST'>
							<input type='text' class='form-control' id='correo' name='correo' placeholder='Correo electrónico' required>
							<input type='password' class='form-control' id='pass' name='pass' placeholder='Contraseña'required>
							<button type='button' class='btn btn-default' onclick='login()'>Login</button>
						</form>
					<form class='form-inline col-md-2 registro-mensaje' role='form' action='{$ruta}{$accionRegistro}' method='POST'>
							<button type='submit' class='btn btn-default'>Registro</button>
						</form>

		<p>$mensaje</p>
		";
		
		echo $error;
	}
	//cuando ya estas conectado pinta el nombre de usuario, deberia recibir los datos, el codigo html que se pinte aqui tiene que pintarse
	// tambien en la cabecera cuando vea que existe session(id) donde ahora pone un echo (dentro);
	static function pintaLogin($mensaje){
		
		$cerrarSesion="Usuario/cerrarSesion";
		$ruta = DIR_RAIZ_APP . INDEX;
		$ruta2 = DIR_RAIZ_APP;
		// 		if($login=="no"){
		// 			$login="<span class='glyphicon glyphicon-off'></span>";
		// 		}else{
		// 			$login="<form class='form-inline' role='form' action='{$ruta}{$accionRegistro}' method='POST'>
		// 			<input type='text' class='form-control' id='correo' name='correo' placeholder='Correo electrónico' required>
		// 			<input type='password' class='form-control' id='pass' name='pass' placeholder='Contraseña'required>
		// 			<button type='button' class='btn btn-default' onclick='login()'>Login</button>
		// 			<button type='submit' class='btn btn-default'>Registro</button>
		// 			</form>";
		// 		}
		$login="<form class='form-inline desconectar' role='form' action='{$ruta}{$cerrarSesion}' method='POST'>
		¡Hola <b>{$_SESSION['usuario']}</b>!
						
							<input type='image' name='submit' src='{$ruta2}/imagenes/cerrar_sesion.png' border='0' alt='Submit' />
						</form>
						";
		echo $login;
	}
}
?>
