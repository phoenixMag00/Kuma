<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RWMB_Checkbox_List_Field' ) )
{
	class RWMB_Checkbox_List_Field
	{
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
			if ( ! is_array( $meta ) )
				$meta = (array) $meta;

			$html = array();
			$name    = "name='{$field['field_name']}'";

			foreach ( $field['options'] as $key => $value )
			{
				$val     = " value='{$key}'";
				$checked = checked( in_array( $key, $meta ), true, false );
				$html[]  = "<label><input type='checkbox' class='rwmb-checkbox-list'{$name}{$val}{$checked} /> {$value}</label>";
			}
			return implode( '<br />', $html );
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
			$field['multiple']   = true;
			$field['std']        = empty( $field['std'] ) ? array() : $field['std'];
			$field['field_name'] = "{$field['id']}[]";
			return $field;
		}
	}
}