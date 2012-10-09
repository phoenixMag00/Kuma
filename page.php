<?php 

	//Standard Page Template. Contains logic that will automatically set up the correct numbers of columns based upon widget selection and page depth.
	//If want to override the columns and just have a full width page, then please choose the Full Width Template on the page attributes.

?>

<?php get_header() ; ?>

<div id="content">

	<div class="section-container">
	
		<?php $featured_img_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'page-featured', false, '' ); ?>
	
			<?php if (trim($featured_img_src[0]) != '') : ?>
			
				<img src="<?php echo $featured_img_src[0] ?>" class="attachment-page-featured" alt="" />
			
			<?php endif; ?>
			
				<?php $children = get_pages('child_of='.$post->ID); if ( ( count( $children ) != 0 ) or ($post->post_parent) ): ?>
			
					<div id="child-navigation">
						
							<h3><a href="<?php echo get_permalink($post->post_parent); ?>"><?php echo get_the_title($post->post_parent); ?></a></h3>
					
								<ul>
								
									<?php
								
										if($post->post_parent)
					
											$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
										
										else
				
											$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
				
										if ($children) { ?>
				
											<?php echo $children; ?>
				
									<?php } ?>
								
								</ul>	
											
					</div>
				
		<?php endif; ?>
		

<?php //START - Logic to auto decide columns on pages ?>

<?php if (( is_active_sidebar( 'tan-box-page' ) or is_active_sidebar( 'black-box-page' )) and empty($children) ) : ?>

	<?php $col_type = "second-level-two-no-child" ?>

<?php elseif (( is_active_sidebar( 'tan-box-page' ) or is_active_sidebar( 'black-box-page' )) and ( count( $children ) != 0 ) ) : ?>

	<?php $col_type = "second-level-two-child" ?> 

<?php elseif (( count( $children ) != 0 )) : ?>

	<?php $col_type = "second-level-two-child-nw"  ?> 

<?php else: ?>

	<?php $col_type = "second-level-full-width" ?>

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

<?php get_footer(); ?>