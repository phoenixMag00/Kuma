<?php 
// Call theme options early, we are going to need them!
require_once ( get_template_directory() . '/theme-options.php' );

$options = get_option('kuma_theme_options');
if(isset($options['rssfeeds'])) { 
      
	add_theme_support('automatic-feed-links');
}

//Hide WP version meta tag from header and generator tag from feeds
function wpbeginner_remove_version() {
return '';
}
add_filter('the_generator', 'wpbeginner_remove_version');

//Inject Theme Dependent jQuery plugins
function my_scripts_method() {
   // register your script location, dependencies and version
   wp_register_script('theme',
       get_template_directory_uri() . '/library/js/kuma.js',
       array('jquery'),
       '1.1.3' );
   
   wp_register_script('superfish',
      get_template_directory_uri() . '/library/js/superfish.js',
      array('jquery'),
      '1.7.2' );
   
   wp_register_script('superfishInit',
      get_template_directory_uri() . '/library/js/superfish-init.js',
      array('jquery'),
      '1.1', true );
      
   wp_register_script('masonryInt',
      get_template_directory_uri() . '/library/js/masonry-int.js',
      array('jquery', 'jquery-masonry'),
      '1.0', true);
      
       
   // enqueue the script
   wp_enqueue_script('theme');
   wp_enqueue_script('hoverIntent');
   wp_enqueue_script('superfish');
   wp_enqueue_script('superfishInit');
   wp_enqueue_script('masonryInt');
   
}
add_action('wp_enqueue_scripts', 'my_scripts_method');

//Add Featured Image Function
add_theme_support( 'post-thumbnails' );

//Set Default Inline Image Upload Demensions
update_option('thumbnail_size_w', 200);
update_option('thumbnail_size_h', 200);
update_option('thumbnail_crop', 0);
update_option('medium_size_w', 300);
update_option('medium_size_h', 300);
update_option('large_size_w', 670);
update_option('large_size_h', 550);

//Add additional generated image sizes
add_image_size( 'homepage-slide', 696, 312, true ); //Cropped to exact demensions
add_image_size( 'indexed-featured', 220, 240, true ); //Cropped to exact demensions
add_image_size( 'faculty-staff-featured', 150, 200, true ); //Cropped to exact demensions
add_image_size( 'single-featured', 200, 9999, false ); //Cropped to exact demensions
add_image_size( 'page-featured', 917, 9999, false ); //Cropped to exact demensions

//Add custom headers to theme using theme_support
$header_args = array(
'random-default' => true,
'width' => 917,
'height' => 253,
'header-text' => false,
'uploads' => true,
);

add_theme_support( 'custom-header', $header_args );

// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
register_default_headers( array (
'1' => array (
'url' => '%s/library/images/homepage-static-headers/kuma-slide-917x253-1.jpg',
'thumbnail_url' => '%s/library/images/rotating-headers/%s/library/images/homepage-static-headers/kuma-slide-917x253-1.jpg',
'description' => __( 'Photo 1', 'yourtheme' )
),
'2' => array (
'url' => '%s/library/images/homepage-static-headers/kuma-slide-917x253-2.jpg',
'thumbnail_url' => '%s/library/images/homepage-static-headers/kuma-slide-917x253-2.jpg',
'description' => __( 'Photo 2', 'yourtheme' )
),
'3' => array (
'url' => '%s/library/images/homepage-static-headers/kuma-slide-917x253-3.jpg',
'thumbnail_url' => '%s/library/images/homepage-static-headers/kuma-slide-917x253-3.jpg',
'description' => __( 'Photo 3', 'yourtheme' )
),
'4' => array (
'url' => '%s/library/images/homepage-static-headers/kuma-slide-917x253-4.jpg',
'thumbnail_url' => '%s/library/images/homepage-static-headers/kuma-slide-917x253-4.jpg',
'description' => __( 'Photo 4', 'yourtheme' )
),
'5' => array (
'url' => '%s/library/images/homepage-static-headers/kuma-slide-917x253-5.jpg',
'thumbnail_url' => '%s/library/images/homepage-static-headers/kuma-slide-917x253-5.jpg',
'description' => __( 'Photo 5', 'yourtheme' )
),
'6' => array (
'url' => '%s/library/images/homepage-static-headers/kuma-slide-917x253-6.jpg',
'thumbnail_url' => '%s/library/images/homepage-static-headers/kuma-slide-917x253-6.jpg',
'description' => __( 'Photo 6', 'yourtheme' )
),
'7' => array (
'url' => '%s/library/images/homepage-static-headers/kuma-slide-917x253-7.jpg',
'thumbnail_url' => '%s/library/images/homepage-static-headers/kuma-slide-917x253-7.jpg',
'description' => __( 'Photo 7', 'yourtheme' )
),
) 
);

// Add Menu Fucntion
add_theme_support('menus');

//register at least 1 navigation
register_nav_menu('aux-nav', 'Auxillary Navigation');
register_nav_menu('top-nav', 'Main Navigation');

//You don't want to use custom menus! That's lame, I guess we need a graceful fallback
function page_menu_args( $args ) {
$args['show_home'] = true;
return $args;
}
add_filter( 'wp_page_menu_args', 'page_menu_args' );

//Let's Add Some Sidebars for Widgets
add_action( 'widgets_init', 'my_register_sidebars' );

//Let's Register Some Sidebars
function my_register_sidebars() {

// The Sidebars 
if(function_exists('register_sidebar'))

register_sidebar(array(

	'id' => 'widgets-homepage-sidebar',
	
	'name' => 'Homepage Sidebar Widgets',
	
	'before_widget' => '<div class="text-box">',
	
	'after_widget' => '</div>',
	
	'before_title' => '<h4 class="widget-title">',
	
	'after_title' => '</h4><div class="widget-arrow"></div>',
	
	'description' => 'These widgets will show up on the Homepage in the sidebar'

));

register_sidebar(array(
	
	'id' => 'widgets-homepage-bottom',
	
	'name' => 'Homepage Bottom Widgets',
	
	'before_widget' => '<div class="text-box homepage-bottom-single-box masonry-single-box">',
	
	'after_widget' => '</div>',
	
	'before_title' => '<h4 class="widget-title">',
	
	'after_title' => '</h4><div class="widget-arrow"></div>',
	
	'description' => 'These widgets will show up on the bottom of the homepage.'

));

register_sidebar(array(

	'id' => 'widgets-blog-homepage',
	
	'name' => 'Blog Homepage Widgets',
	
	'before_widget' => '<div class="text-box">',
	
	'after_widget' => '</div>',
	
	'before_title' => '<h4 class="widget-title">',
	
	'after_title' => '</h4><div class="widget-arrow"></div>',
	
	'description' => 'These widgets will show up on the Blog Homepage'

));

register_sidebar(array(

	'id' => 'widgets-page',
	
	'name' => 'Page Widgets',
	
	'before_widget' => '<div class="text-box">',
	
	'after_widget' => '</div>',
	
	'before_title' => '<h4 class="widget-title">',
	
	'after_title' => '</h4><div class="widget-arrow"></div>',
	
	'description' => 'These widgets will show up on Pages'

));

register_sidebar(array(

	'id' => 'widgets-post',
	
	'name' => 'Post Widgets',
	
	'before_widget' => '<div class="text-box">',
	
	'after_widget' => '</div>',
	
	'before_title' => '<h4 class="widget-title">',
	
	'after_title' => '</h4><div class="widget-arrow"></div>',
	
	'description' => 'These widgets will show up on Single Posts'

));

register_sidebar(array(
	
	'id' => 'widgets-archive',
	
	'name' => 'Archive Widgets',
	
	'before_widget' => '<div class="text-box">',
	
	'after_widget' => '</div>',
	
	'before_title' => '<h4 class="widget-title">',
	
	'after_title' => '</h4><div class="widget-arrow"></div>',
	
	'description' => 'These widgets will show up on Archive Pages (Categories, Dates, etc.)'

));

register_sidebar(array(

	'id' => 'left-footer',
	
	'name' => 'Left Footer Text',
	
	'before_widget' => '',
	
	'after_widget' => '',
	
	'before_title' => '',
	
	'after_title' => '',
	
	'description' => 'Left Footer text should be entered as HTML. Leave blank for the default footer.'

));
     
}

// Let's format the whole comment process (must use style=div as an arg the wp_list_comments function)
function comment_format($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <div <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
      
      <div class="comment-author vcard">
         <?php echo get_avatar($comment,$size='48',$default='<path_to_url>', $alt='Gravatar Image for '. get_comment_author('').'' ); ?>
 
			
		<div class="comment-meta commentmetadata"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>		
	
         <?php printf(__('<cite class="fn">%s</cite> <span class="says">writes:</span>'), get_comment_author_link()) ?>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>

      <?php comment_text() ?>
     
     </div>
<?php
        }

//Bring the Custom Post
add_action( 'init', 'create_my_post_types' );

//Create and Register Custom Posts
function create_my_post_types() {
	
$options = get_option('kuma_theme_options');
	if((isset($options['homepageslider']))) {
	
	register_post_type( 'homepage_slider',
		array(
			'labels' => array(
			'name' => __( 'Homepage Slider' ),
			'singular_name' => __( 'Slide' ),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Slide' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Slide' ),
			'new_item' => __( 'New Slide' ),
			'view' => __( 'View Slide' ),
			'view_item' => __( 'View Slide' ),
			'search_items' => __( 'Search Slides' ),
			'not_found' => __( 'No slides found' ),
			'not_found_in_trash' => __( 'No slides found in Trash' ),
			'parent' => __( 'Parent Slide' ),
),
			
			'public' => true,
			'exclude_from_search' => true,
			'page-attributes' => true,
			'menu_position' => 20,
			
			'supports' => array( 
			'title', 
			'editor', 
			'thumbnail',
			'revisions',
			'page-attributes'
			
			 ),
		)
	); 
}

function set_custom_post_types_admin_order($wp_query) {
  if (is_admin()) {

    // Get the post type from the query
    $post_type = $wp_query->query['post_type'];

    if ( $post_type == 'homepage_slider') {

      // 'orderby' value can be any column name
      $wp_query->set('orderby', 'menu_order');

      // 'order' value can be ASC or DESC
      $wp_query->set('order', 'ASC');
    }
  }
}
add_filter('pre_get_posts', 'set_custom_post_types_admin_order');

$options = get_option('kuma_theme_options');
	if(isset($options['facstafflisting'])) {
	
	register_post_type( 'faculty_staff',
		array(
			'labels' => array(
			'name' => __( 'Faculty and Staff' ),
			'singular_name' => __( 'Faculty and Staff' ),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Faculty or Staff' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Faculty or Staff' ),
			'new_item' => __( 'New Faculty or Staff' ),
			'view' => __( 'View Faculty or Staff' ),
			'view_item' => __( 'View Faculty or Staff' ),
			'search_items' => __( 'Search Faculty and Staff' ),
			'not_found' => __( 'No super faculty or staff' ),
			'not_found_in_trash' => __( 'No faculty or staff found in Trash' ),
			'parent' => __( 'Parent Facutly or Staff' ),
),
			'public' => true,
			'menu_position' => 20,
			'supports' => array( 
			'title', 
			'editor',
			'thumbnail',
			'revisions'
			 ),
		)
	);
}

}

$options = get_option('kuma_theme_options');
	if(isset($options['facstafflisting'])) {

//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_faculty_staff_taxonomies', 0 );

//create two taxonomies, genres and writers for the post type "book"
function create_faculty_staff_taxonomies() 
{
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name' => _x( 'Employee Types', 'taxonomy general name' ),
    'singular_name' => _x( 'Employee Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Employee Types' ),
    'all_items' => __( 'All Employee Types' ),
    'parent_item' => __( 'Parent Employee Type' ),
    'parent_item_colon' => __( 'Parent Employee Type:' ),
    'edit_item' => __( 'Edit Employee Type' ), 
    'update_item' => __( 'Update Employee Type' ),
    'add_new_item' => __( 'Add New Employee Type' ),
    'new_item_name' => __( 'New Employee Type' ),
    'menu_name' => __( 'Employee Type' ),
  ); 	

  register_taxonomy('employee_types','faculty_staff', array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'faculty-staff' ),
  ));

}

}

// Re-define meta box path and URL
define( 'RWMB_URL', trailingslashit( get_template_directory_uri() . '/library/meta-boxes' ) );
define( 'RWMB_DIR', trailingslashit(  get_template_directory() . '/library/meta-boxes' ) );
// Include the meta box script
require_once RWMB_DIR . 'meta-box.php';
// Include the meta box definition (the file where you define meta boxes, see `demo/demo.php`)
include RWMB_DIR . 'config-meta-boxes.php';

// Include files for the WP Updates service
require_once('wp-updates-theme.php');
new WPUpdatesThemeUpdater( 'http://wp-updates.com/api/1/theme', 63, basename(get_template_directory()) );

?>