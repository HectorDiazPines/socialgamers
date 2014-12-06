<?php 

class VistaListadoUsuarios {

  static function construye($request,$respuesta="",$bloqueados="",$bajas="") {
  	$ruta = DIR_RAIZ_APP . INDEX2;
  	$img = DIR_RAIZ_APP . '/imagenes/';
  	$accion = "admin/bloquea_usuario";
  	$accion2 = "admin/recuperar_cuenta";
  	$boton="";
  	$contenido = <<<CONT
  	<form class='form-inline' role='form' action='{$ruta}{$accion}' method='POST'>
				  <div class='form-group'>
				    <label for='usuario'>Usuario</label>
				    &nbsp;
				    <input type='text' class='form-control' name='usuario' id='usuario' placeholder='Usuario' required>
				    &nbsp;
				    <label for='pais'>País</label>
				    &nbsp;
				    <input type='text' class='form-control ' name='pais' id='pais' placeholder='País' required>
				    &nbsp;
				    <label for='ciudad'>Ciudad</label>
				    &nbsp;
				    <input type='text' class='form-control' name='ciudad' id='ciudad' placeholder='Ciudad' required> 
					&nbsp;
					<label for='genero'>Género</label>
					&nbsp;
					<input type='radio' name='genero' id='mujer' value='mujer' checked> Mujer
					&nbsp;
					<input type='radio' name='genero' id='hombre' value='hombre'> Hombre
				  </div>				  
				 <a href='{$ruta}'><button type='button' class='btn btn-info'>Buscar</button></a>
			</form>
			
			
  		<table>
CONT;
  	for($i=0;$i<sizeof($respuesta);$i++){
  		$usuario=$respuesta[$i]->devuelveUsuario();
  		$id=$respuesta[$i]->devuelveId();
  		$icono="<img src='{$img}d.jpg' height='35px'>";
  		$boton="<form class='form-inline' role='form' name='agrega' action='{$ruta}{$accion}' method='GET'>
  		<input type='hidden' name='id' value={$id} />
  		 <div class='form-group'>

		<select name='motivo' class='form-control'>
			<option value='Publicar contenido inadecuado'>Publicar contenido inadecuado</option>
			<option value='Molestar a otros usuarios'>Molestar a otros usuarios</option>
			<option value='No respetar las normas'>No respetar las normas</option>
		</select>
  		<input type='submit' class='btn btn-danger' value='Bloquear' /></div>
  		</form>";
  	 	for($j=0;$j<sizeof($bloqueados);$j++){
  			$id2=$bloqueados[$j]->devuelveId();
  			if($id==$id2){
  				$icono="<img src='{$img}b.jpg' height='35px'>";
  				$boton="";
  			}
  		}
  		
  		for($j=0;$j<sizeof($bajas);$j++){
  			$id2=$bajas[$j]->devuelveId();
  			if($id==$id2){
  				$icono="<img src='{$img}baja2.jpg' height='45px'>";
  				$boton="<form role='form-inline' name='agrega' action='{$ruta}{$accion2}' method='GET'>
		  		<input type='hidden' name='id' value={$id}/>
		  		<button type='submit' class='btn btn-danger'>Recuperar cuenta</button>
		  		</form>";
  			}
  		}
  		/*for($h=0;$h<sizeof($pendientes);$h++){
  			$id2=$pendientes[$h]->devuelveId();
  			if($id==$id2){
  				$boton="<form name='agrega' action='' method='GET'>
  				<input type='hidden' name='id' value=$id />
  				<input type='submit' name='pendiente' id='pendiente' value='Solicitud pendiente' width='8%'/></form>
  				</form>";
  			}
  			} */
  		$foto=$respuesta[$i]->devuelveFoto();
  		$contenido.=<<<CONT
  	  		<tr>
  			<td><img src={$img}{$foto} height='50px' width='50px'/></td>
  			<td>{$usuario}</td>
  			<td>{$icono}</td>
  			<td>{$boton}</td>
  		
CONT;
  	}
 $contenido.=<<<CONT
  	</tr>
  	</table>
CONT;
  			

    return $contenido;
  }
}
?>
