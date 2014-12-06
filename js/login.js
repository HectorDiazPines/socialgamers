function login() {
	var correo=$("#correo").val();
	var pass=$("#pass").val();
	
	if (window.XMLHttpRequest) {
	    // code for IE7+, Firefox, Chrome, Opera, Safari
	    xmlhttp=new XMLHttpRequest();
	  } else { // code for IE6, IE5
	    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange=function() {
	    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	    	
	      document.getElementById("log-reg").innerHTML=xmlhttp.responseText;
	      cargarcambiosLateral();
	    }
	  }
	  xmlhttp.open("GET","/socialgamers/entrada.php/Usuario/login_usuario?correo="+correo+"& pass="+pass,true);
	  xmlhttp.send();  
}

function cerrarSesion() {
	
	if (window.XMLHttpRequest) {
	    // code for IE7+, Firefox, Chrome, Opera, Safari
	    xmlhttp=new XMLHttpRequest();
	  } else { // code for IE6, IE5
	    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange=function() {
	    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	    	
	      document.getElementById("log-reg").innerHTML=xmlhttp.responseText;
	      url = "/socialgamers/entrada.php";
	      $(location).attr('href',url);
	 
	    }
	  }
	  xmlhttp.open("GET","/socialgamers/entrada.php/Usuario/cerrarSesion",true);
	  xmlhttp.send();  
}

//funcion que al hacer login recargar la vista lateral para que aparezcan las nuevas opciones;

function cargarcambiosLateral() {
	
	if (window.XMLHttpRequest) {
	    // code for IE7+, Firefox, Chrome, Opera, Safari
	    xmlhttp=new XMLHttpRequest();
	  } else { // code for IE6, IE5
	    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange=function() {
	    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	    	
	      document.getElementById("lateral").innerHTML=xmlhttp.responseText;
	    
	 
	    }
	  }
	  xmlhttp.open("GET","/socialgamers/entrada.php/Juego/cargarcambios",true);
	  xmlhttp.send();  
}

