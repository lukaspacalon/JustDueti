/** SLIDER */

"use strict";

jQuery(function ($) {
	$('#slider').addClass("slider");
	
	$('#navigation').on("click","a",function(event) {
		event.preventDefault();
		console.log("click sur : ", $(this) );
		
		var idSlide=$(this).attr("href");
		var slide=$(idSlide);
		var posX=slide.position().left;
		$('#slider .contenu').animate({left:-posX});
	});

});

/** HOOVER : CHANGEMENT DE COULEUR */

$(document).ready(function(){
	// Supprime les info-bulles
	$('#hover a').attr("title","");

	$('.case').hover(function(){
		$(".img_couleur", this).stop().animate({opacity:'0.99'},{queue:false,duration:200});
	}, function() {
		$(".img_couleur", this).stop().animate({opacity:'0'},{queue:false,duration:500});
	});


});



/**
 * @author lpacalon
 */

