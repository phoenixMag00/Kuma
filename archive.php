<?php get_header() ; ?>

<div id="content">

	<div class="section-container">
	
<?php //START - Logic to auto decide columns on pages ?>

<?php if (( is_active_sidebar( 'black-box-post' ) or is_active_sidebar( 'tan-box-post' )) ) : ?>

	<?php $col_type = "homepage-with-widgets" ?>

<?php else: ?>

	<?php $col_type = "homepage-no-widgets" ?>

<?php endif; ?>

<div id="content-left" class="<?php echo $col_type ?>">

	<?php if (have_posts()) : ?>

		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php /* If this is a category archive */ if (is_category()) { ?>
			<h2 class="category-header">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
			<h2 class="category-header">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<h2 class="category-header">Archive for <?php the_time('F jS, Y'); ?></h2>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h2 class="category-header">Archive for <?php the_time('F, Y'); ?></h2>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<h2 class="category-header">Archive for <?php the_time('Y'); ?></h2>
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
			<h2 class="category-header">Author Archive</h2>
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h2 class="category-header">Blog Archives</h2>
		<?php } ?>
      
	<?php endif; ?>
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<div class="post-index" id="<?php the_ID(); ?>">
	    	
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	    			
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