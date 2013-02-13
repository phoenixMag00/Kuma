<?php get_header() ; ?>

<div id="content">

	<div class="section-container">
	
<div id="content-left" class="second-level-full-width">
	
	<h2><?php single_term_title(); ?></h2>	
	
		<?php 
		
			$taxonomy = 'employee_types';
			$terms = get_terms($taxonomy);
			$parent_pages = get_pages(array(
				'meta_key' => '_wp_page_template',
				'meta_value' => 'faculty-staff-listing.php'
			));

				if ($terms) {
				
					echo '<ul id="employee-types">';
						
						foreach($parent_pages as $parent_page) {
							
							echo '<li><a href="' . get_permalink($parent_page->ID) . '">All ' . $parent_page->post_title . '</a></li>' ;
						}
						
							foreach($terms as $term) {
							
								echo '<li><a href="'.get_term_link($term->slug, $taxonomy).'">'.$term->name.'</a></li>';
							
							}
						
					echo '</ul>';	
					
					}
		
		?>
			
	<?php
		
		//Override globals to continue sorting by last name
		$wp_query->set('posts_per_page' , '1000');
		$wp_query->set('meta_key' , 'mb_last_name');
		$wp_query->set('orderby', 'meta_value');
		$wp_query->set('order', 'ASC');
		$wp_query->get_posts();
		
	?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<?php 
			
			$email = get_post_meta(get_the_ID(), 'mb_email', true);
		?>
	
		<div class="post-index faculty-staff-index text-box" id="<?php the_ID(); ?>">
    	
			<h2 class="widget-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			
				<div class="widget-arrow"></div>
			
				<?php if ( has_post_thumbnail()) : ?>
					
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
					
						<?php the_post_thumbnail('faculty-staff-featured'); ?>
					
					</a>
				
				<?php else :?>
				
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
					
						<img src="<?php bloginfo('template_directory') ?>/library/images/faculty-staff-headshot-placeholder-150-200.png" class="attachment-faculty-staff-featured" alt="" />
					
					</a>
				
				<?php endif; ?>
				
				<div class="faculty-staff-meta">
					
					<?php if (trim($email[1]) != '') : ?>
					
						<p><a href="mailto:<?php echo $email ?>" title="Send Email to <?php the_title_attribute(); ?>">Send Email</a></p>
					
					<?php else: ?>
					
						<p>No Email Provided</p>
					
					<?php endif; ?>
					
						<p><a href="<?php the_permalink();?>">Read Bio</a></p>
					
				</div>
		
		</div>
 
    <?php endwhile; else: ?>

    	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

    <?php endif; ?>
    
	</div>

	</div>

</div>

<?php get_footer(); ?>