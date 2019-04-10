$(document).ready(function() {	

var id = '#dialog';
	
//coger dimension de imagen
var maskHeight = $(document).height();
var maskWidth = $(window).width();
	
//poner dimension para ocultar la pantalla
$('#mask').css({'width':maskWidth,'height':maskHeight});

//transicion efecto
$('#mask').fadeIn(500);	
$('#mask').fadeTo("slow",0.9);	
	
//coger dimension de la pantalla
var winH = $(window).height();
var winW = $(window).width();
              
//poner el popup en el centro
$(id).css('top',  winH/2-$(id).height()/2);
$(id).css('left', winW/2-$(id).width()/2);
	
//transicion efecto
$(id).fadeIn(2000); 	
	
//si se pulsa el boton de cerrar
$('.window .close').click(function (e) {
//cancela el link
e.preventDefault();

$('#mask').hide();
$('.window').hide();
});

//si se pulsa fuera del popup
$('#mask').click(function () {
$(this).hide();
$('.window').hide();
});
	
});