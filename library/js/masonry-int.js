jQuery(document).ready(function($){
	var $container = $('#masonry-boxes');
		$container.imagesLoaded(function(){
			$container.masonry({
				itemSelector : '.homepage-bottom-single-box'
				
				});
			});
		});