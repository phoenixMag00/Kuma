jQuery(document).ready(function($) {
    $('#slider').nivoSlider({
		effect: 'fade',
		animSpeed: 250, // Slide transition speed
		pauseTime: 9000 // How long each slide will show	
    });
    
    $('#slider').bind( 'swipeleft', function( e ) {
		$('a.nivo-nextNav').trigger('click');
		e.stopImmediatePropagation();
		return false; } 	
	);  

	$('#slider').bind( 'swiperight', function( e ) {
		$('a.nivo-prevNav').trigger('click');
		e.stopImmediatePropagation();
		return false; } 
	
	); 

});