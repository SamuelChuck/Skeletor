<?php
/* Display Post Parent Title */

function skeletor_post_parent_title(){
    global $post;
    
    if($post->post_parent) {
       $parent_title = get_the_title($post->post_parent);
       echo $parent_title;
    }
    else {
       echo get_the_title();
    }
}
add_shortcode('post_parent_title','skeletor_post_parent_title');

/* Display Post Ancestor Title */

function skeletor_post_ancestor_title(){
    global $post;
    
    $parent = $post->post_parent;

    $grandparent_get = get_post($parent);

    $grandparent = $grandparent_get->post_parent;
    
    if ( $grandparent ) {
         
        echo get_the_title($grandparent).' - '.get_the_title($post->post_parent); 
         
    }elseif ($post->post_parent) {
        echo get_the_title($post->post_parent);
        
    }
}
add_shortcode('post_ancestor_title','skeletor_post_ancestor_title');

