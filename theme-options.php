<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'kuma_options', 'kuma_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'kumatheme' ), __( 'Theme Options', 'kumatheme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create arrays for our select and radio options - No Need for kuma - Code Removed
 */

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . wp_get_theme() . __( ' Theme Options', 'kumatheme' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'kumatheme' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'kuma_options' ); ?>
			<?php $options = get_option( 'kuma_theme_options' ); ?>

			<table class="form-table">
				
				<h3>General Options</h3>
					
					<tr valign="top"><th scope="row"><?php _e( 'RSS Feeds', 'kumatheme' ); ?></th>
						<td>
							<input id="kuma_theme_options[option1]" name="kuma_theme_options[rssfeeds]" type="checkbox" value="1" <?php checked( '1', (isset($options['rssfeeds'])) ); ?> />
							<label class="description" for="kuma_theme_options[rssfeeds]"><?php _e( 'Enable RSS Feeds for your site. A good idea if you are running a blog.', 'kumatheme' ); ?></label>
						</td>
					</tr>
					
					<tr valign="top"><th scope="row"><?php _e( 'Widget Color Set', 'kumatheme' ); ?></th>
						<td>
							<input id="kuma_theme_options[option2]" name="kuma_theme_options[widgetcolorset]" type="checkbox" value="1" <?php checked( '1', (isset($options['widgetcolorset'])) ); ?> />
							<label class="description" for="kuma_theme_options[widgetcolorset]"><?php _e( 'Enable a Dark Color Set for the Widget Headers', 'kumatheme' ); ?></label>
						</td>
					</tr>
					
					<tr valign="top"><th scope="row"><?php _e( 'Post Comments', 'kumatheme' ); ?></th>
						<td>
							<input id="kuma_theme_options[option3]" name="kuma_theme_options[postcomments]" type="checkbox" value="1" <?php checked( '1', (isset($options['postcomments'])) ); ?> />
							<label class="description" for="kuma_theme_options[postcomments]"><?php _e( 'Enable Post Comments. <a href="https://github.com/phoenixMag00/Kuma/wiki/Initial-Set-Up" target="_blank">Learn More</a>.', 'kumatheme' ); ?></label>
						</td>
					</tr>
					
					<tr valign="top"><th scope="row"><?php _e( 'Search', 'kumatheme' ); ?></th>
						<td>
							<input id="kuma_theme_options[option4]" name="kuma_theme_options[search]" type="checkbox" value="1" <?php checked( '1', (isset($options['search']))	 ); ?> />
							<label class="description" for="kuma_theme_options[search]"><?php _e( 'Use the Mason Google Search Appliance instead of site search', 'kumatheme' ); ?></label>
						</td>
					</tr>
					
					<tr valign="top"><th scope="row"><?php _e( 'Enable Homepage Slider', 'kumatheme' ); ?></th>
						<td>
							<input id="kuma_theme_options[option5]" name="kuma_theme_options[homepageslider]" type="checkbox" value="1" <?php checked( '1', (isset($options['homepageslider'])) ); ?> />
							<label class="description" for="kuma_theme_options[homepageslider]"><?php _e( 'Enable the Homepage Slider. <a href="https://github.com/phoenixMag00/Kuma/wiki/Homepage-Slider" target="_blank">Learn More</a>.	', 'kumatheme' ); ?></label>
						</td>
					</tr>
					
					<tr valign="top"><th scope="row"><?php _e( 'Enable Faculty and Staff Listing', 'kumatheme' ); ?></th>
						<td>
							<input id="kuma_theme_options[option6]" name="kuma_theme_options[facstafflisting]" type="checkbox" value="1" <?php checked( '1', (isset($options['facstafflisting'])) ); ?> />
							<label class="description" for="kuma_theme_options[facstafflisting]"><?php _e( 'Enable Faculty and Staff Listings. <a href="https://github.com/phoenixMag00/Kuma/wiki/Setting-Up-the-Faculty-and-Staff-Listing" target="_blank">Learn More</a>.', 'kumatheme' ); ?></label>
						</td>
					</tr>
				
			</table>
		
			<table class="form-table">
				
				<h3>Social Media Icons</h3>
				
				
				<tr valign="top"><th scope="row"><?php _e( 'Mobile Mason Icon', 'kumatheme' ); ?></th>
					<td>
						<input id="kuma_theme_options[option7]" name="kuma_theme_options[mobileapplink]" type="checkbox" value="1" <?php checked( '1', (isset($options['mobileapplink'])) ); ?> />
						<label class="description" for="kuma_theme_options[mobileapplink]"><?php _e( 'Yes! Of course we want to support Mason and host a link to download the app', 'kumatheme' ); ?></label>
					</td>
				</tr>
				
				<tr valign="top"><th scope="row"><?php _e( 'Facebook Icon Link', 'kumatheme' ); ?></th>
					<td>
						<input id="kuma_theme_options[facebooklink]" class="regular-text" type="text" name="kuma_theme_options[facebooklink]" value="<?php esc_attr_e( $options['facebooklink'] ); ?>" />
						<label class="description" for="kuma_theme_options[facebooklink]"><?php _e( 'Should look something like http://facebook.com/georgemason', 'kumatheme' ); ?></label>
					</td>
				</tr>
				
				<tr valign="top"><th scope="row"><?php _e( 'Twitter Icon Link', 'kumatheme' ); ?></th>
					<td>
						<input id="kuma_theme_options[twitterlink]" class="regular-text" type="text" name="kuma_theme_options[twitterlink]" value="<?php esc_attr_e( $options['twitterlink'] ); ?>" />
						<label class="description" for="kuma_theme_options[twitterlink]"><?php _e( 'Should look something like http://twitter.com/GeorgeMasonU', 'kumatheme' ); ?></label>
					</td>
				</tr>
				
				<tr valign="top"><th scope="row"><?php _e( 'YouTube Icon Link', 'kumatheme' ); ?></th>
					<td>
						<input id="kuma_theme_options[youtubelink]" class="regular-text" type="text" name="kuma_theme_options[youtubelink]" value="<?php esc_attr_e( $options['youtubelink'] ); ?>" />
						<label class="description" for="kuma_theme_options[youtubelink]"><?php _e( 'Should look something like http://www.youtube.com/user/masonWeb', 'kumatheme' ); ?></label>
					</td>
				</tr>
				
				<tr valign="top"><th scope="row"><?php _e( 'Pinterest Icon Link', 'kumatheme' ); ?></th>
					<td>
						<input id="kuma_theme_options[pinterestlink]" class="regular-text" type="text" name="kuma_theme_options[pinterestlink]" value="<?php esc_attr_e( $options['pinterestlink'] ); ?>" />
						<label class="description" for="kuma_theme_options[pinterestlink]"><?php _e( 'Should look something like http://pinterest.com/georgemasonuniv', 'kumatheme' ); ?></label>
					</td>
				</tr>
				
				<tr valign="top"><th scope="row"><?php _e( 'Foursquare Icon Link', 'kumatheme' ); ?></th>
					<td>
						<input id="kuma_theme_options[foursquarelink]" class="regular-text" type="text" name="kuma_theme_options[foursquarelink]" value="<?php esc_attr_e( $options['foursquarelink'] ); ?>" />
						<label class="description" for="kuma_theme_options[foursquarelink]"><?php _e( 'Should look something like http://foursquare.com/{username}', 'kumatheme' ); ?></label>
					</td>
				</tr>
				
				<tr valign="top"><th scope="row"><?php _e( 'LinkedIn Icon Link', 'kumatheme' ); ?></th>
					<td>
						<input id="kuma_theme_options[linkedinlink]" class="regular-text" type="text" name="kuma_theme_options[linkedinlink]" value="<?php esc_attr_e( $options['linkedinlink'] ); ?>" />
						<label class="description" for="kuma_theme_options[linkedinlink]"><?php _e( 'Should look something like http://linkedin.com/{username}', 'kumatheme' ); ?></label>
					</td>
				</tr>
				
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'kumatheme' ); ?>" />
			</p>
		
		<table class="form-table">
				
				<h3>Instructions</h3>
				
					<p>Documentation and set up instructions can be found on the <a href="https://github.com/phoenixMag00/Kuma/wiki" target="_blank">Kuma github wiki page.</a></p>
						
					</p>
				
				<h3>Kuma Credits</h3>
				
					<p>Integrated Libraries: <a href="http://nivo.dev7studios.com/" target="_blank">Nivo Image Slider</a>, <a href="http://themeshaper.com/2010/06/03/sample-theme-options/">Theme Options (by Ian Steward)</a> and <a href="http://www.deluxeblogtips.com/meta-box/include-meta-box-plugin-in-themes/">Meta Box Plugin (by rilwis)</a>.</p>
					<p>Thanks to the George Mason Community. Extra thanks are in order for: Kate Orf, Karen Wolf, and Cloud Spurlock!</p>
			
			</table>
		
		</form>
	
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options, $radio_options;

	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/
?>