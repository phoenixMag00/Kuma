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
$prefix = 'YOUR_PREFIX_';

global $meta_boxes;

$meta_boxes = array();

// 1st meta box
$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'personal',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => 'Personal Information',

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'post', 'slider' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
		// TEXT
		array(
			// Field name - Will be used as label
			'name' => 'Full name',
			// Field ID, i.e. the meta key
			'id' => $prefix . 'fname',
			// Field description (optional)
			'desc' => 'Format: First Last',
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => true,
			'type'  => 'text',
			// Default value (optional)
			'std' => 'Anh Tran',
		),
		// DATE
		array(
			'name' => 'Day of Birth',
			'id'   => "{$prefix}dob",
			'type' => 'date',
			// Date format, default yy-mm-dd. Optional. See: http://goo.gl/po8vf
			'format' => 'd MM, yy',
		),
		// RADIO BUTTONS
		array(
			'name' => 'Gender',
			'id'   => "{$prefix}gender",
			'type' => 'radio',
			// Array of 'value' => 'Label' pairs for radio options.
			// Note: the 'key' is stored in meta field, not the 'value'
			'options'	=> array(
				'm'			=> 'Male',
				'f'			=> 'Female',
			),
			'std'  => 'm',
			'desc' => 'Need an explaination?',
		),
		// TEXTAREA
		array(
			'name' => 'Bio',
			'desc' => "What's your professions? What have you done so far?",
			'id'   => "{$prefix}bio",
			'type' => 'textarea',
			'std'  => "I'm a special agent from Vietnam.",
			'cols' => '40',
			'rows' => '8',
		),
		// SELECT BOX
		array(
			'name' => 'Where do you live?',
			'id'   => "{$prefix}place",
			'type' => 'select',
			// Array of 'value' => 'Label' pairs for select box
			'options' => array(
				'usa'		=> 'USA',
				'vn'		=> 'Vietnam',
			),
			// Select multiple values, optional. Default is false.
			'multiple' => true,
			// Default value, can be string (single value) or array (for both single and multiple values)
			'std'  => array( 'vn' ),
			'desc' => 'Select the current place, not in the past',
		),
		// CHECKBOX
		array(
			'name' => 'About WordPress',
			'id'   => "{$prefix}love_wp",
			'type' => 'checkbox',
			'desc' => 'I love WordPress',
			// Value can be 0 or 1
			'std' => 1,
		),
		// HIDDEN
		array(
			'id'   => "{$prefix}invisible",
			'type' => 'hidden',
			// Hidden field must have predefined value
			'std' => "No, I'm visible",
		),
		// PASSWORD
		array(
			'name' => 'Your favorite password',
			'id'   => "{$prefix}pass",
			'type' => 'password',
		),
		// CONFIRM PASSWORD
		array(
			'name' => 'Confirm your password',
			'id'   => "{$prefix}pass_confirm",
			'type' => 'password',
		),
	),
	'validation' => array(
		'rules' => array(
			// optionally make post/page title required
			'post_title' => array(
				'required' => true,
			),
			$prefix . 'fname' => array(
				'required' => true,
			),
			"{$prefix}pass" => array(
				'required'  => true,
				'minlength' => 7,
			),
		),
		// optional override of default jquery.validate messages
		'messages' => array(
			$prefix . 'fname' => array(
				'required' => 'Your name is required',
			),
			"{$prefix}pass" => array(
				'required'  => 'Password is required',
				'minlength' => 'Password must be at least 7 characters',
			),
		)
	)
);

// 2nd meta box
$meta_boxes[] = array(
	'id'    => 'additional',
	'title' => 'Additional Information',
	'pages' => array( 'post', 'film', 'slider' ),

	'fields' => array(
		// WYSIWYG/RICH TEXT EDITOR
		array(
			'name' => 'Your thoughts about Deluxe Blog Tips',
			'id'   => "{$prefix}thoughts",
			'type' => 'wysiwyg',
			'std'  => "It's great!",
			'desc' => 'Do you think so?',
		),
		// FILE UPLOAD
		array(
			'name' => 'Upload your source code',
			'desc' => 'Any modified code, or extending code',
			'id'   => "{$prefix}code",
			'type' => 'file',
		),
		// IMAGE UPLOAD
		array(
			'name' => 'Screenshots',
			'desc' => 'Screenshots of problems, warnings, etc.',
			'id'   => "{$prefix}screenshot",
			'type' => 'image',
		),
		// PLUPLOAD IMAGE UPLOAD (WP 3.3+)
		array(
			'name'             => 'Screenshots (plupload)',
			'desc'             => 'Screenshots of problems, warnings, etc.',
			'id'               => "{$prefix}screenshot2",
			'type'             => 'plupload_image',
			'max_file_uploads' => 4,
		),
		// THICKBOX IMAGE UPLOAD (WP 3.3+)
		array(
			'name' => 'Screenshots (thickbox upload)',
			'desc' => 'Screenshots of problems, warnings, etc.',
			'id'   => "{$prefix}screenshot3",
			'type' => 'thickbox_image',
		)
	)
);

// 3rd meta box
$meta_boxes[] = array(
	'id'    => 'survey',
	'title' => 'Survey',
	'pages' => array( 'post', 'slider', 'page' ),

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
function YOUR_PREFIX_register_meta_boxes()
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
add_action( 'admin_init', 'YOUR_PREFIX_register_meta_boxes' );