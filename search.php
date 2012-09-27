<?php /*?>PUTS RESULTS INTO AN ARRAY (TAKEN DIRECTLY FROM THE WORDPRESS CODEX)<?php */?>

<?php
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] = $query_split[1];
} // foreach

$search = new WP_Query($search_query);
?>

<?php /*?>CAPTURES NUMBER OF RESULTS INTO VARIABLE $total_results<?php */?>

<?php
global $wp_query;
$total_results = $wp_query->found_posts;
?>

<?php get_header() ; ?>

<div id="content">

	<div class="section-container">
	
<?php //START - Logic to auto decide columns on pages ?>

<?php if (( is_active_sidebar( 'black-box-archive' ) or is_active_sidebar( 'tan-box-archive' )) ) : ?>

	<?php $col_type = "homepage-with-widgets" ?>

<?php else: ?>

	<?php $col_type = "homepage-no-widgets" ?>

<?php endif; ?>

<div id="content-left" class="<?php echo $col_type ?>">
	
	<h2 class="category-header">Search Results</h2>	
	
		<p class="search-query-return"><strong>Search for <span class="your-query"><?php the_search_query(); ?></span> returned <?php echo $total_results ?> results</strong></p>
	
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
				<div class="post-index" id="<?php the_ID(); ?>">
		    	
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