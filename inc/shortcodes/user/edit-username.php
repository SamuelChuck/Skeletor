<?php

/**
 * 
 * Template Name: User Profile
 *
 * Allow users to update their profiles First Name and Last Name from Frontend
 * 
 * ShortCode : [edit_username]
*/


  
function edit_username_sc(){
    ob_start();
   /* Get user info. */
   global $current_user, $wp_roles;
   //get_currentuserinfo(); //deprecated since 3.1
   
   /* Load the registration file. */
   //require_once( ABSPATH . WPINC . '/registration.php' ); //deprecated since 3.1
   $error = array();    
   /* If profile was saved, update profile. */
   if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {

    /* Update user information. */
    if ( !empty( $_POST['username'] ) )
        wp_update_user( array( 'ID' => $current_user->ID, 'user_login' => esc_attr( $_POST['username'] ) ) );

    /* Redirect so the page will show updated info.*/
  /*I am not Author of this Code- i dont know why but it worked for me after changing below line to if ( count($error) == 0 ){ */
    if ( count($error) == 0 ) {
        //action hook for plugins and extra fields saving
        do_action('edit_user_profile_update', $current_user->ID);
        wp_redirect( get_permalink() );
    }
}
    //Template
  wp_enqueue_style('user-shortcode-css');

 if ( !is_user_logged_in() ) :?>
          
         <p class="warning">
            <?php _e('You must be logged in to edit your profile.', 'profile'); ?>
         </p>
         <!-- .warning -->
         <?php 
         else :  if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; 
         ?>
         
         <form method="post" id="adduser" action="<?php the_permalink(); ?>">
            <?php 
               //action hook for plugin and extra fields
               do_action('before_edit_user_name_template',$current_user); ?>            
               
            <div class="elementor-form-fields-wrapper elementor-labels-">
               <!--User Display Name-->
               <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-username  elementor-col-100">
                  <label for="form-field-username" class="elementor-field-label "><?php _e('Username', 'profile'); ?></label>
                  <input class="elementor-field elementor-size-lg  elementor-field-textual" 
                     name="username" 
                     required="required"
                     type="text" id="username"
                     placeholder="Username"
                     value="<?php the_author_meta( 'user_login', $current_user->ID ); ?>" /> 
                     <span><em><?php esc_html_e( 'This will be how your name will be displayed in the account section and in reviews', 'woocommerce' ); ?></em></span>

               </div>
               <!--User Display Name-->

               <!--Submit Button-->
               <div class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100">                        
                  <button style='width:100%' name="updateuser" type="submit" class="elementor-button elementor-size-sm" id="updateuser" value="<?php _e('Update', 'profile'); ?>">
                  <?php wp_nonce_field( 'update-user', 'update-user-nonce' ) ?>
                  <span class="elementor-button-text"><?php _e('Update', 'profile'); ?></span>
                  <input name="action" type="hidden" id="action" value="update-user" />
                  </button>
               </div>
            </div>

            <?php 
               //action hook for plugin and extra fields
               do_action('after_edit_user_name_template',$current_user); ?>
         </form>
         <!-- #adduser -->
         <?php endif;
    return ob_get_clean();
}
add_shortcode('edit_username', 'edit_username_sc');
