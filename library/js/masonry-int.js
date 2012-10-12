jQuery(document).ready(function($){
	var $container = $('#masonry-boxes');
		$container.imagesLoaded(function(){
			$container.masonry({
				itemSelector : '.masonry-single-box'
				
				});
			});
		});