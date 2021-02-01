<?php

// ADMIN ENQUE FUNCTIONS
function shoe_load_admin_scripts($hook){

    echo $hook;


    if (('toplevel_page_shoePostCtrl' == $hook)||('shoepostctrl_page_shoePublished' == $hook)||('shoepostctrl_page_shoeDraft' == $hook)){

// wp_register_style('shoe_admin', get_theme_file_path('/css/admin1.css'), array(),'1.0.0', 'all' );
wp_register_style('shoe_admin', get_stylesheet_directory_uri().'/css/admin/admin1.css', array(),'1.0.0', 'all' );
 wp_enqueue_style('shoe_admin');
  wp_enqueue_script('shoe_admin', get_theme_file_uri('/js/admin/admin1.js'), NULL, 'microtime()', true);
  wp_localize_script('shoe_admin', 'shoeData1', array(
    'root_url' => get_site_url(),
    'nonce' => wp_create_nonce('wp_rest')
));}

else{
    return;
}

}

add_action('admin_enqueue_scripts', 'shoe_load_admin_scripts');


