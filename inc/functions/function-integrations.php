<?php
/**
 * Skeletor Theme Support
 * 
 * @package Skeletor
 * @author SamuelChuck
 */

if ( ! function_exists( 'skeletor_setup' ) ) {
	/**
	 * Set up theme support.
	 *
	 * @return void
	 */
	function skeletor_setup() {
		$hook_result = apply_filters_deprecated( 'skeletor_theme_load_textdomain', [ true ], '2.0', 'skeletor_load_textdomain' );
		if ( apply_filters( 'skeletor_load_textdomain', $hook_result ) ) {
			load_theme_textdomain( 'skeletor', get_template_directory() . '/languages' );
		}

		$hook_result = apply_filters_deprecated( 'skeletor_theme_register_menus', [ true ], '2.0', 'skeletor_register_menus' );
		if ( apply_filters( 'skeletor_register_menus', $hook_result ) ) {
			register_nav_menus( array( 'menu-1' => __( 'Primary', 'skeletor' ) ) );
		}

		$hook_result = apply_filters_deprecated( 'skeletor_theme_add_theme_support', [ true ], '2.0', 'skeletor_add_theme_support' );
		if ( apply_filters( 'skeletor_add_theme_support', $hook_result ) ) {
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'title-tag' );
			add_theme_support(
				'html5',
				array(
					'search-form',
					'comment-form',
					'comment-list',
					'gallery',
					'caption',
				)
			);
			add_theme_support(
				'custom-logo',
				array(
					'height'      => 100,
					'width'       => 350,
					'flex-height' => true,
					'flex-width'  => true,
				)
			);
			
			/*
			 * WooCommerce.
			 */
			$hook_result = apply_filters_deprecated( 'skeletor_theme_add_woocommerce_support', [ true ], '2.0', 'skeletor_add_woocommerce_support' );
			if ( apply_filters( 'skeletor_add_woocommerce_support', $hook_result ) ) {
				// WooCommerce in general.
				add_theme_support( 'woocommerce' );
				// Enabling WooCommerce product gallery features (are off by default since WC 3.0.0).
				// zoom.
				add_theme_support( 'wc-product-gallery-zoom' );
				// lightbox.
				add_theme_support( 'wc-product-gallery-lightbox' );
				// swipe.
				add_theme_support( 'wc-product-gallery-slider' );
			}
		}		
		load_theme_textdomain('skeletor', SKELETOR_DIR . '/languages');

		register_nav_menus(array('menu-1' => __('Primary', 'skeletor')));

		add_theme_support('post-thumbnails');
		add_theme_support('automatic-feed-links');
		add_theme_support('title-tag');
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 100,
				'width'       => 350,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);

		/*
		 * WooCommerce.
		 */
		// WooCommerce in general.
		add_theme_support('woocommerce');
		// Enabling WooCommerce product gallery features (are off by default since WC 3.0.0).
		// zoom.
		add_theme_support('wc-product-gallery-zoom');
		// lightbox.
		add_theme_support('wc-product-gallery-lightbox');
		// swipe.
		add_theme_support('wc-product-gallery-slider');
		
	}
}
add_action( 'after_setup_theme', 'skeletor_setup' );