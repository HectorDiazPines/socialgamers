<?php
class VistaInsertaJuegos {
	static function construye() {
		$ruta = DIR_RAIZ_APP . INDEX2;
		$accion = 'Admin/insertaJuego';
		$accionCancelar = 'Juego/inicio';
		$contenido ="
			<div class='col-xs-5 alta'>
			<form role='form' action='{$ruta}{$accion}' method='POST' enctype='multipart/form-data'>
				  <div class='form-group'>
				    <label for='nombre'>Nombre Juego:</label>
				    <input type='text' class='form-control' name='nombre' id='nombre' placeholder='Correo electrónico' required>
				  </div>
				 <div class='form-group'>  
					<label for='fecha_venta'>Fecha de venta:</label>
					<div class='input-group datepicker'>
					    <input type='text' class='form-control date' data-date-format='DD/MM/YYYY' name='fecha_venta' id='fecha_venta' placeholder='Fecha venta' required>
					    <span class='input-group-addon '>
	   				 		<span class='glyphicon-calendar glyphicon ' id='dialog'></span>
						</span>
			  	 	</div>
			  	 </div>
			  	  <div class='form-group'>
				    <label for='num'>Nº Jugadores:</label>
				    <input type='text' class='form-control' name='num' id='num' required>
				  </div>
				<div class='form-group'>  
				 <label for='categoria'>Género:</label>
					 <select class='form-control' id='genero' name='genero'>
					  <option value=''></option>
					  <option value='estrategia'>Estretegia</option>
					  <option value='aventura'>Aventura</option>
					</select> 
			    </div>
				 <div class='form-group'>
				    <label for='descripcion'>Descripcion:</label>
				    <textarea class='form-control' rows='3' name='descripcion' id='descripcion'></textarea>
				  </div>
				  <div class='form-group'>  
					<label for='consolas'>Consolas</label>
					<div>
					<label class='checkbox-inline'>
					    <input type='checkbox' name='consola' id='PS3' value='PS3'> PS3
					</label>
					<label class='checkbox-inline'>
					    <input type='checkbox' name='consola' id='PS4' value='PS4'> PS4
					 </label>
					<label class='checkbox-inline'>
					    <input type='checkbox' name='consola' id='XBOX360' value='XBOX360'> XBOX 360
					 </label>
					<label class='checkbox-inline'>
					    <input type='checkbox' name='consola' id='XBOXONE' value='XBOXONE'> XBOX ONE
					  </label>
					<label class='checkbox-inline'>
					    <input type='checkbox' name='consola' id='PC' value='PC'> PC
					    </label>
					</div>
				</div>
				
     			<div class='form-group'>
				    <label for='foto'>Foto</label>
				    <input type='file' id='foto' name='foto' class='filestyle' accept='image/*' data-buttonName='btn-primary'>
				  </div>
				  <button type='submit' class='btn btn-success'>Añadir</button>
				  <button type='reset' class='btn btn-warning'>Borrar</button>
				  <a href='{$ruta}{$accionCancelar}'><button type='button' class='btn btn-danger'>Cancelar</button></a>
			</form>
		</div>
		</div>
				
				";
		
		return $contenido;
	}
}
?>
