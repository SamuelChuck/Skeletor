<?php
/**
 * Register the Skeletor Style & Scripts 
 * 
 * @package Skeletor
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' )   ) { exit; }


if ( ! function_exists( 'skeletor_styles' ) ) {
	/**
	 * Theme  Styles.
	 *
	 * @return void
	 */
	function skeletor_styles() {
		$enqueue_style		 = apply_filters( 'skeletor_enqueue_style', true );
		$min_suffix          = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		$min_prifix          = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : 'min'.'/';		
		$style_uri 		 = SKELETOR_ASSETS_URI . 'css'.'/';
		$template_style_uri = SKELETOR_ASSETS_URI . 'css'.'/'. $min_prifix .'templates'.'/';

		if ( apply_filters( 'skeletor_enqueue_style', $enqueue_style ) ) {
			wp_enqueue_style('skeletor-style-head', $style_uri. 'header' . '.css', [], SKELETOR_VERSION);
			wp_enqueue_style( 'skeletor-style-main', $style_uri. $min_prifix . 'main' . $min_suffix . '.css', [], SKELETOR_VERSION);
			wp_enqueue_style( 'skeletor-style-search', $style_uri . $min_prifix . 'search' . $min_suffix . '.css', [], SKELETOR_VERSION );

			if( is_user_logged_in() ){
				wp_enqueue_style('skeletor-style-user', $style_uri .  'user' . '.css', [], SKELETOR_VERSION );
			}else{
				wp_enqueue_style( 'skeletorstyle-guest', $style_uri. 'guest' . '.css', [], SKELETOR_VERSION );
			}
		}
		
		/**
		 * Template Style
		 */
		if ( apply_filters( 'skeletor_enqueue_template_style', true ) ) {
			wp_enqueue_style(
				'skeletor-template-style', $template_style_uri . 'template' . $min_suffix . '.css', [], SKELETOR_VERSION
			);
		}
	}
	add_action( 'wp_enqueue_scripts', 'skeletor_styles' );
}


if ( ! function_exists( 'skeletor_scripts' ) ) {
	/**
	 * Theme Scripts.
	 *
	 * @return void
	 */
	function skeletor_scripts() {
		$enqueue_script		 = apply_filters( 'skeletor_enqueue_script', true );
		$min_suffix          = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		$min_prifix          = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : 'min'.'/';	
		$script_uri 		 = SKELETOR_ASSETS_URI . 'js'.'/';
		$template_script_uri = SKELETOR_ASSETS_URI . 'js'.'/'. $min_prifix .'templates'.'/';


		if ( apply_filters( 'skeletor_enqueue_script', $enqueue_script ) ) {
			wp_enqueue_script( 'skeletor', $script_uri . $min_prifix . 'header' . $min_suffix . '.js', [], SKELETOR_VERSION );
			wp_enqueue_script( 'skeletor', $script_uri . $min_prifix . 'search' . $min_suffix . '.js', [], SKELETOR_VERSION );
			wp_enqueue_script( 'skeletor', $script_uri . $min_prifix . 'woocommerce' . $min_suffix . '.js', [], SKELETOR_VERSION );
			wp_add_inline_script( 'skeletor-add-to-cart-popup',"(function($){ $('body').on( 'added_to_cart', function(){ $('#added_to-cart_popup_trigger').click(); }); })(jQuery)" );

		}

		/**
		 * Template Script
		 */
		if ( apply_filters( 'skeletor_enqueue_template_script', true ) ) {
			wp_enqueue_script(
				'skeletor-template-script', $template_script_uri . 'template' . $min_suffix . '.js', [], SKELETOR_VERSION
			);
		}
	}
	add_action( 'wp_enqueue_scripts', 'skeletor_scripts' );
}

if ( ! function_exists( 'trigger_for_ajax_add_to_cart' ) && is_woocommerce_activated() ){
	/**
	 * Woocommerce Ajax Add to cart trigger for 
	 * 
	 * Will trigger a click on the element with id added_to-cart_trigger when add_to_cart function fires (when a product is added to cart).
	 * 
	 * @author SamuelChuck
	 */
	function trigger_for_ajax_add_to_cart() { ?>
		<script type="text/javascript">
			(function($){
				$('body').on( 'added_to_cart', function(){
					$("#added_to-cart_trigger").click();
				});
			})(jQuery);
		</script>
	<?php }
	//add_action( 'wp_footer', 'trigger_for_ajax_add_to_cart' );
}

if ( ! function_exists( 'skeletor_editor_style' ) ) {

	function skeletor_editor_style(){
		$enqueue_editor_style		 = apply_filters( 'skeletor_enqueue_script', true );
		$min_suffix          = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		$min_prifix          = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : 'min'.'/';	
		$editor_style_uri 		 = SKELETOR_ASSETS_URI . 'css' . '/' . 'editor' . '/';
		/**
		 * Editor Style.
		 */
		if( apply_filters( 'skeletor_enqueue_editor_style', $enqueue_editor_style ) ){
			add_editor_style($editor_style_uri . 'editor' . '.css');
		}
	}
	add_action( 'after_setup_theme', 'skeletor_editor_style' );
}