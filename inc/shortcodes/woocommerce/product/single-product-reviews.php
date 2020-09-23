<?php
/**
 * Product Review
 *
 * This template can be overridden by copying the woocommerce template file to yourtheme/woocommerce/single-product/review.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

function skeletor_woocommerce_product_review(){
    
    global $product;
	$product = wc_get_product();

	if ( empty( $product ) ) {
		return;
	}

    comments_template();
    
}

add_shortcode('woocommerce_product_customer_review','skeletor_woocommerce_product_review');
