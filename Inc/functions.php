<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * @version       1.0.0
 * @package       JLT_Image_Source_ID
 * @license       Copyright JLT_Image_Source_ID
 */

if ( ! function_exists( 'jlt_image_source_id_option' ) ) {
	/**
	 * Get setting database option
	 *
	 * @param string $section default section name jlt_image_source_id_general .
	 * @param string $key .
	 * @param string $default .
	 *
	 * @return string
	 */
	function jlt_image_source_id_option( $section = 'jlt_image_source_id_general', $key = '', $default = '' ) {
		$settings = get_option( $section );

		return isset( $settings[ $key ] ) ? $settings[ $key ] : $default;
	}
}

if ( ! function_exists( 'jlt_image_source_id_exclude_pages' ) ) {
	/**
	 * Get exclude pages setting option data
	 *
	 * @return string|array
	 *
	 * @version 1.0.0
	 */
	function jlt_image_source_id_exclude_pages() {
		return jlt_image_source_id_option( 'jlt_image_source_id_triggers', 'exclude_pages', array() );
	}
}

if ( ! function_exists( 'jlt_image_source_id_exclude_pages' ) ) {
	/**
	 * Get exclude pages except setting option data
	 *
	 * @return string|array
	 *
	 * @version 1.0.0
	 */
	function jlt_image_source_id_exclude_pages_except() {
		return jlt_image_source_id_option( 'jlt_image_source_id_triggers', 'exclude_pages_except', array() );
	}
}