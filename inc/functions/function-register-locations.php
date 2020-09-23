<?php
/**
 * Register Elementor Locations
 * 
 * @author https://developers.elementor.com/theme-locations-api/registering-locations/
 * @package Skeletor
 * @since 2.0.0
 */

if ( ! function_exists( 'skeletor_register_elementor_locations' ) ) {
	/**
	 * Register Elementor Locations.
	 *
	 * @param ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager $elementor_theme_manager theme manager.
	 *
	 * @return void
	 */
	function skeletor_register_elementor_locations( $elementor_theme_manager ) {
        
        /**
         * Register All Elementor Core Locations.
         */
        $elementor_theme_manager->register_all_core_location();

        /**
         * Register Main Sidebar Location
         */
        // $elementor_theme_manager->register_location(
        //     'main-sidebar',
        //     [
        //         'label' => __( 'Main Sidebar', 'skeletor' ),
        //         'multiple' => true,
        //         'edit_in_content' => false,
        //     ]
        // );
        
	}
}
add_action( 'elementor/theme/register_locations', 'skeletor_register_elementor_locations' );

