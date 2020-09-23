<?php 
/**
 * @name: Event Timestamp
 * 
 * @discription: Capture User Event Time and add it as timestamp in usermeta
 * 
 * @author: SamuelChuck
 * @version: 1.2
 */

/**
 * Capture User Signin Time and add it as timestamp in usermeta
 */
function user_last_login_time( $user_login, $user ) {
    update_user_meta( $user->ID, 'last_login_time', time() );
}add_action( 'wp_login', 'user_last_login_time', 10, 2 );

/**
 * Capture User Profile Update Time and add it as timestamp in usermeta
 */
function user_last_profile_update_time(){
     $current_user = wp_get_current_user();
    update_user_meta( $current_user->ID, 'profile_update_time', time() );
}add_action('edit_user_profile_update','user_last_profile_update_time', 10,2);

/**
 * Capture User Password Reset Time and add it as timestamp in usermeta
 */
function user_last_password_reset_time(){
     $current_user = wp_get_current_user();
    update_user_meta( $current_user->ID, 'password_reset_time', time() );
}add_action('after_password_reset','user_last_password_reset_time', 10,2);



/**
 * Get the time as timestamp in usermeta from database
 * Define $event_time Time.
 * This is the time the event was carried out.
 * Example: the time the user reset/change their password or the form was used
 *
 * Check if $event_time + time_elapsed is greater than current time 
 * If $event_time + time_elapsed is greater than current time, define time of event and change time format 
 */ 
 
/*Shorcode Function*/
function user_event_timestamp_sc($atts, $content = null){
    $content = shortcode_atts( array(
        'event'                    => 'profile_update' , 
        'fallback_event'           => 'user_registered' , 
        'fallback'                 =>  true , 
        'time_format'              => 'l, F j, Y', 
        'fallback_time_elapsed'    => '78',
        'time_elapsed'             => '48',
        'text_before'              => 'on ',
        'text_after'               => ' ago',
        ), $atts );
        
    $current_user = wp_get_current_user();

    $timestamp = esc_attr($content['event']).'_time';
    $event_time = $current_user->$timestamp;
    
    $fallback_timestamp = esc_attr($content['fallback_event']);
    $current_user_data = get_userdata( $current_user->ID );
    $fallback_time = $current_user_data->$fallback_timestamp;


    if ( is_numeric($event_time) + is_numeric(esc_attr($content['time_elapsed']) * 60 * 60 > time() )){
        $time_of_event = human_time_diff( $event_time ).
        esc_html($content['text_after']);
    }
    
    elseif( esc_attr($content['fallback']) == true && esc_attr($content['fallback']) != false){
         
             if ( is_numeric($fallback_time) + is_numeric(esc_attr($content['fallback_time_elapsed']) * 60 * 60 >= time()) ){
                $time_of_event = human_time_diff(strtotime( $fallback_time )).
                esc_html($content['text_after']);
                 
             }else{
                $time_of_event = esc_html($content['text_before']).
                date(esc_attr($content['time_format']), strtotime( $fallback_time ) );
             }
    }
    else{
        $time_of_event = esc_html($content['text_before']).
        date(esc_attr($content['time_format']), $event_time );
    }
   
    
    return $time_of_event;
}
add_shortcode('event_timestamp','user_event_timestamp_sc');