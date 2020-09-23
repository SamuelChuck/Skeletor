<?php
/**
 * The site's entry point.
 *
 * Loads the relevant template part,
 * the loop is executed (when needed) by the relevant template part.
 *
 * @package Skeletor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$is_elementor_theme_exist = function_exists( 'elementor_theme_do_location' );

if ( is_singular() ) {
	if ( ! $is_elementor_theme_exist || ! elementor_theme_do_location( 'single' ) ) {
		get_template_part( SKELETOR_TEMPLATES_DIR . 'single' );
	}
} elseif ( is_archive() || is_home() ) {
	if ( ! $is_elementor_theme_exist || ! elementor_theme_do_location( 'archive' ) ) {
		get_template_part( SKELETOR_TEMPLATES_DIR . 'archive' );
	}
} elseif ( is_search() ) {
	if ( ! $is_elementor_theme_exist || ! elementor_theme_do_location( 'archive' ) ) {
		get_template_part( SKELETOR_TEMPLATES_DIR . 'search' );
	}
} else {
	if ( ! $is_elementor_theme_exist || ! elementor_theme_do_location( 'single' ) ) {
		get_template_part( SKELETOR_TEMPLATES_DIR . '404' );
	}
}

get_footer();
