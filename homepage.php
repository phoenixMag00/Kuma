<?php
/*
Template Name: Homepage
*/
?>

<?php get_header() ; ?>

<?php $options = get_option('kuma_theme_options'); if (isset($options['homepageslider'])) : ?>
	
<div id="homepage-slider-feature">
				
	<div class="section-container">
				
		<div class="slider-wrapper">
		
			<div id="slider" class="nivoSlider kuma-theme">
			
				<?php query_posts('post_type=homepage_slider&posts_per_page=7&orderby=menu_order') ?>
				
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
						<?php 
							  
							  $slider_img_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'homepage-slide', false, '' ); 
						  	  $target_link = get_post_meta(get_the_ID(), 'mb_target_link', true);
						 
						 ?>
					
						 	<a href="<?php echo $target_link; ?>"><img src="<?php echo $slider_img_src[0] ?>" alt="<?php the_title_attribute(); ?>" title="#htmlcaption-<?php the_ID();?>" /></a>

					<?php endwhile; else: endif;  ?>
		
			</div>
	
		</div>

			<?php query_posts('post_type=homepage_slider&posts_per_page=7&orderby=menu_order') ?>
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
					<?php 
					
							$target_link = get_post_meta(get_the_ID(), 'mb_target_link', true);
					?>
			
						<div id="htmlcaption-<?php the_ID(); ?>" class="nivo-html-caption">
						
							<h2><a href="<?php echo $target_link; ?>"><?php the_title(); ?></a></h2>
							
								<?php the_content(); ?>
						
						</div>
				
				<?php endwhile; else: endif; wp_reset_query(); ?>
									
	</div>
						
</div>

<?php else: ?>

<div id="homepage-static-feature">
						
		<div class="section-container">
						
			<?php //Detect if there is a custom header...if not, nothing will print out
		
			if ( get_header_image()) : ?>
   			
   				<div class="column-row-adjacent">
					
					<div class="column-1-1">
						
						<img src="<?php header_image(); ?>" alt="Static Header Image for <?php bloginfo('name'); ?>" class="static-homepage-feature" />
					
					</div>
				
				</div>
 					
 		<?php endif; ?>
						
		</div>
						
	</div>

<?php endif; ?>


<div id="content">

	<div class="section-container">
	
<?php //START - Logic to auto decide columns on pages ?>

<?php if (( is_active_sidebar( 'black-box-homepage-sidebar' ) or is_active_sidebar( 'tan-box-homepage-sidebar' )) ) : ?>

	<?php $col_type = "homepage-with-widgets" ?>

<?php else: ?>

	<?php $col_type = "homepage-no-widgets" ?>

<?php endif; ?>

<div id="content-left" class="<?php echo $col_type ?>">
		
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div class="page" id="<?php the_ID(); ?>">
    	
			<h2><?php the_title(); ?></h2>
    			
					<?php the_content(); ?>
		
		</div>
 
    <?php endwhile; else: ?>

    	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

    <?php endif; ?>


	</div>
		
		<?php get_sidebar(); ?>

	</div>

</div>

<?php if (is_active_sidebar('homepage-bottom')) : ?>

<div id="homepage-bottom-boxes">
				
	<div class="section-container">
	
		<div id="masonry-boxes">
	
			<?php dynamic_sidebar( 'homepage-bottom'); ?>
			
		</div>
							
	</div>
					
</div>

<?php endif; ?>

<?php get_footer(); ?>