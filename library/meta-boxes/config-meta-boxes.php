<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'mb_';

global $meta_boxes;

$meta_boxes = array();

// 1st meta box
$meta_boxes[] = array(

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => 'Additional Slider Information',

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'homepage_slider' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'side',

	// Order of meta box: high (default), low. Optional.
	'priority' => '',

	// List of meta fields
	'fields' => array(
		// TEXT
		array(
			// Field name - Will be used as label
			'name' => 'Target Link',
			// Field ID, i.e. the meta key
			'id' => $prefix . 'target_link',
			// Field description (optional)
			'desc' => 'Must start with http:// or https://',
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'type'  => 'text',
		),
	),
	'validation' => array(
		'rules' => array(
			// optionally make post/page title required
			$prefix . 'target_link' => array(
				'required' => true,
			)
		),
		// optional override of default jquery.validate messages
		'messages' => array(
			$prefix . 'target_link' => array(
				'required' => 'Link is Required',
			),
			
		)
	)
);

// 2nd meta box
$meta_boxes[] = array(
	'title' => 'Additional Information',
	'pages' => array( 'faculty_staff' ),
	
	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',
	
	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	'fields' => array(
		array(
			// Field name - Will be used as label
			'name' => 'Last Name',
			// Field ID, i.e. the meta key
			'id' => $prefix . 'last_name',
			// Field description (optional)
			'desc' => 'Used for Alphabetizing Faculy and Staff',
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'type'  => 'text',
		),
		
		array(
			// Field name - Will be used as label
			'name' => 'E-mail',
			// Field ID, i.e. the meta key
			'id' => $prefix . 'email',
			// Field description (optional)
			'desc' => 'Should look like person@gmu.edu',
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'type'  => 'text',
		),
		
		array(
			// Field name - Will be used as label
			'name' => 'Job Title',
			// Field ID, i.e. the meta key
			'id' => $prefix . 'job_title',
			// Field description (optional)
			'desc' => 'Should look like Web Developer',
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'type'  => 'text',
		),
		
		array(
			// Field name - Will be used as label
			'name' => 'Phone Number',
			// Field ID, i.e. the meta key
			'id' => $prefix . 'phone_number',
			// Field description (optional)
			'desc' => 'Should look like 703-999-9999',
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'type'  => 'text',
		),
		
	),
	
	'validation' => array(
		'rules' => array(
			// optionally make post/page title required
			$prefix . 'last_name' => array(
				'required' => true,
			),
		),
		// optional override of default jquery.validate messages
		'messages' => array(
			$prefix . 'last_name' => array(
				'required' => 'Last Name is Required',
			),
		)
	)
	
);

// 3rd meta box
$meta_boxes[] = array(
	'id'    => 'survey',
	'title' => 'Survey',
	'pages' => array( 'nowhere' ),

	'fields' => array(
		// COLOR
		array(
			'name' => 'Your favorite color',
			'id'   => "{$prefix}color",
			'type' => 'color',
		),
		// CHECKBOX LIST
		array(
			'name' => 'Your hobby',
			'id'   => "{$prefix}hobby",
			'type' => 'checkbox_list',
			// Options of checkboxes, in format 'value' => 'Label'
			'options' => array(
				'reading' => 'Books',
				'sport'   => 'Gym, Boxing',
			),
			'desc' => 'What do you do in free time?',
		),
		// TIME
		array(
			'name' => 'When do you get up?',
			'id'   => "{$prefix}getdown",
			'type' => 'time',
			// Time format, default hh:mm. Optional. @link See: http://goo.gl/hXHWz
			'format' => 'hh:mm:ss',
		),
		// DATETIME
		array(
			'name' => 'When were you born?',
			'id'   => "{$prefix}born_time",
			'type' => 'datetime',
			// Time format, default yy-mm-dd hh:mm. Optional. @link See: http://goo.gl/hXHWz
			'format' => 'hh:mm:ss',
		),
		// TAXONOMY
		array(
			'name'    => 'Categories',
			'id'      => "{$prefix}cats",
			'type'    => 'taxonomy',
			'options' => array(
				// Taxonomy name
				'taxonomy' => 'category',
				// How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree' or 'select'. Optional
				'type' => 'select_tree',
				// Additional arguments for get_terms() function. Optional
				'args' => array()
			),
			'desc' => 'Choose One Category',
		),
	)
);


/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function mb_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'mb_register_meta_boxes' );