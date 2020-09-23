<?php

/**
 * 
 * Template Name: User Profile
 *
 * Allow users to update their profiles First Name and Last Name from Frontend
 * 
 * ShortCode : [edit_user_names]
*/
  
function edit_user_names_sc(){
    ob_start();
   /* Get user info. */
   global $current_user, $wp_roles;
   //get_currentuserinfo(); //deprecated since 3.1
   
   /* Load the registration file. */
   //require_once( ABSPATH . WPINC . '/registration.php' ); //deprecated since 3.1
   $error = array();    
   /* If profile was saved, update profile. */
   if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {
   
       if ( !empty( $_POST['first-name'] ) )
           update_user_meta( $current_user->ID, 'first_name', esc_attr( $_POST['first-name'] ) );
       if ( !empty( $_POST['last-name'] ) )
           update_user_meta($current_user->ID, 'last_name', esc_attr( $_POST['last-name'] ) );
     
       /* Redirect so the page will show updated info.*/
       if ( count($error) == 0 ) {
           //action hook for plugins and extra fields saving
           do_action('edit_user_profile_update', $current_user->ID);
           wp_redirect( get_permalink() );
       }
   }
   
           wp_enqueue_style('user-shortcode-css');

   /* Template*/
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
                       <?php _e('Changes to your name will be reflected across your RazzelRabbit account. <a href="https://help.razzelrabbit.com/account/name">Learn more</a>', 'profile'); ?>
                   </label>
               </div>
            <div class="borded-container-inner">
               <!--User First Name-->
               <div class="profile-input-container">
                   <label class="input-label">
                       First Name
                   </label>
                  <input class="profile-input" 
                     name="first-name" 
                     required="required"
                     type="text" id="first-name"
                     placeholder="First Name"
                     value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" />
               </div>
               <!--User Last Name-->
               <div class="profile-input-container">
                    <label class="input-label">
                       Last Name
                   </label>
                  <input class="profile-input"
                     name="last-name" 
                     type="text" id="last-name" 
                     placeholder="Last Name"
                     value="<?php the_author_meta( 'last_name', $current_user->ID ); ?>" />
               </div>
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
         <?php endif;
    return ob_get_clean();
}

add_shortcode('edit_user_names', 'edit_user_names_sc');
