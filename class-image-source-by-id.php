<?php
namespace JLTISRC;

use JLTISRC\Libs\Assets;
use JLTISRC\Libs\Helper;
use JLTISRC\Libs\Featured;
use JLTISRC\Inc\Classes\Recommended_Plugins;
use JLTISRC\Inc\Classes\Notifications\Notifications;
use JLTISRC\Inc\Classes\Pro_Upgrade;
use JLTISRC\Inc\Classes\Row_Links;
use JLTISRC\Inc\Classes\Upgrade_Plugin;
use JLTISRC\Inc\Classes\Feedback;
use JLTISRC\Inc\Classes\JLT_Image_Source;

/**
 * Main Class
 *
 * @image-source-by-id
 * Jewel Theme <support@jeweltheme.com>
 * @version     1.0.4
 */

// No, Direct access Sir !!!
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * JLT_Image_Source_ID Class
 */
if ( ! class_exists( '\JLTISRC\JLT_Image_Source_ID' ) ) {

	/**
	 * Class: JLT_Image_Source_ID
	 */
	final class JLT_Image_Source_ID {

		const VERSION            = JLTISRC_VER;
		private static $instance = null;

		/**
		 * what we collect construct method
		 *
		 * @author Jewel Theme <support@jeweltheme.com>
		 */
		public function __construct() {
			$this->includes();
			add_action( 'plugins_loaded', array( $this, 'jlt_image_source_id_plugins_loaded' ), 999 );
			// Body Class.
			add_filter( 'admin_body_class', array( $this, 'jlt_image_source_id_body_class' ) );
			// This should run earlier .
			// add_action( 'plugins_loaded', [ $this, 'jlt_image_source_id_maybe_run_upgrades' ], -100 ); .
		}

		/**
		 * plugins_loaded method
		 *
		 * @author Jewel Theme <support@jeweltheme.com>
		 */
		public function jlt_image_source_id_plugins_loaded() {
			$this->jlt_image_source_id_activate();
		}

		/**
		 * Version Key
		 *
		 * @author Jewel Theme <support@jeweltheme.com>
		 */
		public static function plugin_version_key() {
			return Helper::jlt_image_source_id_slug_cleanup() . '_version';
		}

		/**
		 * Activation Hook
		 *
		 * @author Jewel Theme <support@jeweltheme.com>
		 */
		public static function jlt_image_source_id_activate() {
			$current_jlt_image_source_id_version = get_option( self::plugin_version_key(), null );

			if ( get_option( 'jlt_image_source_id_activation_time' ) === false ) {
				update_option( 'jlt_image_source_id_activation_time', strtotime( 'now' ) );
			}

			if ( is_null( $current_jlt_image_source_id_version ) ) {
				update_option( self::plugin_version_key(), self::VERSION );
			}

			$allowed = get_option( Helper::jlt_image_source_id_slug_cleanup() . '_allow_tracking', 'no' );

			// if it wasn't allowed before, do nothing .
			if ( 'yes' !== $allowed ) {
				return;
			}
			// re-schedule and delete the last sent time so we could force send again .
			$hook_name = Helper::jlt_image_source_id_slug_cleanup() . '_tracker_send_event';
			if ( ! wp_next_scheduled( $hook_name ) ) {
				wp_schedule_event( time(), 'weekly', $hook_name );
			}
		}


		/**
		 * Add Body Class
		 *
		 * @param [type] $classes .
		 *
		 * @author Jewel Theme <support@jeweltheme.com>
		 */
		public function jlt_image_source_id_body_class( $classes ) {
			$classes .= ' image-source-by-id ';
			return $classes;
		}

		/**
		 * Run Upgrader Class
		 *
		 * @return void
		 */
		public function jlt_image_source_id_maybe_run_upgrades() {
			if ( ! is_admin() && ! current_user_can( 'manage_options' ) ) {
				return;
			}

			// Run Upgrader .
			$upgrade = new Upgrade_Plugin();

			// Need to work on Upgrade Class .
			if ( $upgrade->if_updates_available() ) {
				$upgrade->run_updates();
			}
		}

		/**
		 * Include methods
		 *
		 * @author Jewel Theme <support@jeweltheme.com>
		 */
		public function includes() {
			new Assets();
			new Recommended_Plugins();
			new Row_Links();
			new Pro_Upgrade();
			new Notifications();
			new Featured();
			new Feedback();
			new JLT_Image_Source();
		}


		/**
		 * Initialization
		 *
		 * @author Jewel Theme <support@jeweltheme.com>
		 */
		public function jlt_image_source_id_init() {
			$this->jlt_image_source_id_load_textdomain();
		}


		/**
		 * Text Domain
		 *
		 * @author Jewel Theme <support@jeweltheme.com>
		 */
		public function jlt_image_source_id_load_textdomain() {
			$domain = 'image-source-by-id';
			$locale = apply_filters( 'jlt_image_source_id_plugin_locale', get_locale(), $domain );

			load_textdomain( $domain, WP_LANG_DIR . '/' . $domain . '/' . $domain . '-' . $locale . '.mo' );
			load_plugin_textdomain( $domain, false, dirname( JLTISRC_BASE ) . '/languages/' );
		}




		/**
		 * Returns the singleton instance of the class.
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof JLT_Image_Source_ID ) ) {
				self::$instance = new JLT_Image_Source_ID();
				self::$instance->jlt_image_source_id_init();
			}

			return self::$instance;
		}
	}

	// Get Instant of JLT_Image_Source_ID Class .
	JLT_Image_Source_ID::get_instance();
}