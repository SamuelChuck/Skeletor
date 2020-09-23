<?php

/**
 * 
 * Template Name: User Gender
 *
 * Allow users to update their profiles Gender from Frontend
 * 
 * ShortCode : [edit_user_gender]
*/

function edit_user_gender_sc(){
   ob_start();
   global $current_user, $wp_roles;
   $error = array();    
   
   /* If profile was saved, update profile. */
   if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {

       if ( isset( $_POST['gender'] ) ){
           update_user_meta( $current_user->ID, 'gender', $_POST['gender'] );
            /*action hook for plugins and extra fields saving*/
           do_action('edit_user_profile_update', $current_user->ID);
       }
       /* Redirect so the page will show updated info.*/
       if ( count($error) == 0 ) {
           wp_redirect(get_permalink() );
       }
   }
  wp_enqueue_style('user-shortcode-css');

    //Template
 if ( !is_user_logged_in() ) : ?>

    <p class="warning">
        <?php _e('You must be logged in to edit your profile.', 'profile'); ?>
    </p>
    <!-- .warning -->
    <?php else :  if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>

    <div class="pad-borded-container">
        <form method="post" id="adduser" action="<?php the_permalink(); ?>">
         <?php 
               //action hook for plugin and extra fields
               do_action('before_edit_user_gender_template',$current_user); ?>      
               
                <div class='field-label'>
                    <label class="note-info">
                        <?php _e('Changes you make to your gender will be reflected across your RazzelRabbit account. <a href="https://help.razzelrabbit.com/account/gender">Learn more</a>', 'profile'); ?>
                    </label>
                </div>
                <div class="borded-container-inner">
                    <label class="label-radio">
                        <input id="gender" type="radio" name="gender" <?php if (get_the_author_meta( 'gender', $current_user->ID) == 'Male' ) { ?> checked
                        <?php }?> value="Male">Male
                            <br /><span class="input-radio"></span>
                    </label>
                     
                    <label class="label-radio">
                        <input id="gender" type="radio" name="gender" <?php if (get_the_author_meta( 'gender', $current_user->ID) == 'Female') { ?> checked
                        <?php }?> value="Female">Female
                            <br /><span class="input-radio"></span>
                    </label>
                                         

                    <label class="label-radio">
                        <input id="gender" type="radio" name="gender" <?php if (get_the_author_meta( 'gender', $current_user->ID) == 'Others') { ?> checked
                        <?php }?> value="Others">Others
                            <br />  <span class="input-radio"></span>

                    </label>
                    
                     

                    <label class="label-radio">
                        <input id="gender" type="radio" name="gender" <?php if (get_the_author_meta( 'gender', $current_user->ID) == 'Rather not say') { ?> checked
                        <?php }?> value="Rather not say">Rather not say
                            <br /><span class="input-radio"></span>
                    </label>
                     

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
               do_action('after_edit_user_gender_template',$current_user); ?>
         </form>
    </div>
        <?php endif; 

    return ob_get_clean();
}
add_shortcode('edit_user_gender', 'edit_user_gender_sc');


/**
 * 
 * Template Name: User Gender
 *
 * Allow users to update their profiles Gender from Frontend
 * 
 * ShortCode : [edit_user_custom_gender]
*/

function edit_user_custom_gender_sc(){
    ob_start();
        /* Get user info. */
   global $current_user, $wp_roles;
       if ( $gender ==''){
           update_user_meta( $current_user->ID, 'gender', 'Rather not say' );
       };
   /* Load the registration file. */
   $error = array();    
   /* If profile was saved, update profile. */
   if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {

       if ( isset( $_POST['gender'] ) ){
           update_user_meta( $current_user->ID, 'gender', $_POST['gender'] );
       }

       /* Redirect so the page will show updated info.*/
     /*I am not Author of this Code- i dont know why but it worked for me after changing below line to if ( count($error) == 0 ){ */
       if ( count($error) == 0 ) {
           //action hook for plugins and extra fields saving
           do_action('edit_user_profile_update', $current_user->ID);
           wp_redirect( 'get_permalink()' );
       }

   }
           wp_enqueue_style('user-shortcode-css');

    //Template
    if ( !is_user_logged_in() ) : 
    ?>

    <p class="warning">
        <?php _e('You must be logged in to edit your profile.', 'profile'); ?>
    </p>
    <!-- .warning -->
    <?php 
         else :  if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; 
         ?>

        <form class="form" action="" method="post">

            <?php do_action( 'woocommerce_edit_account_form_start' ); ?>
                <div class='field-label'>
                    <label>
                        <?php _e('
                Changes you make to your gender will be reflected across your RazzelRabbit account. <a href="https://help.razzelrabbit.com/account/gender">Learn more</a>
                ', 'profile'); ?>
                    </label>
                </div>
                <div class="form-row form-row-last">
                <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-first_name  elementor-col-100">
                  <label for="form-field-gender" class="elementor-field-label "><?php _e('Your gender', 'profile'); ?></label>
                  <input class="elementor-field elementor-size-sm  elementor-field-textual" 
                     name="gender" 
                     type="text" id="gender"
                     placeholder="Gender"
                    <?php if (get_the_author_meta( 'gender', $current_user->ID)  == 'Female'
                      &&  get_the_author_meta( 'gender', $current_user->ID)  == 'Others'
                       &&  get_the_author_meta( 'gender', $current_user->ID)  == 'Male'
                    ) {?>
                    value=""
                      <?php }else{?>
                     value="<?php the_author_meta( 'gender', $current_user->ID ); ?>" />
                 <?php }?>
               </div>
                </div>
                <div class="clear"></div>
                <!--Submit Button-->
                <div class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100">
                        <button style='width:100%' name="updateuser" type="submit" class="elementor-button elementor-size-sm" id="updateuser" value="<?php _e('Update', 'profile'); ?>">
                            <?php wp_nonce_field( 'update-user', 'update-user-nonce' ) ?>
                                <span class="elementor-button-text"><?php _e('Update', 'profile'); ?></span>
                                <input name="action" type="hidden" id="action" value="update-user" />
                        </button>
                </div>

       <?php endif; 
return ob_get_clean();
}
add_shortcode('edit_user_custom_gender', 'edit_user_custom_gender_sc');