<?php
/**
 * @name: Account Profile page
 * 
 * @discription: Captures your-account-profile elementor page and shortcoderise it.
 * 
 * @author: SamuelChuck
 * @version: 0.1
 * 
 * @shortcode: [your-account-profile]
 */

function user_profile_page_sc(){
if ( $template = get_page_by_path( 'your-account-profile', OBJECT, 'elementor_library' ) ){	
    $shortcode = ' [elementor-template id="'.$template->ID.'"] ';
    echo do_shortcode( $shortcode );
}
}
add_shortcode('your_account_profile','user_profile_page_sc');
