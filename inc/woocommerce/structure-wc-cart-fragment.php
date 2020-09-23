<?php
/**
 * Woocommerce Cart Fragments.
 *
 * @author SamuelChuck
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Woocommerce Cart Count Fragment & Plural Form.
 */

function skeletor_woocommerce_cart_contents_count_fragment( $fragments ) {
    
	global $woocommerce;
	$fragments['.skeletor-cart-count'] = '<span class="skeletor-cart-count">' .$woocommerce->cart->cart_contents_count. '</span>';
 	return $fragments;
 
}
add_filter( 'woocommerce_add_to_cart_fragments', 'skeletor_woocommerce_cart_contents_count_fragment' );
