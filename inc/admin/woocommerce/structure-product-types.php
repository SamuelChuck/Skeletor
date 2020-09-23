<?php
/**
 * Skeletor Woocommerce product type Structure.
 *
 * @package skeletor/wc
 */

/**
 * Remove Unused product types.
 */
add_filter( 'product_type_selector', 'misha_remove_grouped_and_external' );
 
function misha_remove_grouped_and_external( $product_types ){
 
	unset( $product_types['grouped'] );
	unset( $product_types['external'] );
	//unset( $product_types['variable'] );
 
	return $product_types;
}


/**
 * Creating a new Product type
 * 
 * Step 1. Add a custom product type "term" to other hardcoded ones
 */
add_filter( 'product_type_selector', 'misha_add_gift_product_type' );
 
function misha_add_gift_product_type( $product_types ){
	$product_types[ 'gift' ] = 'Gift';
	return $product_types;
}
 
/**
 * Step 2. Each product type has a PHP class WC_Product_{type}
 */
add_action( 'init', 'misha_create_gift_product_class' );
add_filter( 'woocommerce_product_class', 'misha_load_gift_product_class',10,2);
 
function misha_create_gift_product_class(){
	class WC_Product_Gift extends WC_Product {
		public function get_type() {
			return 'gift'; // so you can use $product = wc_get_product(); $product->get_type()
		}
	}
}
 
function misha_load_gift_product_class( $php_classname, $product_type ) {
	if ( $product_type == 'gift' ) {
		$php_classname = 'WC_Product_Gift';
	}
	return $php_classname;
}

/**
 * Show “General” tab and hide “Attributes” tab for a Custom Product Type
*/
add_filter('woocommerce_product_data_tabs', 'misha_product_data_tabs' );
function misha_product_data_tabs( $tabs ){
 
	$tabs['attribute']['class'][] = 'hide_if_gift';
	return $tabs;
 
}
function wc_product_type_enqueue_admin_script() {
       ?>
    <script>
        jQuery( document ).ready( function() {
        	jQuery('#general_product_data .pricing').addClass('show_if_gift');
        });
    </script>
    <?php
}
add_action( 'admin_footer', 'wc_product_type_enqueue_admin_script' );

/**
 * If you want to create you own option group below General Tab Content
*/
add_action( 'woocommerce_product_options_general_product_data', 'misha_option_group' );
 
function misha_option_group() {
	echo '<div class="option_group">test</div>';
}