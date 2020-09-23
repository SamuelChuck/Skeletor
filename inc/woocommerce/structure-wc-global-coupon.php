<?php
/**
 * Woocommerce Coupon.
 *
 * @author SamuelChuck
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*remove coupon form woocommerce_before_checkout_form action */
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 ); 
// add_action( 'checkout_coupon_form', 'woocommerce_checkout_coupon_form', 10 ); 
