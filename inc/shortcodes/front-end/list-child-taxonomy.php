<?php
/**
 * 
*/

function skeletor_display_child_taxonomy($atts, $content = null){
    $content = shortcode_atts( array(
        'taxonomy'            => 'product_cat' , 
        'parent_id'           => 0, 
        ), $atts );

    //You have got the current term id by the following code
    
     $current_term_id = 417;
    //Getting all the info of chilldren of the parent, not grandchildren
    
    $termchildren = array(
       'hierarchical' => true,
       'show_option_none' => '',
       'hide_empty' => 0,
       'parent' => esc_attr($content['parent_id']) ,
       'taxonomy' => esc_attr($content['taxonomy'])
    );
    
    $subcats = get_terms($termchildren);
    // Display the children
     echo '<div class="">';
       foreach ($subcats as $key => $value) {
            $term_link = get_term_link( $value );
            $name = $value->name;
            echo '<div> <a href="'.$term_link.'">'.$name.'</a></div>';
       }
     echo '</div>';
        
}

add_shortcode('display_child_taxonomy','skeletor_display_child_taxonomy');


  /*  $taxonomyName = "product_cat";
    //This gets top layer terms only.  This is done by setting parent to 0.  
    $parent_terms = get_terms( $taxonomyName, array( 'parent' => 417, 'orderby' => 'slug', 'hide_empty' => false ) );   
    echo '<ul>';
    foreach ( $parent_terms as $pterm ) {
        //Get the Child terms
        $terms = get_terms( $taxonomyName, array( 'parent' => $pterm->term_id, 'orderby' => 'slug', 'hide_empty' => false ) );
        foreach ( $terms as $term ) {
            echo '<li><a href="' . get_term_link( $term ) . '">' . $term->name . '</a></li>';   
        }
    }
    echo '</ul>';*/