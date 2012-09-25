<?php
/*
Template Name: Full Width Page
*/
?>
<?php get_header() ; ?>

<div id="content">

	<div class="section-container">

		<div id="content-left" class="second-level-full-width">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
				<div class="page" id="<?php the_ID(); ?>">
		    	
					<h2><?php the_title(); ?></h2>
		    		
		    			<?php if ( has_post_thumbnail()) : ?>
		 
			    			<?php the_post_thumbnail('single-page-featured'); ?>
		  
			    		<?php endif; ?>
		    			
							<?php the_content(); ?>
				
				</div>
		 
		    <?php endwhile; else: ?>
		
		    	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		
		    <?php endif; ?>

		</div>

	</div>

</div>

<?php get_footer(); ?>