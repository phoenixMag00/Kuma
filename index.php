<?php get_header() ; ?>

<div id="content">

	<div class="section-container">
	
<?php //START - Logic to auto decide columns on pages ?>

<?php if (( is_active_sidebar( 'widgets-blog-homepage' ) )) : ?>

	<?php $col_type = "homepage-with-widgets" ?>

<?php else: ?>

	<?php $col_type = "homepage-no-widgets" ?>

<?php endif; ?>

<div id="content-left" class="<?php echo $col_type ?>">
	
	<h2 class="category-header">News</h2>	
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<div class="post-index" id="<?php the_ID(); ?>">
	    	
	    		<?php if ( has_post_thumbnail()) : ?>
	   
	    			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
		    			
		    			<?php the_post_thumbnail('indexed-featured'); ?>
		    		
		    		</a>
		    	
		    	<?php endif; ?>
	    	
				<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				
					<?php //Displays Post Time and Date. Will show lastest modified time and date
	    		
		    			if (get_the_modified_time() != get_the_time()) : ?>
				
		    				<p class="date-and-time"><span class="pub-time">Posted: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?></span>, <span class="last-updated">Last Updated: <?php the_modified_time('F j, Y'); ?> at <?php the_modified_time('g:i a'); ?></span></p>
				
		    			<?php else: ?>
			
		    				<p class="date-and-time"><span class="pub-time">Posted: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?></span></p>
			
		    			<?php endif; ?>
	    			
							<?php the_excerpt(); ?>
			
			</div>
	 
	    <?php endwhile; else: ?>
	
	    	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	
	    <?php endif; ?>
	
	    	<div class="pagination">
					
				<?php //Search Pagination
	
					global $wp_query;
	
					$big = 999999999; // need an unlikely integer
	
					echo paginate_links( array(
						'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $wp_query->max_num_pages
					) );
				
				?>
				
			</div>	

	</div>
		
		<?php get_sidebar(); ?>

	</div>

</div>

<?php get_footer(); ?>