var map; //140
function initMap() {
	//console.log(opciones); // 147 para saber si esta jalando las variables de php
	var latLng = {
		lat: parseFloat(opciones.latitud),
		lng: parseFloat(opciones.longuitud)
	}

  map = new google.maps.Map(document.getElementById('mapa'), {
  center: latLng, //{lat: 20.674537, lng: -103.387821}, se pasa el valo del objeto
  zoom: parseInt(opciones.zoom)
});
  var marker = new google.maps.Marker({
  	position: latLng,
  	map: map,
  	title: 'La Pizzeria'
  });
}

$ = jQuery.noConflict();

$(document).ready(function(){

	// Ocultar y Mostrar menu
	$('.mobile-menu a').on('click', function(){
		$('nav.menu-sitio').toggle('slow');
	});

	// Reaccinaer a Resize en la pantalla
	var breakpoint = 768;

	$(window).resize(function(){
		if($(document).width() >= breakpoint){
			$('nav.menu-sitio').show();
		}else{
			$('nav.menu-sitio').hide();
		}
	});

	// Ajustar Mapa //141
	var mapa = $('#mapa');
	if(mapa.length > 0){ //si exite
		if($(document).width() >= breakpoint){
			ajustarMapa(0);
		}else{
			ajustarMapa(300);
		}

	}

	//Fliudbox
	jQuery('.gallery a').each(function(){
		jQuery(this).attr({'data-fluidbox' : ''});
	});

	if(jQuery('[data-fluidbox]').length > 0){
	   jQuery('[data-fluidbox]').fluidbox();
	}

	function ajustarMapa(altura){
		if(altura == 0){
			var ubicacionSection = $('.ubicacion-reservacion');
			var ubicacionAltura = ubicacionSection.height();
			$('#mapa').css({'height': ubicacionAltura}); //map.css
		}else{
			$('#mapa').css({'height': altura});  
		}
		$(window).resize(function(){
			if($(document).width() >= breakpoint){
			ajustarMapa(0);
			}else{
				ajustarMapa(300);
			}
		});
		
	}
});