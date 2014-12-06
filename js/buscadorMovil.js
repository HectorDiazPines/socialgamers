/**
 * sirve para mover el buscador
 */
$('document').ready(function() {

	$('.busquedaAvanzada').click(function(env) {
	    
	    $('.busca-movil ').animate({
	    	left: "36%",
	      
	    }, 1500, "swing");

	  });
	$('.stop').click(function(env) {
	    
	    $('.busca-movil ').animate({
	    	left: "-630px"
	    }, 1500, "swing");

	  });	
//$('.play').click(function(env) {
//    
//    $('.busca-movil ').animate({
//    	right: "0",
//      
//    }, 1500, "swing");
//   
//   
//	$(this).hide();
//	$(".stop").show();
//    
//    
//  });


  });
