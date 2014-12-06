<?php
class VistaDetalleJuego {
	static function construye($datosJuego) {
		$ruta = DIR_RAIZ_APP;
		$detalle = "";
		$idjuego = $datosJuego->devuelveId_juego ();
		$imagen = $datosJuego->devuelveImagen ();
		$nombre = $datosJuego->devuelveNombre ();
		$anio = $datosJuego->devuelveAnio ();
		$num_ju = $datosJuego->devuelveNum_jugadores ();
		$online = $datosJuego->devuelveOnline ();
		$categoria = $datosJuego->devuelveCategoria ();
		$descipcion = $datosJuego->devuelveDescripcion ();
		$puntuacion = $datosJuego->devuelvePuntuacion ();
		$consola = $datosJuego->devuelveConsola ();
		$detalle = "
	<div class='col-sm-12'>
		<div class='col-md-12 nomJuego'>
			<h1>$nombre</h1>
		</div>
		<div class='col-sm-4  imgJuego'>
		<div class='wrapper'><!-- /wrapper -->
				<ul class='stage clearfix'>
					<li class='scene'>
						<div class='game' onclick='return true'>
							<img class='poster' src='{$ruta}/imagenes/$imagen'>
							<div class='info'>
								<header>
									<h1>$nombre</h1>
								</header>
								<p>$descipcion</p>
							</div>
						</div>
					</li>
				</ul>
			</div><!-- /wrapper -->
		</div>
		<div class='col-sm-5 col-sm-offset-1 datosJuego'>			
			<table class='col-sm-12 tabladatos'>
				<tr>
					<td>Fecha venta :</td><td>$anio</td>
				</tr>
				<tr>
					<td>Nº jugadores :</td><td>$num_ju</td>
				</tr>
				<tr>
					<td>Online :</td><td>$online</td>
				</tr>
				<tr>
					<td>Categoria :</td><td>$categoria</td>
				</tr>
				<tr>
					<td>Consolas :</td><td>$consola</td>
				</tr>
				<tr>
				<div class='container'>

  <td>  <input id='input-2b' type='number' class='rating' min='0' max='5' step='0.5' data-size='xl'
    data-symbol='&#xe005;' data-default-caption='{rating} hearts' data-star-captions='{}'>
</td>
				</div>
				</tr>
			</table>
		</div>
		
	<div class='clearfixed'>
	
	<div class='col-sm-12 comentarios'></div>
	
	</div>
	";
		
		echo $detalle;
	}
}
?>