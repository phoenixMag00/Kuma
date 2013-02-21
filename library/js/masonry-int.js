(function($){
	var $container = $('#masonry-boxes');
		$container.imagesLoaded(function(){
			$container.masonry({
				itemSelector : '.masonry-single-box'
				
				});
			});
		})(jQuery);

(function($){
	var $container = $('.gallery');
		$container.imagesLoaded(function(){
			$container.masonry({
				itemSelector : '.gallery-item'
				
				});
			});
		})(jQuery);