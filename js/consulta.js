function showUser(str) {
	
	if(!str){
		str="";
	}
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("juego").innerHTML=xmlhttp.responseText;
      
      $(".tablajuego").DataTable({
  		"pagingType": "full_numbers"
  		
  	});
    }
  }
  xmlhttp.open("GET","/socialgamers/entrada.php/Juego/consultaLetra?q="+str,true);
  xmlhttp.send();
}

function buscaMovil() {
	var nom=$("#nom").val();
	var categoria=$("#categoria").val();
	var fechadesde=$("#fdesde").val();
	var fechahasta=$("#fhasta").val();
	var puntdesde=$("#pdesde").val();
	var punthasta=$("#phasta").val();
	
	
	if (window.XMLHttpRequest) {
	    // code for IE7+, Firefox, Chrome, Opera, Safari
	    xmlhttp=new XMLHttpRequest();
	  } else { // code for IE6, IE5
	    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange=function() {
	    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	      document.getElementById("juego").innerHTML=xmlhttp.responseText;
	      $(".tablajuego").DataTable({
	    		"pagingType": "full_numbers"
	    		
	    	});
	    }
	  }
	  xmlhttp.open("GET","/socialgamers/entrada.php/Juego/consultaMovil?q="+nom+"& c="+categoria+"& fd="+fechadesde+"& fh="+fechahasta+"& pd="+puntdesde+"& ph="+punthasta,true);
	  xmlhttp.send();  
}