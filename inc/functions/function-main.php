<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! isset( $content_width ) ) {
	$content_width = 1000; // Pixels.
}

if ( ! function_exists( 'skeletor_content_width' ) ) {
	/**
	 * Set default content width.
	 *
	 * @return void
	 */
	function skeletor_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'skeletor_content_width', 1000 );
	}
}
add_action( 'after_setup_theme', 'skeletor_content_width', 0 );

if ( is_admin() ) {
	require SKELETOR_INC_DIR . 'admin'.'/'.'admin-functions.php';
}

if ( ! function_exists( 'skeletor_check_hide_title' ) ) {
	/**
	 * Check hide title.
	 *
	 * @param bool $val default value.
	 *
	 * @return bool
	 */
	function skeletor_check_hide_title( $val ) {
		if ( defined( 'ELEMENTOR_VERSION' ) ) {
			$current_doc = \Elementor\Plugin::instance()->documents->get( get_the_ID() );
			if ( $current_doc && 'yes' === $current_doc->get_settings( 'hide_title' ) ) {
				$val = false;
			}
		}
		return $val;
	}
}
add_filter( 'skeletor_page_title', 'skeletor_check_hide_title' );


/**
 * Wrapper function to deal with backwards compatibility.
 */
if ( ! function_exists( 'skeletor_body_open' ) ) {
	function skeletor_body_open() {
		if ( function_exists( 'wp_body_open' ) ) {
			wp_body_open();
		} else {
			do_action( 'wp_body_open' );
		}
	}
}

