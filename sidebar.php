<div id="content-right">
	
	<?php if (is_page_template('homepage.php')) : ?>
	
		<?php dynamic_sidebar( 'widgets-homepage-sidebar' ); ?>
	
	<?php elseif ( is_home() or is_page_template('blog-home.php')  ): ?>
	
		<?php dynamic_sidebar( 'widgets-blog-homepage' ); ?>
	
	<?php elseif ( is_page() ): ?>
	
		<?php dynamic_sidebar( 'widgets-page' ); ?>
	
	<?php elseif ( is_archive() or is_search() ): ?>
	
		<?php dynamic_sidebar( 'widgets-archive' ); ?>
	
	<?php else : ?>
	
		<?php dynamic_sidebar( 'widgets-post'); ?>
		
	<?php endif; ?>

</div>