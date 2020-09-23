<?php

if(!defined('ABSPATH'))
	return;

class Skeletor_WC_Ajax_ATC{

	protected static $instance = null;
	public $action = null;

	//Get instance
	public static function get_instance(){
		if(self::$instance === null){
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function __construct(){
		add_action('wc_ajax_skeletor_ajax_add_to_cart',array($this,'skeletor_ajax_add_to_cart'));
		add_action('wp_enqueue_scripts',array($this,'enqueue_scripts'));
		add_filter( 'pre_option_woocommerce_cart_redirect_after_add', array($this,'prevent_cart_redirect'),10,1);
	}

	//enqueue stylesheets & scripts
	public function enqueue_scripts(){
		global $skeletor_ajax_gl_resetbtn_value;

		wp_enqueue_script('skeletor-ajax-js', SKELETOR_WC_AJAX_ATC_ASSETS_URI.'/'.'css'.'/'.'ajax-atc.js',array('jquery'), SKELETOR_WC_AJAX_ATC_VERSION, true);

		wp_localize_script('skeletor-ajax-js','skeletor_ajax_localize',array(
			'adminurl'     		=> admin_url().'admin-ajax.php',
			'homeurl' 			=> get_bloginfo('url'),
			'wc_ajax_url' 		=> WC_AJAX::get_endpoint( "%%endpoint%%" ),
		));


	}

	public function prevent_cart_redirect($value){
		if(!is_admin()){
			return 'no';
		}

		return $value;
	}

	//add to cart ajax on single product page
	public function skeletor_ajax_add_to_cart(){
		global $woocommerce;

		if(!isset($_POST['action']) || $_POST['action'] != 'skeletor_ajax_add_to_cart' || !isset($_POST['add-to-cart'])){
			die();
		}
		
		// get woocommerce error notice
		$error = wc_get_notices( 'error' );
		$html = '';

		if( $error ){
			// print notice
			ob_start();
			foreach( $error as $value ) {
				wc_print_notice( $value, 'error' );
			}

			$js_data =  array(
				'error' => ob_get_clean()
			);

			wc_clear_notices(); // clear other notice
			wp_send_json($js_data);
		}
		else {
			// trigger action for added to cart in ajax
			do_action( 'woocommerce_ajax_added_to_cart', intval( $_POST['add-to-cart'] ) );

			wc_clear_notices(); // clear other notice
			WC_AJAX::get_refreshed_fragments();	
		}

		die();
	}
}

Skeletor_WC_Ajax_ATC::get_instance();