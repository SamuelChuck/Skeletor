<?php
/**
 * Seletor Default Constant
 * 
 * @package Skeletor 
 */

 /**
  * Define Skeletor Version
  */
if (! defined( 'SKELETOR_VERSION' ) ){
    define( 'SKELETOR_VERSION', '2.0.0' );
}
    
 /**
  * Define Skeletor DIR
  */
if (! defined( 'SKELETOR_DIR' ) ){
    define( 'SKELETOR_DIR', get_template_directory() .'/' );
}

/**
 * Define Skeletor Template Directory
 */
if (!defined('SKELETOR_TEMPLATES_DIR')) {
  define('SKELETOR_TEMPLATES_DIR', 'templates'.'/');
}

/**
 * Define Skeletor Includes Dir
 */
if (! defined( 'SKELETOR_INC_DIR' ) ){
    define( 'SKELETOR_INC_DIR', get_template_directory() .'/'.'inc'.'/' );
}

 /**
  * Define Skeletor URI
  */
  if (! defined( 'SKELETOR_URI' ) ){
    define( 'SKELETOR_URI', get_template_directory_uri() .'/' );
}

 /**
  * Define Assets URI
  */
if (! defined( 'SKELETOR_ASSETS_URI') ){
    define( 'SKELETOR_ASSETS_URI', get_template_directory_uri() .'/'.'assets'.'/' );
}

/**
 * Define Integration URI
 */
if (! defined( 'SKELETOR_INTEGRATIONS_URI') ){
  define( 'SKELETOR_INTEGRATIONS_URI', get_template_directory_uri() .'/'.'inc'.'/'.'integrations'.'/' );
}