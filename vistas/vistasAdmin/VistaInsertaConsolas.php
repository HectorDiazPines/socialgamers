<?php
class VistaInsertaConsolas {
	static function construye() {
		$ruta = DIR_RAIZ_APP . INDEX2;
		$accion = 'Admin/insertaConsola';
		$accionCancelar = 'Juego/inicio';
		$contenido ="
			<div class='col-xs-5 alta'>
			<form role='form' action='{$ruta}{$accion}' method='POST' enctype='multipart/form-data'>
				  <div class='form-group'>
				    <label for='nombre'>Nombre consola:</label>
				    <input type='text' class='form-control' name='nombre' id='nombre' placeholder='' required>
				  </div>
				 <div class='form-group'>
				    <label for='descripcion'>Descripción:</label>
				    <textarea class='form-control' rows='3' name='descripcion' id='descripcion'></textarea>
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
