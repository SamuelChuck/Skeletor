<?php

/**
 * 
 * Template Name: User Profile
 *
 * Allow users to update their profiles First Name and Last Name from Frontend
 * 
 * ShortCode : [edit_user_password]
*/


  
function edit_user_password_sc(){
    ob_start();
   /* Get user info. */
   global $current_user, $wp_roles;
   //get_currentuserinfo(); //deprecated since 3.1
   
   /* Load the registration file. */
   //require_once( ABSPATH . WPINC . '/registration.php' ); //deprecated since 3.1
   $error = array();    
   /* If profile was saved, update profile. */
    if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {
    
        /* Update user password. */
        if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
            if ( $_POST['pass1'] == $_POST['pass2'] ){
                wp_update_user( array( 'ID' => $current_user->ID, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
                do_action('after_password_reset', $current_user->ID);           
                do_action('edit_user_profile_update', $current_user->ID);
            }
            else $error[] = __('The passwords you entered do not match.  Your password was not updated.', 'profile');
            }
            
        if ( count($error) == 0 ) {
           wp_redirect( get_permalink() );
       }
    }
wp_enqueue_style('user-shortcode-css');

//Template     

 if ( !is_user_logged_in() ) : ?>
          
         <p class="warning">
            <?php _e('You must be logged in to edit your profile.', 'profile'); ?>
         </p>
         <!-- .warning -->
         <?php 
         else :  if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; 
         ?>
         
    <div class="pad-borded-container">
         <form method="post" id="adduser" action="<?php the_permalink(); ?>">
            <?php 
               //action hook for plugin and extra fields
               do_action('before_edit_user_name_template',$current_user); ?>  
               
               <div class='field-label'>
                   <label class="note-info">
                       <?php _e('Choose a strong password and don\'t reuse it for any other account. <a href="https://help.razzelrabbit.com/account/password">Learn more</a> ', 'profile'); ?>
                   </label>
               </div>
               
            <div class="borded-container-inner">
               <!--User Pass 1-->
               <div class="profile-input-container">
                <label class="input-label">Password</label>
                    <input class="profile-input flex-inner" 
                     name="pass1" 
                     required="required"
                     type="password" id="pass1"
                     placeholder="New Password" />
               </div>
               
               <!--User Pass 2-->
               <div class="profile-input-container">
                  <label for="form-field-pass2" class="input-label">Confirm Password</label>
                   <input class="profile-input"
                     name="pass2" 
                     required="required"
                     type="password" id="pass2" 
                     placeholder="Confirm new password"/>
               </div>
               <div class="space-10"></div>
               <div class="label-chechbox-container">
                  <label class="label-checkbox">Show password
                      <input type="checkbox" onclick="myFunction()">
                      <span class="input-checkbox"></span>
                </label>
               </div>
              <div class="em-notice">
                   <em>
                       <?php esc_html_e( 'Changing your password will log you out of all your devices. You will need to sign in with your new password on all your devices.', 'profile' ); ?>
                   </em>
              </div>
            </div>

            <script>
                function myFunction() {
                  var x = document.getElementById("pass1");
                  if (x.type === "password") {
                    x.type = "text";
                  } else {
                    x.type = "password";
                  }      var x = document.getElementById("pass2");
                  if (x.type === "password") {118
                    x.type = "text";
                  } else {
                    x.type = "password";
                  }
                }
            </script>

               <!--Submit Button-->
              <div class="button-container">                        
                  <input id="updateuser" class="button" type="submit" name="updateuser" value="<?php _e('Update', 'profile'); ?>" />
                     <?php wp_nonce_field( 'update-user', 'update-user-nonce' ) ?>
                  <input name="action" type="hidden" id="action" value="update-user" />
               </div>
            <?php 
               //action hook for plugin and extra fields
               do_action('after_edit_user_name_template',$current_user); ?>
         </form>
         <!-- #adduser -->
    </div>
         <?php endif;
    return ob_get_clean();
}
add_shortcode('edit_user_password', 'edit_user_password_sc');
