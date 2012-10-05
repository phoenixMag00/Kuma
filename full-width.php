<?php
/*
Template Name: Full Width Page
*/
?>
<?php get_header() ; ?>

<div id="content">

	<div class="section-container">
	
		<?php $featured_img_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'page-featured', false, '' ); ?>
	
			<?php if (trim($featured_img_src[0]) != '') : ?>
			
				<img src="<?php echo $featured_img_src[0] ?>" class="attachment-page-featured" alt="" />
			
			<?php endif; ?>

		<div id="content-left" class="second-level-full-width">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
				<div class="page" id="<?php the_ID(); ?>">
		    	
					<h2><?php the_title(); ?></h2>
		    			
							<?php the_content(); ?>
				
				</div>
		 
		    <?php endwhile; else: ?>
		
		    	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		
		    <?php endif; ?>

		</div>

	</div>

</div>

<?php get_footer(); ?>