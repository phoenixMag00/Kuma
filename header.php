<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'kuma_theme' ), max( $paged, $page ) );
?> | George Mason University</title>
<link rel="shortcut icon" type="image/x-icon" href="http://gmu.edu/favicon.ico" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link href="https://fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/library/styles/base.css" media="screen" />
<?php if (is_page_template('homepage.php')) : ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/library/styles/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/library/styles/slider-kuma-theme.css/?ver=1.0.2" type="text/css" media="screen" />
<?php endif; ?>
<?php $options = get_option('kuma_theme_options'); if (isset($options['widgetcolorset'])) : ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/library/styles/widget-color-sets/black.css" type="text/css" media="screen" />
<?php else: ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/library/styles/widget-color-sets/tan.css" type="text/css" media="screen" />
<?php endif; ?>
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
<!--[if IE 7]>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/library/styles/ie7.css" type="text/css" media="screen" />
<![endif]--> 
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper">

	<?php //The Header is the same for all desktop configurations...K.I.S.S. ?>
	
	<div id="header">
		
		<div class="section-container">
		
			<h1><a href="http://gmu.edu" id="mason-logo" class="text-swap">George Mason University</a></h1>
			
				<h2><a href="<?php echo home_url() ?>" id="site-name"><?php bloginfo('name'); ?></a></h2>
				
					<p><a href="#content" id="skip-navigation" class="text-swap">Skip to Content</a></p>
				
						<?php $options = get_option('kuma_theme_options'); if (isset($options['search'])) : ?>
	   				
							<form method="get" action="http://search1.gmu.edu/search" id="search-form-header">
							
								<label for="search-header">Search</label>
								<input type="text" value="Search Mason" name="q" id="search-header" onfocus="clearValue(this)" />
								<input type="submit" id="go-button-header" value="Search"  />
								<input type="hidden" name="site" value="mason_test" />
								<input type="hidden" name="client" value="mason_test" />
								<input type="hidden" name="proxystylesheet" value="mason_test" />
								<input type="hidden" name="output" value="xml_no_dtd" />
								<input type="hidden" name="as_dt" value="i" />
							
							</form>
	   			
						<?php else: ?>
						
							<form method="get" action="<?php echo home_url( '/' ); ?>" id="search-form-header">
	
								<label for="search-header" id="search-label">Search</label>
								<input type="text" value="Search" name="s" id="search-header" onfocus="clearValue(this)" />
								<input type="submit" id="go-button-header" value="Search"  />
							
							</form>
							
						<?php endif; ?>
				
							<div id="aux-nav">
				
								<ul>
								
									<?php if ( has_nav_menu('aux-nav') ) : ?>
								
										<?php wp_nav_menu(array('fallback_cb' => 'wp_page_menu', 'container_class' => '','container' => '', 'items_wrap' => '%3$s', 'theme_location' => 'aux-nav') ); ?>
						
									<?php else: ?>
				
										<li><a href="http://www.gmu.edu/resources/students/">Students</a></li>
										<li><a href="http://www.gmu.edu/resources/facstaff/">Faculty & Staff</a></li>
										<li><a href="http://www.gmu.edu/resources/visitors/">Visitors & Maps</a></li>
										<li><a href="http://today.gmu.edu">Today@Mason</a></li>
										<li><a href="http://hr.gmu.edu/employment/">Careers</a></li>
										<li><a href="http://mymason.gmu.edu/">My Mason</a></li>
										<li><a href="http://peoplefinder.gmu.edu/">People Finder</a></li>	
				
									<?php endif; ?>
								
								</ul>
				
							</div>
				
								<div id="parent-navigation">
					
									<?php if ( has_nav_menu('top-nav') ) : ?>
									
										<?php wp_nav_menu(array('fallback_cb' => 'wp_page_menu', 'container_class' => '','container' => '', 'items_wrap' => '<ul>%3$s</ul>', 'theme_location' => 'top-nav') ); ?>
																		
									<?php else: ?>
									
										<?php wp_page_menu( array( 'show_home' => 1, 'sort_column' => 'menu_order' ) ); ?>
									
									<?php endif; ?>
									
								</div>
		
							</div>
			
	</div>