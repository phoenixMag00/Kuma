<?php get_header() ; ?>

<div id="content">

<div class="section-container">

<div id="content-left" class="homepage-no-widgets">
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<?php 
			
			$email = get_post_meta(get_the_ID(), 'mb_email', true);
			$job_title = get_post_meta(get_the_ID(), 'mb_job_title', true);
			$phone_number = get_post_meta(get_the_ID(), 'mb_phone_number', true);
		
		?>
	
		<div class="post-index faculty-staff-single" id="<?php the_ID(); ?>">
    	
			<h2 class="post-title"><?php echo get_the_title($post->ID) ?></h2>	
			
				<?php if ( has_post_thumbnail()) : ?>
					
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
					
						<?php the_post_thumbnail('faculty-staff-featured'); ?>
					
					</a>
				
				<?php else :?>
				
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
					
						<img src="<?php bloginfo('template_directory') ?>/library/images/faculty-staff-headshot-placeholder-150-200.png" class="attachment-faculty-staff-featured" />
					
					</a>
				
				<?php endif; ?>
				
				<div class="faculty-staff-meta-single">
					
					<?php if (trim($job_title[1]) != '') : ?>
					
						<p>Title: <?php echo $job_title ?></p>
					
					<?php endif; ?>
					
					<?php $faculty_staff_tax = get_the_term_list( $post->ID, 'employee_types' ) ; if (trim($faculty_staff_tax) != '') : ?>
						
						<p>Role: <?php echo strip_tags($faculty_staff_tax) ;?></p>
					
					<?php endif; ?>
					
					<?php if (trim($email[1]) != '') : ?>
					
						<p>Email: <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></p>
					
					<?php else: ?>
					
						<p>Email: Not Provided</p>
					
					<?php endif; ?>
					
					<?php if (trim($phone_number[1]) != '') : ?>
					
						<p>Phone: <?php echo $phone_number ?></p>
					
					<?php endif; ?>
					
					</div>
					
					<div class="faculty-staff-bio" style="clear:both"><?php the_content(); ?></div>
		
		</div>
 
    <?php endwhile; else: ?>

    	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

    <?php endif; ?>

  		</div>

	</div>

</div>

<?php get_footer(); ?>