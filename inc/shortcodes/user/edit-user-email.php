<?php
/**
 * 
 * Template Name: User Profile
 *
 * Allow users to update their profiles Email Address from Frontend.
 * 
 * ShortCode : [edit_user_email]
*/

function edit_user_email_sc(){
    ob_start();
    global $current_user, $wp_roles;
    $error = array(); 
    
    /* If profile was saved, update profile. */
    if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {
    
        /* Update user information. */
        if ( !empty($_POST['email1'] ) && !empty( $_POST['email2'] ) ){
             
             if ( $_POST['email1'] == $_POST['email2'] ){
                
                if ( !is_email( esc_attr( $_POST['email1'] ) ) ){
                    $error[] = __('The Email you entered is not valid.  please try again.', 'profile');
                }
                elseif(email_exists(esc_attr( $_POST['email1'] )) ){
                    $error[] = __('This email is already used by another user.  try a different one.', 'profile');
                }
                else{
                    wp_update_user( array ('ID' => $current_user->ID, 'user_email' => esc_attr( $_POST['email1'] )));
                    do_action('edit_user_profile_update', $current_user->ID);
                }
            }
            else $error[] = __('The Email you entered do not match.  Your email address was not updated.', 'profile');
        }
    
        /* Redirect so the page will show updated info.*/
        if ( count($error) == 0 ) {
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
                           <?php _e('Changes to your email make will be reflected across your RazzelRabbit account. <a href="https://help.razzelrabbit.com/account/emails">Learn more</a>', 'profile'); ?>
                       </label>
                   </div>
                
                <div class="borded-container-inner">
                   <!--User Email-->
                    <div class="profile-input-container">
                        <label class="input-label">New email address</label>
                          <input class="profile-input" 
                             name="email1" 
                             required="required"
                             type="email" 
                             id="email1" 
                             value="<?php the_author_meta( 'user_email', $current_user->ID ); ?>" />
                    </div>             
                    <!--Confirm User Email-->
                    <div class="profile-input-container">
                        <label class="input-label">Re-enter new email</label>
                          <input class="profile-input" 
                             name="email2" 
                             required="required"
                             type="email" 
                             id="email2" 
                             placeholder="Confirm new email"
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
add_shortcode('edit_user_email','edit_user_email_sc');
