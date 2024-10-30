<?php
/**
 * Plugin Name: Image Source by Image ID
 * Plugin URI:  http://jeweltheme.com
 * Description: Get Image URL with different size Options by Image ID.
 * Version:     1.0.4
 * Author:      Jewel Theme
 * Author URI:  https://jeweltheme.com
 * Text Domain: image-source-by-id
 * Domain Path: languages/
 * License:     GPLv3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package image-source-by-id
 */

/*
 * don't call the file directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	wp_die( esc_html__( 'You can\'t access this page', 'image-source-by-id' ) );
}

$jlt_image_source_id_plugin_data = get_file_data(
	__FILE__,
	array(
		'Version'     => 'Version',
		'Plugin Name' => 'Plugin Name',
		'Author'      => 'Author',
		'Description' => 'Description',
		'Plugin URI'  => 'Plugin URI',
	),
	false
);

// Define Constants.
if ( ! defined( 'JLTISRC' ) ) {
	define( 'JLTISRC', $jlt_image_source_id_plugin_data['Plugin Name'] );
}

if ( ! defined( 'JLTISRC_VER' ) ) {
	define( 'JLTISRC_VER', $jlt_image_source_id_plugin_data['Version'] );
}

if ( ! defined( 'JLTISRC_AUTHOR' ) ) {
	define( 'JLTISRC_AUTHOR', $jlt_image_source_id_plugin_data['Author'] );
}

if ( ! defined( 'JLTISRC_DESC' ) ) {
	define( 'JLTISRC_DESC', $jlt_image_source_id_plugin_data['Author'] );
}

if ( ! defined( 'JLTISRC_URI' ) ) {
	define( 'JLTISRC_URI', $jlt_image_source_id_plugin_data['Plugin URI'] );
}

if ( ! defined( 'JLTISRC_DIR' ) ) {
	define( 'JLTISRC_DIR', __DIR__ );
}

if ( ! defined( 'JLTISRC_FILE' ) ) {
	define( 'JLTISRC_FILE', __FILE__ );
}

if ( ! defined( 'JLTISRC_SLUG' ) ) {
	define( 'JLTISRC_SLUG', dirname( plugin_basename( __FILE__ ) ) );
}

if ( ! defined( 'JLTISRC_BASE' ) ) {
	define( 'JLTISRC_BASE', plugin_basename( __FILE__ ) );
}

if ( ! defined( 'JLTISRC_PATH' ) ) {
	define( 'JLTISRC_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
}

if ( ! defined( 'JLTISRC_URL' ) ) {
	define( 'JLTISRC_URL', trailingslashit( plugins_url( '/', __FILE__ ) ) );
}

if ( ! defined( 'JLTISRC_INC' ) ) {
	define( 'JLTISRC_INC', JLTISRC_PATH . '/Inc/' );
}

if ( ! defined( 'JLTISRC_LIBS' ) ) {
	define( 'JLTISRC_LIBS', JLTISRC_PATH . 'Libs' );
}

if ( ! defined( 'JLTISRC_ASSETS' ) ) {
	define( 'JLTISRC_ASSETS', JLTISRC_URL . 'assets/' );
}

if ( ! defined( 'JLTISRC_IMAGES' ) ) {
	define( 'JLTISRC_IMAGES', JLTISRC_ASSETS . 'images' );
}

if ( ! class_exists( '\\JLTISRC\\JLT_Image_Source_ID' ) ) {
	// Autoload Files.
	include_once JLTISRC_DIR . '/vendor/autoload.php';
	// Instantiate JLT_Image_Source_ID Class.
	include_once JLTISRC_DIR . '/class-image-source-by-id.php';
}