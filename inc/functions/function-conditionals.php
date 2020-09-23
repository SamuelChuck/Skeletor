<?php
/**
 * Skeletor Conditional Functions
 *
 * @author   SamuelChuck
 * @package  Skeletor/Functions
 */
if ( ! defined( 'ABSPATH' )   ) { exit; }


if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	/**
	 * Returns true if WooCommerce plugin is activated
	 *
	 * @return bool
	 */
	function is_woocommerce_activated() {
		return class_exists( 'woocommerce' );
	}
}

if ( ! function_exists( 'is_yith_wc_points_rewards_activated' ) ) {
	/**
	 * Returns true if WooCommerce plugin is activated
	 *
	 * @return bool
	 */
	function is_yith_wc_points_rewards_activated() {
		return class_exists( 'YITH_WC_Points_Rewards' );
	}
}

if ( ! function_exists( 'is_elementor_activated' ) ) {
	/**
	 * Returns true if Elementor plugin is activated
	 *
	 * @return bool
	 */
	function is_elementor_activated() {
		if( did_action('elementor/loaded') ){
		    return true;
		}
	}
}
