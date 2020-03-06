<?php

require get_theme_file_path('/inc/shoe-route.php');
require get_theme_file_path('/inc/like-route.php');

// register scripts / styles
function shoes_files() {
wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=AIzaSyDn63VvrALmyYEatDMhxwyLKzx_jwcIOBI', NULL, '1.0', false);
wp_enqueue_script('shoes2-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, 'microtime()', true);
wp_enqueue_script('shoes3-js', get_theme_file_uri('/js/additionalJS.js'), NULL, 'microtime()', true);
wp_enqueue_style('shoes2_style', get_stylesheet_uri(), NULL, microtime());
wp_enqueue_style('custom-google-fonts','//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i|Pacifico|Indie+Flower|Kalam:300,400,700|Teko');
wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

wp_localize_script('shoes2-js', 'shoeData', array(
    'root_url' => get_site_url(),
    'nonce' => wp_create_nonce('wp_rest')
));
}

add_action('wp_enqueue_scripts', 'shoes_files');

// To remove the WP top menu bar
show_admin_bar(false);



function shoe_features(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('frontPageSlider2', 156,156, true);
    add_image_size('Slider', 400,400, true);
}

add_action('after_setup_theme', 'shoe_features');



function shoeMapKey($api){
    // $api['key'] = 'AIzaSyAxmes2pIhDACDBKaBif8T5geXCfWTLNmQ';
    $api['key'] = 'AIzaSyDn63VvrALmyYEatDMhxwyLKzx_jwcIOBI';
	return $api;
}

add_filter('acf/fields/google_map/api', 'shoeMapKey');


// finding out current user
function myFunction(){
    $user_ID = get_current_user_id();
    // echo "User Number $ user_ID is logged in";
}

add_action ('init', myFunction);


// LOGIN SCREEN
/* What to do on logout */
function logout_redirect() {
	$login_page  = wp_login_url();
	wp_redirect($login_page . "?login=false");
	exit;
}
add_action('wp_logout','logout_redirect');

// redirect CSS
add_action('login_enqueue_scripts', 'ourLoginCSS');

function ourLoginCSS(){
	wp_enqueue_style('shoes2_style', get_stylesheet_uri(), NULL, microtime());
	wp_enqueue_style('custom-google-fonts','//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i|Pacifico|Indie+Flower|Kalam:300,400,700|Teko');
}

// Removing Pop-Up Title Message

add_filter('login_headertitle', 'ourLoginTitle');

function ourLoginTitle(){
	return get_bloginfo('name');
}


function wp_request_localize_my_json_data(){

	// Helpers to define the $url path
    //$protocol = is_ssl() ? 'https' : 'http';
    $directory = trailingslashit( get_template_directory_uri() );

    // Define the URL
    $url = $directory . 'network.json';

	wp_enqueue_script('network-js', get_theme_file_uri('/js/network.js'), NULL, 'microtime()', true);

    // Make the request
    $request = wp_remote_get( $url );

//     // Retrieve the data
    $body = wp_remote_retrieve_body( $request );
    $data = json_decode( $body );

    // Localize script exposing $data contents
    wp_localize_script( 'network-js', 'networkJSON', array(
            'network_url' => admin_url( 'admin-ajax.php' ),
            'full_data' => $data
        )
    );

}

add_action( 'wp_enqueue_scripts', 'wp_request_localize_my_json_data', 10);


?>
