<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RWMB_Date_Field' ) )
{
	class RWMB_Date_Field
	{
		/**
		 * Enqueue scripts and styles
		 *
		 * @return void
		 */
		static function admin_enqueue_scripts()
		{
			$url = RWMB_CSS_URL . 'jqueryui';
			wp_register_style( 'jquery-ui-core', "{$url}/jquery.ui.core.css", array(), '1.8.17' );
			wp_register_style( 'jquery-ui-theme', "{$url}/jquery.ui.theme.css", array(), '1.8.17' );
			wp_enqueue_style( 'jquery-ui-datepicker', "{$url}/jquery.ui.datepicker.css", array( 'jquery-ui-core', 'jquery-ui-theme' ), '1.8.17' );

			$url = RWMB_JS_URL . 'jqueryui';
			wp_register_script( 'jquery-ui-datepicker', "{$url}/jquery.ui.datepicker.min.js", array( 'jquery-ui-core' ), '1.8.17', true );
			wp_enqueue_script( 'rwmb-date', RWMB_JS_URL . 'date.js', array( 'jquery-ui-datepicker' ), RWMB_VER, true );
		}

		/**
		 * Get field HTML
		 *
		 * @param string $html
		 * @param mixed  $meta
		 * @param array  $field
		 *
		 * @return string
		 */
		static function html( $html, $meta, $field )
		{
			$name   = " name='{$field['field_name']}'";
			$id     = isset( $field['clone'] ) && $field['clone'] ? '' : " id='{$field['id']}'";
			$value  = " value='{$meta}'";
			$size   = " size='{$field['size']}'";
			$format = " rel='{$field['format']}'";

			$html   = "<input type='text' class='rwmb-date'{$name}{$id}{$value}{$size}{$format} />";

			return $html;
		}

		/**
		 * Normalize parameters for field
		 *
		 * @param array $field
		 *
		 * @return array
		 */
		static function normalize_field( $field )
		{
			$field['format'] = empty( $field['format'] ) ? 'yy-mm-dd' : $field['format'];
			$field['size']   = empty( $field['size'] ) ? 10 : $field['size'];
			return $field;
		}
	}
}