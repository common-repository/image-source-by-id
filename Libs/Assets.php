<?php
namespace JLTISRC\Libs;

// No, Direct access Sir !!!
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Assets' ) ) {

	/**
	 * Assets Class
	 *
	 * Jewel Theme <support@jeweltheme.com>
	 * @version     1.0.4
	 */
	class Assets {

		/**
		 * Constructor method
		 *
		 * @author Jewel Theme <support@jeweltheme.com>
		 */
		public function __construct() {
			add_action( 'admin_enqueue_scripts', array( $this, 'jlt_image_source_id_admin_enqueue_scripts' ), 100 );
		}


		/**
		 * Get environment mode
		 *
		 * @author Jewel Theme <support@jeweltheme.com>
		 */
		public function get_mode() {
			return defined( 'WP_DEBUG' ) && WP_DEBUG ? 'development' : 'production';
		}

		/**
		 * Enqueue Scripts
		 *
		 * @method admin_enqueue_scripts()
		 */
		public function jlt_image_source_id_admin_enqueue_scripts() {
			// CSS Files .
			wp_enqueue_style( 'image-source-by-id-admin', JLTISRC_ASSETS . 'css/image-source-by-id-admin.css', array( 'dashicons' ), JLTISRC_VER, 'all' );

			// JS Files .
			wp_enqueue_script( 'image-source-by-id-admin', JLTISRC_ASSETS . 'js/image-source-by-id-admin.js', array( 'jquery' ), JLTISRC_VER, true );
			wp_localize_script(
				'image-source-by-id-admin',
				'JLTISRCCORE',
				array(
					'admin_ajax'        => admin_url( 'admin-ajax.php' ),
					'recommended_nonce' => wp_create_nonce( 'jlt_image_source_id_recommended_nonce' ),
				)
			);
		}
	}
}