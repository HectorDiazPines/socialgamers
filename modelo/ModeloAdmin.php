<?php
require_once 'Usuario.php';
require_once 'modelo_Usuario.php'; 

class ModeloAdmin{
	
	static function saberEstado($request) {
		$conexion = BBDD::conecta();
		if(isset($request['id'])){
			$id=$request['id'];
			$correo="";
		}else{
			$correo=$request['correo'];
			$id="";
		}
			
		if ($conexion) {
			$consultaSQL="SELECT estado FROM usuarios WHERE id = :id OR correo = :correo";
			$consulta=$conexion->prepare($consultaSQL);
			$resultado=$consulta->execute(array(":id"=>"$id",":correo"=>"$correo"));
			if ($resultado) {
				foreach ($consulta as $estado) {
				}
			}
			return $estado[0];
		}
	}
	
	static function saberSancion($request) {
		$conexion = BBDD::conecta();
		if(isset($request['id'])){
			$id=$request['id'];
			$correo="";
		}else{
			$correo=$request['correo'];
			$id="";
		}
		$sancion=array();
		if ($conexion) {
			$consultaSQL="SELECT id_usuario, motivo, fecha_fin FROM sanciones WHERE id_usuario IN(SELECT id FROM usuarios WHERE correo = :correo)";
			$consulta=$conexion->prepare($consultaSQL);
			$resultado=$consulta->execute(array(":correo"=>"$correo"));
			if ($resultado) {
				foreach ($consulta as $estado) {
					$sancion=$estado;
				}
			}
			return $sancion;
		}
	}
	
	static function listadoUsuarios($request) {
		$conexion = BBDD::conecta();
		if ($conexion) {
			$consultaSQL="SELECT * FROM usuarios";
			$consulta=$conexion->prepare($consultaSQL);
			$resultado=$consulta->execute(array());
			$usuarios = array();
			if ($resultado) {
				foreach ($consulta as $fila) {
					$unUsuario = new Usuario($fila['id'], $fila['usuario'], $fila['correo'], $fila['pass'],$fila['fecha_nacimiento'],$fila['fecha_alta'], $fila['foto'], $fila['pais'],$fila['ciudad'], $fila['genero'],$fila['estado']);
					$usuarios[] = $unUsuario;
				}
			}
			return $usuarios;
		}
	}
	
	static function listadoBloqueados($request) {
		$conexion = BBDD::conecta();
			if ($conexion) {
			$consultaSQL="SELECT* FROM usuarios WHERE estado = :estado";
			$consulta=$conexion->prepare($consultaSQL);
			$resultado=$consulta->execute(array(":estado"=>"sancionado"));
	
			$usuarios = array();
			if ($resultado) {
				foreach ($consulta as $fila) {
					$unUsuario = new Usuario($fila['id'], $fila['usuario'], $fila['correo'], $fila['pass'],$fila['fecha_nacimiento'],$fila['fecha_alta'], $fila['pais'], $fila['ciudad'],$fila['foto'], $fila['genero'],$fila['estado']);
					$usuarios[] = $unUsuario;
				}
			}
			return $usuarios;
		}
	}
	
	static function listadoBajas($request) {
		$conexion = BBDD::conecta();
		if ($conexion) {
			$consultaSQL="SELECT * FROM usuarios WHERE estado = :estado";
			$consulta=$conexion->prepare($consultaSQL);
			$resultado=$consulta->execute(array(":estado"=>"baja"));
	
			$usuarios = array();
			if ($resultado) {
				foreach ($consulta as $fila) {
					$unUsuario = new Usuario($fila['id'], $fila['usuario'], $fila['correo'], $fila['pass'],$fila['fecha_nacimiento'],$fila['fecha_alta'], $fila['pais'], $fila['ciudad'],$fila['foto'], $fila['genero'],$fila['estado']);
					$usuarios[] = $unUsuario;
				}
			}
			return $usuarios;
		}
	}
	static function bloqueaUsuario($request) {
		$conexion = BBDD::conecta();
		$id=$request['id'];
		$motivo=$request['motivo'];
		$fecha = mktime(0, 0, 0, date("m"), date("d")+15, date("Y"));
		$fecha2=date("Y/m/d", $fecha);
		if ($conexion) {
			$consultaSQL="UPDATE usuarios SET estado=:estado WHERE id =:id";
			$consulta=$conexion->prepare($consultaSQL);
			$resultado=$consulta->execute(array(":estado"=>"sancionado",":id"=>"$id"));
			
			$consultaSQL2="INSERT INTO `sanciones` (`id_usuario`, `motivo`, `fecha_fin`) VALUES (:id_usuario, :motivo, :fecha_fin)";
			$consulta2=$conexion->prepare($consultaSQL2);
			$resultado2=$consulta2->execute(array(":id_usuario"=>"{$id}",":motivo"=>"{$motivo}",":fecha_fin"=>"{$fecha2}"));
		}
	}
	static function recuperaCuenta($request) {
		$conexion = BBDD::conecta();
		if(isset($request['id'])){
			
			$id=$request['id'];
		}else{
			$id=$_SESSION['id'];
		}
	
		if ($conexion) {
			$consultaSQL="UPDATE usuarios SET estado=:estado WHERE id =:id";
			$consulta=$conexion->prepare($consultaSQL);
			$resultado=$consulta->execute(array(":estado"=>"activo",":id"=>"$id"));
		}
	}

	static function insertaJuego($request) {
		$nombre = $request ['nombre'];
		$num = $request ['num'];
		$fecha_venta = $request ['fecha_venta'];
		$descripcion =$request ['descripcion'];
		$consola = $request ['consola'];
		$genero = $request ['genero'];
		$imagen="imagensi";
		$online="si";
		// ---------------------Insertamos en la base de datos todos los datos del perfil
		$errores = "";
		$conexion = BBDD::conecta ();
		$arrayErrores = array (
				1062 => "Ya existe un usuario con ese correo",
				//	1452 => "El departamento ya existe o no existe el empleado jefe"
		);
		if ($conexion) {
			$consultaSQL = "INSERT INTO juegos (`nombre`, `anio`, `num_jugadores`, `online`,`categoria`,`descripcion`,`imagen`) VALUES(:nombre, :anio, :num_jugadores, :online,:categoria,:descripcion,:imagen)";
			$consulta = $conexion->prepare ( $consultaSQL );
			$resultado = $consulta->execute ( array (
					":nombre" => "$nombre",
					":anio" => "$fecha_venta",
					":num_jugadores" => "$num",
					":online" => "$online",
					":categoria" => "$genero",
					":descripcion" => "$descripcion",
					":imagen" => "$imagen"));
		
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

	}
	
	static function insertaNoticia($request) {
		$titular = $request ['titular'];
		$descripcion =$request ['descripcion'];
		$imagen="imagensi";
		// ---------------------Insertamos en la base de datos todos los datos del perfil
		$errores = "";
		$conexion = BBDD::conecta ();
		$arrayErrores = array (
				1062 => "Ya existe un usuario con ese correo",
				//	1452 => "El departamento ya existe o no existe el empleado jefe"
		);
		if ($conexion) {
			$consultaSQL = "INSERT INTO noticias (`titular`, `imagen`,`descripcion`) VALUES(:titular, :imagen, :descripcion)";
			$consulta = $conexion->prepare ( $consultaSQL );
			$resultado = $consulta->execute ( array (
					":titular" => "$titular",
					":imagen" => "$imagen",
					":descripcion" => "$descripcion"
					));
	
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
	
	}
	
	static function insertaEvento($request) {
		$nombre = $request ['nombre'];
		$descripcion =$request ['descripcion'];
		$imagen="imagensi";
		$formato="Y-m-d";
		$fecha=$request ['fecha'];
		//date_format($fecha, $formato);
// 		date_parse_from_format($formato, $fecha);
		// ---------------------Insertamos en la base de datos todos los datos del perfil
		$errores = "";
		$conexion = BBDD::conecta ();
		$arrayErrores = array (
				1062 => "Ya existe un usuario con ese correo",
				//	1452 => "El departamento ya existe o no existe el empleado jefe"
		);
		if ($conexion) {
			$consultaSQL = "INSERT INTO eventos (`nombre`, `imagen`,`descripcion`,`fecha`) VALUES(:nombre, :imagen, :descripcion,:fecha)";
			$consulta = $conexion->prepare ( $consultaSQL );
			$resultado = $consulta->execute ( array (
					":nombre" => "$nombre",
					":imagen" => "$imagen",
					":descripcion" => "$descripcion",
					":fecha"=> "$fecha"
			));
	
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
	
	}
	
	
	static function insertaConsola($request) {
		$nombre = $request ['nombre'];
		$descripcion =$request ['descripcion'];
		$imagen="imagensi";
		// ---------------------Insertamos en la base de datos todos los datos del perfil
		$errores = "";
		$conexion = BBDD::conecta ();
		$arrayErrores = array (
				1062 => "Ya existe un usuario con ese correo",
				//	1452 => "El departamento ya existe o no existe el empleado jefe"
		);
		if ($conexion) {
			$consultaSQL = "INSERT INTO consolas (`nombre`,`descripcion`,`imagen`) VALUES(:nombre, :descripcion, :imagen)";
			$consulta = $conexion->prepare ( $consultaSQL );
			$resultado = $consulta->execute ( array (
					":nombre" => "$nombre",
					":descripcion" => "$descripcion",
					":imagen" => "$imagen"));
	
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
	
	}
	
}

?>
