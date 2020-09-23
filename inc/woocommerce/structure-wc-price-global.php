<?php
/**
 * Woocommerce global price structure.
 *
 * @author SamuelChuck
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Price suffix
 */
function wc_add_srice_suffix($format, $currency_pos) {
	switch ( $currency_pos ) {
		case 'left' :
			$currency = substr(get_woocommerce_currency(),0,2);
			$format = $currency.'&nbsp;'.'%1$s%2$s' ;
		break;
	}
 
	return $format;
}
 
add_action('woocommerce_price_format', 'wc_add_srice_suffix', 1, 2);