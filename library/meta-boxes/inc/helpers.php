<?php
/**
 * This file contains all helpers/public functions
 * that can be used both on the back-end or front-end
 */

// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

/**
 * Get post meta
 *
 * @param string   $key     Meta key. Required.
 * @param int|null $post_id Post ID. null for current post. Optional
 * @param array    $args    Array of arguments. Optional.
 *
 * @return mixed
 */
function rwmb_meta( $key, $args = array(), $post_id = null )
{
	$post_id = empty( $post_id ) ? get_the_ID() : $post_id;

	$args = wp_parse_args( $args, array(
		'type' => 'text',
	) );

	// Set 'multiple' for fields based on 'type'
	$args['multiple'] = in_array( $args['type'], array( 'checkbox_list', 'file', 'image', 'plupload_image', 'thickbox_image' ) );

	$meta = get_post_meta( $post_id, $key, !$args['multiple'] );

	// Get uploaded files info
	if ( 'file' == $args['type'] )
	{
		if ( is_array( $meta ) && ! empty( $meta ) )
		{
			$files = array();
			foreach ( $meta as $id )
			{
				$files[$id] = rwmb_file_info( $id );
			}
			$meta = $files;
		}
	}

	// Get uploaded images info
	elseif ( in_array( $args['type'], array( 'image', 'plupload_image', 'thickbox_image' ) ) )
	{
		if ( is_array( $meta ) && ! empty( $meta ) )
		{
			global $wpdb;
			$meta = implode( ',' , $meta );

			// Re-arrange images with 'menu_order'
			$meta = $wpdb->get_col( "
				SELECT ID FROM {$wpdb->posts}
				WHERE post_type = 'attachment'
				AND ID in ({$meta})
				ORDER BY menu_order ASC
			" );

			$images = array();
			foreach ( $meta as $id )
			{
				$images[$id] = rwmb_image_info( $id, $args );
			}
			$meta = $images;
		}
	}

	// Get post terms
	elseif ( 'taxonomy' == $args['type'] )
	{
		$meta = empty( $args['taxonomy'] ) ? array() : wp_get_post_terms( $post_id, $args['taxonomy'] );
	}

	return $meta;
}

/**
 * Get uploaded file information
 *
 * @param int $id Attachment file ID (post ID). Required.
 *
 * @return array|bool False if file not found. Array of (id, name, path, url) on success
 */
function rwmb_file_info( $id )
{
	$path = get_attached_file( $id );
	return array(
		'name'  => basename( $path ),
		'path'  => $path,
		'url'   => wp_get_attachment_url( $id ),
		'title' => get_the_title( $id ),
	);
}

/**
 * Get uploaded image information
 *
 * @param int   $id   Attachment image ID (post ID). Required.
 * @param array $args Array of arguments (for size). Required.
 *
 * @return array|bool False if file not found. Array of (id, name, path, url) on success
 */
function rwmb_image_info( $id, $args = array() )
{
	$args = wp_parse_args( $args, array(
		'size' => 'thumbnail',
	) );

	$img_src = wp_get_attachment_image_src( $id, $args['size'] );
	if ( empty( $img_src ) )
		return false;

	$attachment = &get_post( $id );
	$path = get_attached_file( $id );
	return array(
		'name'        => basename( $path ),
		'path'        => $path,
		'url'         => $img_src[0],
		'width'       => $img_src[1],
		'height'      => $img_src[2],
		'full_url'    => wp_get_attachment_url( $id ),
		'title'       => $attachment->post_title,
		'caption'     => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'alt'         => get_post_meta( $id, '_wp_attachment_image_alt', true ),
	);
}