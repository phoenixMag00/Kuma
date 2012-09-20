<?php 

	//Standard Post Template. Contains logic that will automatically set up the correct numbers of columns based upon widget selection and page depth.
	//If want to override the columns and just have a full width page, then please choose the Full Width Template on the page attributes.

?>

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
		
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div class="post-single" id="<?php the_ID(); ?>">
    	
			<h2><?php the_title(); ?></h2>
    			
    			<?php //Displays Post Time and Date. Will show lastest modified time and date
    		
	    			if (get_the_modified_time() != get_the_time()) : ?>
			
	    				<p class="date-and-time"><span class="pub-time">Posted: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?></span>, <span class="last-updated">Last Updated: <?php the_modified_time('F j, Y'); ?> at <?php the_modified_time('g:i a'); ?></span></p>
			
	    			<?php else: ?>
		
	    				<p class="date-and-time"><span class="pub-time">Posted: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?></span></p>
		
	    			<?php endif; ?>
    			
	    			<?php if ( has_post_thumbnail()) : ?>
 
	    				<?php the_post_thumbnail('single-page-featured'); ?>
  
	    			<?php endif; ?>
    			
	    					<?php the_content(); ?>
	    			
	    						
		
		</div>
			
			<?php $options = get_option('kuma_theme_options'); if (isset($options['postcomments'])) : ?>
			
				<?php comments_template(); ?>
			
			<?php endif; ?>
		
	<?php endwhile; else: ?>

    	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

    <?php endif; ?>

	</div>
		
		<?php get_sidebar(); ?>

	</div>

</div>

<?php get_footer(); ?>