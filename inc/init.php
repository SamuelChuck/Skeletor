<?php
/**
 * Skeletor Engine Room.
 * This is where all Theme Functions runs.
 *
 * @package skeletor
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Skeletor Core Functions
 * * Register conditionals,
 * * Enqueue styles & scripts, 
 * * Register widget regions, etc.
 */
require dirname( __FILE__ ). '/functions/function-define-constant.php';
require dirname( __FILE__ ). '/functions/function-conditionals.php';
require dirname( __FILE__ ). '/functions/function-main.php';
require dirname( __FILE__ ). '/functions/function-integrations.php';
require dirname( __FILE__ ). '/functions/function-register-locations.php';
require dirname( __FILE__ ). '/functions/function-style-script.php';



/**
 * Require Classes
 */
//require dirname( __FILE__ ). '/classes/class-.php';



/**
 * Require Admin Woocommerce
 */
if ( is_woocommerce_activated() ) {
  require dirname( __FILE__ ). '/admin/woocommerce/structure-admin-columns.php';
}


/**
 * Load WooCommerce functions
 */
if ( is_woocommerce_activated() ) {
  require dirname( __FILE__ ). '/woocommerce/structure-wc-price-global.php';
  require dirname( __FILE__ ). '/woocommerce/structure-wc-taxonomies.php';
  require dirname( __FILE__ ). '/woocommerce/structure-wc-address.php';
  require dirname( __FILE__ ). '/woocommerce/structure-wc-cart-fragment.php';
  require dirname( __FILE__ ). '/woocommerce/structure-wc-sale.php';
  require dirname( __FILE__ ). '/woocommerce/structure-wc-global-coupon.php';
}

/**
 * Load Integrations 
 */
if ( is_woocommerce_activated() ) {
  require dirname( __FILE__ ). '/integrations/ajax-atc/ajax-add-to-cart.php';
}
require dirname( __FILE__ ). '/integrations/tmt/term-management-tools.php';
require dirname( __FILE__ ). '/integrations/perserve-hierachy/perserve-page-tax-hierachy.php';

/**
 * Load Shortcode functions
 */
require dirname( __FILE__ ). '/shortcodes/copyright.php';
if ( is_woocommerce_activated() ) {  
  /*Product*/
  require dirname( __FILE__ ). '/shortcodes/woocommerce/product/on-sale.php';
  require dirname( __FILE__ ). '/shortcodes/woocommerce/product/description.php';
  require dirname( __FILE__ ). '/shortcodes/woocommerce/product/short-description.php';
  require dirname( __FILE__ ). '/shortcodes/woocommerce/product/additional-information.php';
  require dirname( __FILE__ ). '/shortcodes/woocommerce/product/single-product-reviews.php';
  
  /*Cart*/
  require dirname( __FILE__ ). '/shortcodes/woocommerce/cart/cart-count.php';
  
  /*Users*/
  require (dirname( __FILE__ ) . '/shortcodes/user/edit-user-billing-email.php');
  
  /*Archive*/
  require (dirname( __FILE__ ) . '/shortcodes/woocommerce/archive/result-count.php');
}
/*Post*/
require (dirname( __FILE__ ) . '/shortcodes/post/post-title.php');

/*Users*/
require (dirname( __FILE__ ) . '/shortcodes/user/edit-user-names.php');
require (dirname( __FILE__ ) . '/shortcodes/user/edit-user-email.php');
require (dirname( __FILE__ ) . '/shortcodes/user/edit-user-password.php');
require (dirname( __FILE__ ) . '/shortcodes/user/edit-user-display-name.php');
require (dirname( __FILE__ ) . '/shortcodes/user/edit-user-url.php');
require (dirname( __FILE__ ) . '/shortcodes/user/edit-user-bio.php');
require (dirname( __FILE__ ) . '/shortcodes/user/edit-user-gender.php');
require (dirname( __FILE__ ) . '/shortcodes/user/user-event-timestamp.php');

/*front-end Shortcode*/
require (dirname( __FILE__ ) . '/shortcodes/front-end/list-child-taxonomy.php');
require (dirname( __FILE__ ) . '/shortcodes/front-end/yith-points-and-rewards.php');

/**
 * Load Elementor widgets
*/
if( is_elementor_activated() ){
 //   require (dirname( __FILE__ ) . '/elementor/widgets.php');
}
