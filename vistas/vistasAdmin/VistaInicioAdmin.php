<?php 

class VistaInicioAdmin {

  static function construye($mensaje="") {
  	$ruta = DIR_RAIZ_APP . INDEX2;
  	$img = DIR_RAIZ_APP . '/imagenes/';
  	$accion = "Admin/login";
  	$boton="";
  	$error="";
  	if($mensaje!=NULL){
  		$error=$mensaje;
  	}
  	$contenido = <<<CONT
<div class="container">
	<div id="content">
		<div class="post">
			<a href="#login-box" class="login-window"><img src="{$img}/logoadmin.png" id='logo'></a>
			<h1>$error</h1>
		</div>
        <div id="login-box" class="login-popup">
        <a href="#" class="close"><img src="{$img}/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
         <form role='form-inline' action='{$ruta}{$accion}' method='POST'>
         		
         		<div class='form-group'>
				    <label for='correo'>Correo electrónico</label>
				    <input type='text' class='form-control' name='correo' id='correo' placeholder='Correo electrónico' required>
				  </div>
         		<div class='form-group'>
				    <label for='pass'>Contraseña</label>
				    <input type='password' class='form-control' name='pass' id='pass' placeholder='Contraseña' required>
				  </div>
         		 <button type='submit' class='btn btn-success'>Iniciar sesión</button>
                </fieldset>
          </form>
		</div>
    
    </div>
</div>

CONT;
  			

    return $contenido;
  }
}
?>
