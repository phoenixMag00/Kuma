<div id="content-right">
	
	<?php if ( is_front_page() ) : ?>
	
		<?php dynamic_sidebar( 'widgets-homepage-sidebar' ); ?>
	
	<?php elseif ( is_home() ): ?>
	
		<?php dynamic_sidebar( 'widgets-blog-homepage' ); ?>
	
	<?php elseif ( is_page() ): ?>
	
		<?php dynamic_sidebar( 'widgets-page' ); ?>
	
	<?php elseif ( is_archive() or is_search() ): ?>
	
		<?php dynamic_sidebar( 'widgets-archive' ); ?>
	
	<?php else : ?>
	
		<?php dynamic_sidebar( 'widgets-post'); ?>
		
	<?php endif; ?>

</div>