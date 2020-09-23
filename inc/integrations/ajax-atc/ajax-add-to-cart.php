<?php
/**
 * WooCommerce add to cart popup displays popup when item is added to cart without refreshing page.
 */

//Exit if accessed directly
if(!defined('ABSPATH')){
	return; 	
}

define('SKELETOR_WC_AJAX_ATC_VERSION',0.1);
define( 'SKELETOR_WC_AJAX_ATC_ASSETS_URI', SKELETOR_INTEGRATIONS_URI .'/'.'ajax-atc'.'/'.'assets'.'/');

require dirname( __FILE__ ). '/'.'classes'.'/'.'class-wc-ajax'.'.php';
