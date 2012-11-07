<div class="clearfooter"></div>
</div>

<div id="footer">

	<div class="section-container">
	
		<div id="footer-left">
		
			<?php if ( is_active_sidebar ('left-footer') ) : ?>
   			
   				<?php dynamic_sidebar( 'left-footer' ); ?>
   					
			<?php else: ?>
				
				<p>&copy; 2012 George Mason University. For All Inquiries: 4400 University Drive, Fairfax, Virginia 22030 <br />
			TDD: 703-993-1002  | Phone: 703-993-1000</p>
	
			<?php endif; ?>
		
		</div>
		
		<div id="footer-right">
		
			<?php $options = get_option('kuma_theme_options'); if (isset($options['mobileapplink'])) : ?>
		
				<h5><a href="http://gettheapp.gmu.edu/?utm_source=kuma_theme&amp;utm_medium=footer_icon&amp;utm_campaign=gettheapp" target="_blank" id="mobile-mason" class="the-social-network text-swap">Get the Mobile Mason App</a></h5>
			
			<?php endif; ?>
			
			<?php if ($options['facebooklink']) : ?>
			
				<h5><a href="<?php echo $options['facebooklink']; ?>" target="_blank" id="facebook" class="the-social-network text-swap">Like Us on Facebook</a></h5>
			
			<?php endif; ?>
			
			<?php if ($options['twitterlink']) : ?>
			
				<h5><a href="<?php echo $options['twitterlink'] ?>" target="_blank" id="twitter" class="the-social-network text-swap">Follow Us on Twitter</a></h5>
			
			<?php endif; ?>
			
			<?php if ($options['youtubelink']) : ?>
			
				<h5><a href="<?php echo $options['youtubelink'] ?>" target="_blank" id="youtube" class="the-social-network text-swap">Watch our Videos on YouTube</a></h5>
			
			<?php endif; ?>
			
			<?php if ($options['pinterestlink']) : ?>
			
				<h5><a href="<?php echo $options['pinterestlink'] ?>" target="_blank" id="pinterest" class="the-social-network text-swap">Pin us on Pinterest</a></h5>
			
			<?php endif; ?>
			
			<?php if ($options['foursquarelink']) : ?>
			
				<h5><a href="<?php echo $options['foursquarelink'] ?>" target="_blank" id="foursquare" class="the-social-network text-swap">Check in on FourSquare</a></h5>
			
			<?php endif; ?>
			
			<?php if ($options['linkedinlink']) : ?>
			
				<h5><a href="<?php echo $options['linkedinlink'] ?>" target="_blank" id="linkedIn" class="the-social-network text-swap">Connect with Us on LinkedIn</a></h5>
			
			<?php endif; ?>
	
		</div>
	
	</div>

</div>

<?php if (is_page_template('homepage.php')) : ?>
<script src="<?php bloginfo('template_directory'); ?>/library/js/jquery.masonry.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/library/js/masonry-int.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/library/js/jquery.nivo.slider.pack.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/library/js/jquery.mobile.custom.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/library/js/nivo-int.js"></script>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>