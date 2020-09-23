<?php

/**
 * 
 * Template Name: User Profile
 *
 * Allow users to update their profiles First Name and Last Name from Frontend
 * 
 * ShortCode : [edit_user_billing_email]
*/
  
function edit_user_billing_email_sc(){
    ob_start();
   global $current_user, $wp_roles;
   $error = array();    
   
   /* If profile was saved, update profile. */
   if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {
   
       /* Update user information. */
        if ( !empty($_POST['billing-email1'] ) && !empty( $_POST['billing-email2'] ) ){
             
             if ( $_POST['billing-email1'] == $_POST['billing-email2'] ){
                
                if ( !is_email( esc_attr( $_POST['billing-email1'] ) ) ){
                    $error[] = __('The Email you entered is not valid.  please try again.', 'profile');
                }
                elseif(email_exists(esc_attr( $_POST['billing-email1'] )) ){
                    $error[] = __('This email is already used by another user.  try a different one.', 'profile');
                }
                else{
                    update_user_meta( $current_user->ID, 'billing_email', esc_attr( $_POST['billing-email1'] ) );
                    do_action('edit_user_profile_update', $current_user->ID);
                }
            }
            else $error[] = __('The Email you entered do not match.  Your email address was not updated.', 'profile');
        }
    
       /* Redirect so the page will show updated info.*/
       if ( count($error) == 0 ) {
           //action hook for plugins and extra fields saving
           do_action('edit_user_profile_update', $current_user->ID);
           wp_redirect( get_permalink() );
       }
   }

wp_enqueue_style('user-shortcode-css');

/*Template*/
 if ( !is_user_logged_in() ) : ?>

                 
        <div class="warning-container">
            <div class="warning-inner">
                <?php _e('You must be logged in to edit your profile.', 'profile'); ?>
           </div>
        </div>
        <!-- .warning -->
        <?php else :  if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>
    
    <div class="pad-borded-container"> 
        <form method="post" id="adduser" action="<?php the_permalink(); ?>">
            <?php 
                   //action hook for plugin and extra fields
                   do_action('before_edit_user_email_template',$current_user); ?>           
                   
                  <div class='field-label'>
                       <label  class="note-info">
                           <?php _e('Changes to your billing email address will be reflected across your RazzelRabbit account. <a href="https://help.razzelrabbit.com/account/emails">Learn more</a>', 'profile'); ?>
                       </label>
                   </div>
                
                <div class="borded-container-inner">
                   <!--User Email-->
                    <div class="profile-input-container">
                        <label class="input-label">New billing email address</label>
                          <input class="profile-input" 
                             name="billing-email1" 
                             required="required"
                             type="email" 
                             id="billing-email1" 
                             value="<?php the_author_meta( 'billing_email', $current_user->ID ); ?>" />
                    </div>             
                    <!--Confirm User Email-->
                    <div class="profile-input-container">
                        <label class="input-label">Re-enter new billing email</label>
                          <input class="profile-input" 
                             name="billing-email2" 
                             required="required"
                             type="email" 
                             id="billing-email2" 
                             placeholder="Confirm new billing email"
                             value="" />
                    </div>
                </div>
               <!--Submit Button-->
              <div class="button-container">                        
                  <input id="updateuser" class="button" type="submit" name="updateuser" value="<?php _e('Update', 'profile'); ?>" />
                     <?php wp_nonce_field( 'update-user', 'update-user-nonce' ) ?>
                  <input name="action" type="hidden" id="action" value="update-user" />
               </div>        
            </div>
    
            <?php 
                //action hook for plugin and extra fields
                do_action('after_edit_user_email_template',$current_user); ?>
        </form>
         <!-- #adduser -->
    </div>      

<?php endif; 
    return ob_get_clean();
}

add_shortcode('edit_user_billing_email', 'edit_user_billing_email_sc');
