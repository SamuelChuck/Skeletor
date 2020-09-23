<?php

/**
 * 
 * Template Name: User Profile
 *
 * Allow users to update their profiles First Name and Last Name from Frontend
 * 
 * ShortCode : [edit_user_display_name]
*/


  
function edit_user_display_name_sc(){
    ob_start();
   global $current_user, $wp_roles;

   $error = array();    
   /* If profile was saved, update profile. */
   if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {

    /* Update user information. */
    if ( !empty( $_POST['display-name'] ) ){
        wp_update_user( array( 'ID' => $current_user->ID, 'display_name' => esc_attr( $_POST['display-name'] ) ) );
        do_action('edit_user_profile_update', $current_user->ID);
    }
    /* Redirect so the page will show updated info.*/
    if ( count($error) == 0 ) {
        //action hook for plugins and extra fields saving
        wp_redirect( get_permalink() );
    }
}
    //Template
    wp_enqueue_style('user-shortcode-css');

 if ( !is_user_logged_in() ) : ?>

        <div class="warning-container">
            <div class="warning-inner">
                <?php _e('You must be logged in to edit your profile.', 'profile'); ?>
           </div>
        </div>
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
                       <?php _e('Changes to your Nickname will be reflected across your RazzelRabbit account. <a href="https://help.razzelrabbit.com/account/nickname">Learn more</a>', 'profile'); ?>
                   </label>
               </div>
               
            <div class="borded-container-inner">
               <!--User Display Name-->
               <div class="profile-input-container">
                   <label class="input-label">
                       Display Name
                   </label>
                  <input class="profile-input" name="display-name" required="required"
                     type="text" id="display-name" placeholder="Display Name"
                     value="<?php the_author_meta( 'display_name', $current_user->ID ); ?>" /> 
               </div>
               <div class="em-notice">
                   <em>
                       <?php esc_html_e( 'This will be how your name will be displayed in the account section and in reviews', 'profile' ); ?>
                   </em>
               </div>
               <!--User Display Name-->
            </div>

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
    </div>
         <!-- #adduser -->
         <?php endif;
    return ob_get_clean();
}
add_shortcode('edit_user_display_name', 'edit_user_display_name_sc');
