<?php

require_once 'Usuario.php';

class modelo_Usuario {
	
	// ----------------------------------Comprueba si el usuario esta registrado---------------------
	static function usuarioRegistrado($correo, $clave) {
		$conexion = BBDD::conecta ();
		
		$consultaSQL = "SELECT correo, pass FROM  usuario WHERE correo= :correo";
		$consulta = $conexion->prepare ( $consultaSQL );
		$consulta->execute ( array (":correo" => $correo) );
		for($i = 0; $row = $consulta->fetch (); $i ++) {
			if ($row ['pass'] == $clave) {
				return true;
			} else {
				return false;
			}
		}
	}
	static function datosUsuario($request,$session){
		$id=$_SESSION['id'];
		$usu="";
		$conexion = BBDD::conecta ();
		$consultaSQL = "SELECT *  FROM  usuarios WHERE id= :id";
		$consulta = $conexion->prepare ( $consultaSQL );
		$resultado = $consulta->execute ( array (
				":id" => "$id"
		) );
		foreach ( $consulta as $dato ) {
			
			$usu = new  Usuario($dato['id'],$dato['usuario'],$dato['correo'],$dato['pass'],$dato['fecha_nacimiento'],$dato['fecha_alta'],$dato['foto'],$dato['pais'],$dato['ciudad'],$dato['genero'],$dato['estado']);
			
		}
		
		return $usu;
	}
	
	static function altaUsuario($request, $files) {
		// antes de intentar ninguna conexion, se revisa la logica de negocio, por ejemplo,
		// que se pase al menos un usuario, una contraseña y que la fecha de nacimiento sea correcta
	
		$avisos = self::verificacion_AltaUsuario ( $request, $files );
		$correo = $request ['correo'];
		// 		if($correo!="")
			// 			$avisos.=self::comprobar_email($correo);
		if ($avisos != "") // se ha producido algun error en la verificación
			throw new LogicException ( $avisos );
		else { // los campos recibidos desde el formulario cumplen las reglas de negocio
			 
			// --------------------------recogemos las variables enviadas or el formulario de alta--------
			
			$nombre_Fichero = "";
			$usuario = $request ['usuario'];
			$correo = $request ['correo'];
			$pass = $request ['pass'];
			$fecha_nacimiento = $request ['fecha_nacimiento'];
			$fecha_alta ="2014-02-02";
			$pais = $request ['pais'];
			$ciudad = $request ['ciudad'];
			$genero = $request ['genero'];
			$imagen="imagensi";
						// /------------------------------Le cambiamos el nombre a la imagen y le ponemos el nombre de su correo------------
// 			if (! empty ( $_FILES ['foto'] ['name'] )) {
// 				$nombrefile = $_FILES ['foto'] ['name'];
// 				if ($nombrefile != "") {
// 					$extension = explode ( ".", $nombrefile );
// 					$nombre_Fichero = $correo . "." . $extension [1];
// 				}
// 			}
			// ---------------------Insertamos en la base de datos todos los datos del perfil
			$errores = "";
			$conexion = BBDD::conecta ();
			$arrayErrores = array (
					1062 => "Ya existe un usuario con ese correo",
				//	1452 => "El departamento ya existe o no existe el empleado jefe"
			);
			if ($conexion) {
				$consultaSQL = "INSERT INTO usuarios (`usuario`,`correo`,`pass`,`fecha_nacimiento`,`fecha_alta`,`pais`,`ciudad`,`foto`,`genero`) VALUES(:usuario, :correo, :pass, :fecha_nacimiento, :fecha_alta, :pais, :ciudad, :foto, :genero)";
				$consulta = $conexion->prepare ( $consultaSQL );
			$resultado = $consulta->execute ( array (
					":usuario" => "$usuario",
					":correo" => "$correo",
					":pass" => "$pass",
					":fecha_nacimiento" => "$fecha_nacimiento",
					":fecha_alta" => "$fecha_alta",
					":pais" => "$pais",
					":ciudad" => "$ciudad",
					":foto" => "$imagen",
					":genero" => "$genero"));
				
				$err = $consulta->errorInfo ();
			}
			// ------------------------Si la consulta no funciona mostramos un error, y si funciona, movemos la foto a una carpeta------------
			if (! $resultado) {
	
				foreach ( $arrayErrores as $error => $mensaje ) {
					if ($error == $err [1]) {
						$avisos .= $mensaje;
					}
				}
			} else {
				if (! empty ( $_FILES ['foto'] ['name'] )) {
					$dir = "C:/xampp2/htdocs/socialgamers/imagenes";
					$tpm = $_FILES ["foto"] ['tmp_name'];
					move_uploaded_file ( $tpm, "$dir/$nombre_Fichero" );
				}
			}
				
			if ($avisos != "") // se ha producido alg�n error en la verificaci�n
				throw new LogicException ( $avisos );
		}
	
	}
	
	// --------------------Para comprobar que los campos no esten vacios y la imagen sea jpg.
	private static function verificacion_AltaUsuario($request, $files) {
		$avisos = "";
	
		if ($request ['usuario'] == "")
			$avisos .= "- El campo usuario no puede estar vacío" . "<br /> \n";
		if ($request ['correo'] == "")
			$avisos .= "- El campo correo no puede estar vacío" . "<br /> \n";
		if ($request ['pass'] == "")
			$avisos .= "- El campo contraseña no puede estar vacío" . "<br /> \n";
		if ($request ['fecha_nacimiento'] == "")
			$avisos .= "- El campo fecha de nacimiento no puede estar vacío" . "<br /> \n";
		if (! empty ( $_FILES ['foto'] ['name'] )) {
			$tipo = $_FILES ['foto'] ['type'];
			if ($tipo != "image/jpeg") {
				$avisos .= "- La imagen tiene que ser .jpg<br /> \n";
			}
		}
	
		return $avisos;
	}
	
	//COMPRUEBA SI EXISTE UN USUARIO EN LA BBDD PARA EL LOGIN
	static function existeCorreo($request) {
		$conexion = BBDD::conecta();
		if(isset($request['correo'])){
			$correo=$request['correo'];
			
		}else{
			$correo=$_SESSION['correo'];
		}
		if ($conexion) {
			$sql="SELECT * FROM usuarios WHERE correo = '$correo'";
			$consulta=$conexion->query($sql);
			if($resultado=$consulta->fetchAll()){
				return true;		
			}else{
				return false;
				
			}
		}
	}
	
	//COMPRUEBA SI EXISTE UN USUARIO CON ESE CORREO Y ESA PASS PARA EL LOGIN
	static function existeUsuario($request) {
		$conexion = BBDD::conecta();
		$correo=$request['correo'];
		$pass=$request['pass'];
		if ($conexion) {
			$sql="SELECT * FROM usuarios WHERE correo = '$correo' and pass = '$pass'";
			$consulta=$conexion->query($sql);
			if($resultado=$consulta->fetchAll()){
				return true;
			}else{
				return false;
			}
		}
	}
	
	//MUESTRA LOS DATOS DEL USUARIO QUE HACE LOGIN
	//CUANDO SOLO CONOCEMOS SU CORREO Y GUARDA LA ID EN UNA SESSION
	
	static function loginUsuario($request) {
		$conexion = BBDD::conecta();
			$correo=$request['correo'];
		if ($conexion) {
			$sql="SELECT * FROM usuarios WHERE correo = '$correo'";
			foreach ($conexion->query($sql) as $registro) {

				return $registro;
			}
		}
	}
	
	static function darseBaja($request) {
		$conexion = BBDD::conecta();
		if(isset($_SESSION['id'])){
			$id=$_SESSION['id'];
		}else{
			$id=$request['id'];
		}
	
		if ($conexion) {
			$consultaSQL="UPDATE usuarios SET estado=:estado WHERE id =:id";
			$consulta=$conexion->prepare($consultaSQL);
			$resultado=$consulta->execute(array(":estado"=>"baja",":id"=>"$id"));
		}
	}
	
	static function recuperaCuenta($request) {
		$conexion = BBDD::conecta();
		if(isset($_SESSION['id'])){
			$id=$_SESSION['id'];
		}else{
			$id=$request['id'];
		}
		if ($conexion) {
			$consultaSQL="UPDATE usuarios SET estado=:estado WHERE id =:id";
			$consulta=$conexion->prepare($consultaSQL);
			$resultado=$consulta->execute(array(":estado"=>"activo",":id"=>"$id"));
		}
	}
}
?>