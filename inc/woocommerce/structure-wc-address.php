<?php
/**
 * Woocommerce global address structure.
 *
 * @author SamuelChuck
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Address Format
 */
function skeletor_address_format( $formats ) {
    $formats[ 'default' ]  = "{name}, {company} \n{address_1}, {address_2}\n {city}, {country} {postcode}";   
    return $formats;
}
add_filter('woocommerce_localisation_address_formats', 'skeletor_address_format');

add_filter( 'woocommerce_formatted_address_force_country_display', '__return_true' );