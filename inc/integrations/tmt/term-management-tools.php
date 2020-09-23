<?php
/**
 * 
 * Description: If you need to reorganize your tags and categories, this plugin will make it easier for you. It adds two new options to the Bulk Actions dropdown on term management pages
 * Plugin URI: https://wordpress.org/plugins/term-management-tools/
 * Author: scribu
 * Author URI: https://profiles.wordpress.org/scribu/
 * Network: True
 */

//Exit if accessed directly
if(!defined('ABSPATH')){
	return; 	
}

define('SKELETOR_TMT_VERSION',0.1);
define( 'SKELETOR_TMT_ASSETS_URI', SKELETOR_INTEGRATIONS_URI .'/'.'tmt'.'/'.'assets'.'/');

require dirname( __FILE__ ). '/'.'classes'.'/'.'class-term-management-tools'.'.php';