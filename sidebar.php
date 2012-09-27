<div id="content-right">
	
	<?php if (is_page_template('homepage.php')) : ?>
	
		<?php dynamic_sidebar( 'black-box-homepage-sidebar' ); ?>
		<?php dynamic_sidebar( 'tan-box-homepage-sidebar' ); ?>
	
	<?php elseif ( is_page() ): ?>
	
		<?php dynamic_sidebar( 'black-box-page' ); ?>
		<?php dynamic_sidebar( 'tan-box-page' ); ?>
	
	<?php elseif ( is_archive() or is_home() or is_search() ): ?>
	
		<?php dynamic_sidebar( 'black-box-archive' ); ?>
		<?php dynamic_sidebar( 'tan-box-archive' ); ?>
	
	<?php else : ?>
	
		<?php dynamic_sidebar( 'black-box-post'); ?>
		<?php dynamic_sidebar( 'tan-box-post' ); ?>
		
	<?php endif; ?>

</div>