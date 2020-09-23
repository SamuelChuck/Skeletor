<?php
/**
 * Print copyrigth Text Network Wide
*/
function skeletor_copyright_sc(){
    
    return  __('© 2016 – '. date("Y") .' , RazzelRabbit.com, Inc. or its affiliates');
}
add_shortcode('copyright','skeletor_copyright_sc');
