jQuery(document).ready(function($) {

	//Below is Support for Swiping the Homepage Feature (using custom complied version of jQuery Mobile v1.2)
    
    	//First, Remove Hover Next and Previous Arrows on Touch Devices. Don't need them really.
    	
    		if(jQuery.support.touch){
	    		
		    		$('#slider').nivoSlider({
			    		effect: 'fade',
			    		animSpeed: 250, // Slide transition speed
			    		pauseTime: 9000 // How long each slide will show
			    	});
		    		
		    		$('a.nivo-nextNav').css('visibility', 'hidden');
		    		$('a.nivo-prevNav').css('visibility', 'hidden');
		    		
		    		//Then Finish Up swipeleft and swiperight
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
	    		
	    	}
	    		
	    	else { 
	    	
		    		$('#slider').nivoSlider({
			    		effect: 'fade',
			    		animSpeed: 250, // Slide transition speed
			    		pauseTime: 9000 // How long each slide will show	
			    	});
    
		    	}

});