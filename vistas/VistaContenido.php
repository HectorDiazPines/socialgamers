<?php
// vista contiene todo el contenido de los juegos y el buscador letras
class VistaContenido {
	static function construye($datosJuego) {
		$juego = "";
		$ruta = DIR_RAIZ_APP;
		$cont = 0;
		$cabeceraConsola = "";
		$juego .= "
				  
				<div class='busca-movil'>
				<form class='form-horizontal' role='form'>
					<div class='formu-busqueda'>
							<h3>Busqueda avanzada</h3>
				 				 	<div class='form-group col-sm-12 '>
				    					<label for='nom' class='col-sm-2 control-label'>Nombre:</label>
				   						<div class='col-sm-6 autocomplete'>
				      						<input type='text' class='form-control'  id='nom' data-source='{$ruta}/modelo/search.php?search='  placeholder='Nombre Juego'>
				   						 </div>
				 					 </div>
									 <div class='form-group col-sm-12'>
									    <label for='categoria' class='col-sm-2 control-label'>Género:</label>
									    <div class='col-sm-6'>
											 <select class='form-control' id='categoria'>
											  <option value=''></option>
											  <option value='estrategia'>Estretegia</option>
											  <option value='aventura'>Aventura</option>
											</select> 
									    </div>
									  </div>
									  <div class='form-group col-sm-12'>
									    <div class=' col-sm-12 bfecha'>
											<label for='fdesde' class='col-sm-3 control-label'>Fecha desde:</label>
					   						<div class='col-sm-3'>
												 <div class='form-group'>
									                <div class='input-group date' id='datetimepicker9'>
									                    <input type='text' class='form-control' data-date-format='DD/MM/YYYY' id='fdesde' name='fdesde'  />
									                    <span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span>
									                    </span>
									                </div>
									         </div>
					   						 </div>
												<label for='fhasta' class='col-sm-2 control-label'> hasta:</label>
				                        <div class=' col-sm-3'>
					                        <div class='form-group'>
									                <div class='input-group date' id='datetimepicker10'>
									                    <input type='text' class='form-control' data-date-format='DD/MM/YYYY' id='fhasta' name='fhasta'  />
									                    <span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span>
									                    </span>
									                </div>
									         </div>
								   		</div>
									      
									    </div>
									  </div>
									 <div class='form-group col-sm-12'>
									 <div class=' col-sm-12 bpuntuacion' >
									   
												<label for='pdesde' class='col-sm-2 control-label'>Puntuacion:</label>
					   						<div class='col-sm-2'>
					      						<select class='form-control' id='pdesde'>
													  <option value=''></option>
													  <option value='1'>1</option>
													  <option value='2'>2</option>
													  <option value='3'>3</option>
													  <option value='4'>4</option>
													  <option value='5'>5</option>
													  <option value='6'>6</option>
						 							  <option value='7'>7</option>
													  <option value='8'>8</option>
						 						      <option value='9'>9</option>
													  <option value='10'>10</option>
												</select> 					      						
					   						 </div>
											 	<label for='phasta' class='col-sm-1 control-label'> hasta:</label>
			                        				<div class='  col-sm-2'>
				      							<select class='form-control' id='phasta'>
												  <option value=''></option>
												  <option value='1'>1</option>
												  <option value='2'>2</option>
												  <option value='3'>3</option>
												  <option value='4'>4</option>
												  <option value='5'>5</option>
												  <option value='6'>6</option>
					 							  <option value='7'>7</option>
												  <option value='8'>8</option>
					 						      <option value='9'>9</option>
												  <option value='10'>10</option>
												</select> 					      						
					   						 </div>
									    </div>
									  </div>
									  <div class='form-group'>
									    <div class='col-sm-offset-2 col-sm-10'>
									      <button type='button' class='btn btn-default' onclick='buscaMovil()'>Buscar</button>
									    </div>
									  </div>
									
										</div>
					<div class='boton-busqueda'>
						
						<span class='glyphicon glyphicon-remove stop'></span>
		</div>
		</form>
	</div>
				<div class=' col-xs-12 juego' id='juego'>
					";
		if ($_SESSION ['consola'] == "") {
			$cabeceraConsola = "<th>Consolas</th>";
		}
		$juego .= "<div class=' col-xs-12 juego '>
				<table class='table table-hover tablajuego'>
				<thead>
				<tr>
				<th>#</th>
				<th>Foto</th>
				<th width='25%'>Nombre</th>
				<th>Fecha Venta</th>
				<th>Categoria</th>
				<th>Puntuacion</th>
				$cabeceraConsola
				</tr>
				</thead>
				<tbody>
				";
		if (sizeof ( $datosJuego ) == 0) {
			$juego .= "
						</tbody>
						</table>
				<p>No se encontraron datos con esa busqueda</p>
		</div>
					";
		} else {
			for($i = 0; $i < sizeof ( $datosJuego ); $i ++) {
				$tama = sizeof ( $datosJuego );
				$cont ++;
				$consola = "";
				$idjuego = $datosJuego [$i]->devuelveId_juego ();
				$imagen = $datosJuego [$i]->devuelveImagen ();
				$nombre = $datosJuego [$i]->devuelveNombre ();
				$anio = $datosJuego [$i]->devuelveAnio ();
				$num_ju = $datosJuego [$i]->devuelveNum_jugadores ();
				$online = $datosJuego [$i]->devuelveOnline ();
				$categoria = $datosJuego [$i]->devuelveCategoria ();
				$descipcion = $datosJuego [$i]->devuelveDescripcion ();
				$puntuacion = $datosJuego [$i]->devuelvePuntuacion ();
				if ($_SESSION ['consola'] == "") {
					$consola = $datosJuego [$i]->devuelveConsola ();
					$consola = "<td>$consola</td>";
				}
				
				$juego .= "
			<tr onclick='detalle($idjuego)'>
			<td>$cont</td>
			<td><img class='imgcara' class='img-rounded' src='{$ruta}/imagenes/$imagen' width='50px' heigth='50px'></td>
			<td><b>$nombre</b></td>
			<td>$anio</td>
			<td>$categoria</td>
			<td>$puntuacion</td>
			$consola
			</tr>";
			}
			
			$juego .= "
				</tbody>
				</table>
		</div>";
		}
		$contenido = "
				<div class='col-xs-8 col-md-10 contenido'>
				<div class='col-xs-12'>
				<div class='col-xs-10 col-sm-offset-1 btn-group buscaletra  onclick='showUser(this.value)'>
					  <button type='button' class='btn btn-warning' value='' onclick='showUser(this.value)'>Todo</button>
					  <button type='button' class='btn btn-warning' value='a' onclick='showUser(this.value)'>A</button>
					  <button type='button' class='btn btn-warning' value='b' onclick='showUser(this.value)'>B</button>
					  <button type='button' class='btn btn-warning' value='c' onclick='showUser(this.value)'>C</button>
					  <button type='button' class='btn btn-warning' value='d' onclick='showUser(this.value)'>D</button>
					  <button type='button' class='btn btn-warning' value='e' onclick='showUser(this.value)'>E</button>
					  <button type='button' class='btn btn-warning' value='f' onclick='showUser(this.value)'>F</button>
					  <button type='button' class='btn btn-warning' value='g' onclick='showUser(this.value)'>G</button>
					  <button type='button' class='btn btn-warning' value='h' onclick='showUser(this.value)'>H</button>
					  <button type='button' class='btn btn-warning' value='i' onclick='showUser(this.value)'>I</button>
					  <button type='button' class='btn btn-warning' value='j' onclick='showUser(this.value)'>J</button>
					  <button type='button' class='btn btn-warning' value='k' onclick='showUser(this.value)'>K</button>
					  <button type='button' class='btn btn-warning' value='l' onclick='showUser(this.value)'>L</button>
					  <button type='button' class='btn btn-warning' value='m' onclick='showUser(this.value)'>M</button>
					  <button type='button' class='btn btn-warning' value='n' onclick='showUser(this.value)'>N</button>
					  <button type='button' class='btn btn-warning' value='o' onclick='showUser(this.value)'>O</button>
					  <button type='button' class='btn btn-warning' value='p' onclick='showUser(this.value)'>P</button>
					  <button type='button' class='btn btn-warning' value='q' onclick='showUser(this.value)'>Q</button>
					  <button type='button' class='btn btn-warning' value='r' onclick='showUser(this.value)'>R</button>
					  <button type='button' class='btn btn-warning' value='s' onclick='showUser(this.value)'>S</button>
					  <button type='button' class='btn btn-warning' value='t' onclick='showUser(this.value)'>T</button>
					  <button type='button' class='btn btn-warning' value='u' onclick='showUser(this.value)'>U</button>
					  <button type='button' class='btn btn-warning' value='v' onclick='showUser(this.value)'>V</button>
					  <button type='button' class='btn btn-warning' value='w' onclick='showUser(this.value)'>W</button>
					  <button type='button' class='btn btn-warning' value='x' onclick='showUser(this.value)'>X</button>
					  <button type='button' class='btn btn-warning' value='y' onclick='showUser(this.value)'>Y</button>
					  <button type='button' class='btn btn-warning' value='z' onclick='showUser(this.value)'>Z</button>
					  
				</div>
				</div>
				<div class='clearfix'></div>
				$juego
			</div>";
		
		return $contenido;
	}
	static function pintaBusqueda($datosJuego) {
		$juego = "";
		$ruta = DIR_RAIZ_APP;
		$cont = 0;
		$cabeceraConsola = "";
		if ($_SESSION ['consola'] == "") {
			$cabeceraConsola = "<th>Consolas</th>";
		}
		$juego .= "<div class=' col-xs-12 juego '>
				<table class='table table-hover tablajuego'>
				<thead>
				<tr>
				<th>#</th>
				<th>Foto</th>
				<th width='25%'>Nombre</th>
				<th>Fecha Venta</th>
				<th>Categoria</th>
				<th>Puntuacion</th>
				$cabeceraConsola
				</tr>
				</thead>
				<tbody>
				";
		if (sizeof ( $datosJuego ) == 0) {
			$juego .= "
						</tbody>
						</table>
				<p>No se encontraron datos con esa busqueda</p>
		</div>
					";
		} else {
			
			for($i = 0; $i < sizeof ( $datosJuego ); $i ++) {
				$tama = sizeof ( $datosJuego );
				$cont ++;
				$consola = "";
				$idjuego = $datosJuego [$i]->devuelveId_juego ();
				$imagen = $datosJuego [$i]->devuelveImagen ();
				$nombre = $datosJuego [$i]->devuelveNombre ();
				$anio = $datosJuego [$i]->devuelveAnio ();
				$num_ju = $datosJuego [$i]->devuelveNum_jugadores ();
				$online = $datosJuego [$i]->devuelveOnline ();
				$categoria = $datosJuego [$i]->devuelveCategoria ();
				$descipcion = $datosJuego [$i]->devuelveDescripcion ();
				$puntuacion = $datosJuego [$i]->devuelvePuntuacion ();
				if ($_SESSION ['consola'] == "") {
					$consola = $datosJuego [$i]->devuelveConsola ();
					$consola = "<td>$consola</td>";
				}
				
				$juego .= "
			<tr onclick='detalle($idjuego)'>
			<td>$cont</td>
			<td><img class='imgcara' class='img-rounded' src='{$ruta}/imagenes/$imagen' width='50px' heigth='50px'></td>
			<td><b>$nombre</b></td>
			<td>$anio</td>
			<td>$categoria</td>
			<td>$puntuacion</td>
			$consola
			</tr>";
			}
			$juego .= "
				</tbody>
				</table>
		</div>";
		}
		echo $juego;
	}
}
?>



