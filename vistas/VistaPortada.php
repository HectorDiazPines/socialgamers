<?php
class VistaPortada {
	static function construye($datosNoticias,$datosEventos) {
		$ruta = DIR_RAIZ_APP;
		$contenido="";
		$accionLogin="Usuario/login_usuario";
		$accion="Juego/inicio";
		$accionRegistro = "Usuario/alta_usuario_get";
		$contenido.="		
		
	<div class='bs-example'>
	
    <div id='myCarousel' class='carousel slide' data-ride='carousel' data-interval='false'>
    	
        <ol class='carousel-indicators'>
            <li data-target='#myCarousel' data-slide-to='0' class='active'></li>
            <li data-target='#myCarouse2' id='myCarouse2' data-slide-to='1'></li>
            <li data-target='#myCarouse3' data-slide-to='2'></li>
        </ol>   
       
        <div class='carousel-inner'>
            <div class='active item'>
          		<img src='{$ruta}/imagenes/estreno5.jpg' id='estreno'> 
            </div>
            <div class='item dos' id='dos'>
            	<video src='{$ruta}/imagenes/video2.mp4' poster='{$ruta}/imagenes/estreno5.jpg' id='video' controls></video>
            </div>
            <div class='item' id='tres'>
                 <div id='counter'>
                 </div>
				<div class='desc'>
					<div>Días</div>
					<div>Horas</div>
					<div>Minutos</div>
					<div>Segundos</div>
				</div>
            </div>
        </div>
       
        <a class='carousel-control left' href='#myCarousel' data-slide='prev'>
            <span class='glyphicon glyphicon-chevron-left'></span>
        </a>
        <a class='carousel-control right' href='#myCarousel' data-slide='next'>
            <span class='glyphicon glyphicon-chevron-right'></span>
        </a>
    </div>
</div>
<div class='clearfix'></div>
		<div class='col-md-12 general'>
			<div class='col-md-7 anuncios' id='anuncios'>
			<h1><b>NOTICIAS</b></h1> 
				<table class='table col-md-8 table-hover divanuncio'>";
					for($i = 0; $i < sizeof ( $datosNoticias ); $i ++) {
						$tama=sizeof($datosNoticias);
						$id=$datosNoticias[$i]->devuelveId();
						$titular=$datosNoticias[$i]->devuelveTitular();
						$fecha = $datosNoticias [$i]->devuelveFecha();
						$fecha_sin_hora=substr($fecha, 0, 10);
						$descipcion = $datosNoticias [$i]->devuelveDescripcion ();
						$imagen = $datosNoticias [$i]->devuelveImagen ();
						$contenido.="
							<tr height='65px' onclick='abreNoticia($id)'>
								<td><img class='imgcara' class='img-rounded' src='{$ruta}/imagenes/$imagen' width='70px' height='40px' ></td>
								<td><b>$titular</b></td>
								<td width='13%'>$fecha_sin_hora</td>
								
							</tr>";
						}
				$contenido.="
						</table>
							<ul class='pager'>
							  <li class='previous disabled'><a href='#'>&larr; Anterior</a></li>
							  <li class='next'><a href='#'>Siguiente &rarr;</a></li>
							</ul>
				</div>
				<div class='col-md-4 eventos'> 
						<h1><b>EVENTOS 2014</b></h1> 
				<table class='table col-md-12 table-hover divanuncio'>";
					for($i = 0; $i < sizeof ( $datosEventos ); $i ++) {
						$tama=sizeof($datosEventos);
						$idjuego=$datosEventos[$i]->devuelveId();
						$titular=$datosEventos[$i]->devuelveNombre();
						$fecha = $datosEventos [$i]->devuelveFecha();
						$descipcion = $datosEventos [$i]->devuelveDescripcion ();
						$imagen = $datosEventos [$i]->devuelveImagen ();
						$contenido.="
							<tr height='65px' >
								<td><img class='imgcara' class='img-rounded' src='{$ruta}/imagenes/$imagen'height='30px' width='150px'></td>
								<td><b>$titular</b></td>
							</tr>";
						}
				$contenido.="</table>
						
			</div></div><br>";
		return $contenido;
	}
	
static function pintaNoticia($datosNoticias) {
		$noticias="";
		$ruta = DIR_RAIZ_APP;
		$cont=0;
		$noticias.="<table class='table'>";
		for($i = 0; $i < sizeof ( $datosNoticias ); $i ++) {
			$id=$datosNoticias[$i]->devuelveId();
			$titular=$datosNoticias[$i]->devuelveTitular();
			$fecha = $datosNoticias [$i]->devuelveFecha();
			$descripcion = $datosNoticias [$i]->devuelveDescripcion ();
			$imagen = $datosNoticias [$i]->devuelveImagen ();
			$noticias.="
			<tr>
				<td><img class='imgcara' class='img-rounded' src='{$ruta}/imagenes/$imagen' ></td>
			</tr>
			<tr>
				<td><b>$titular</b></td>
			</tr>
			<tr>
				<td>$descripcion</td>
			</tr>";
		}
		$noticias.="</table>";
		echo $noticias;
	
	}
}	