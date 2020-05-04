<?php

require get_theme_file_path('/inc/shoe-route.php');
require get_theme_file_path('/inc/like-route.php');

// Basics Login Page

// // LOGIN SCREEN 2 - CUSTOMIZE WP LOGIN SCREEN

add_filter('login_headerurl', 'ourHeaderURL');

function ourHeaderUrl(){
    return esc_url(site_url('/'));
}

add_filter('login_headertitle', 'ourLoginTitle');

function ourLoginTitle(){
    return get_bloginfo('name');
}

// Creating CSS for Login Page
function ourLoginCSS() {

    wp_enqueue_style('shoes2_style', get_stylesheet_uri(), NULL, microtime());
    wp_enqueue_style('custom-google-fonts','//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i|Pacifico|Indie+Flower|Kalam:300,400,700|Teko');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    
    }

// Redirecting Login page to Front Page
add_action('login_enqueue_scripts', 'ourLoginCSS');

add_action('admin_init', 'redirectSubsToFrontend');

function redirectSubsToFrontend() {

	$ourCurrentUser = wp_get_current_user();

	if (count($ourCurrentUser->roles)== 1 AND $ourCurrentUser->roles[0] == 'subscriber'){
		wp_redirect(site_url('/'));
		exit;
	} 
}

// Header Login page ......................................................................

add_action('login_head', 'pageBanner1');

function pageBanner1($args=null){
	?>

<!-- Main Container Header -->
<div class="mainContainer login-container">
<!-- END Main Container Header -->

<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	   <?php wp_head(); ?>

<!-- making a change -->
<header class="site-header login-header">

<div class="main-header">

    <div class="text">
    <a href="<?php echo esc_url(site_url('/')); ?>" ><h1>The site for those who &nbsp <img src="<?php echo get_theme_file_uri('/images/smallHeart.png'); ?>" alt=""> 
    <strong>&nbsp shoes</strong></h1></a>    

    </div>

    <div class="site_header__iPad_buttons">

        <a href="<?php echo esc_url(site_url('post-your-shoes')); ?>" class="btn btn--red">Post Your Shoes</a>

        <?php if (is_user_logged_in()){ ?>

            <a href="<?php echo wp_logout_url(); ?>" class="btn btn--dark-orange">Log Out</a>

            <?php
            } else { ?>
            <!-- <a href="<?php echo esc_url(site_url('login')); ?>" class="btn btn--dark-orange">Log In</a> -->

            <a href="<?php echo wp_login_url(); ?>" class="btn btn--dark-orange">Log In</a>
             <!-- <a href="<?php echo esc_url(site_url('register')); ?>" class="btn btn--dark-green">Sign Up</a> -->
            <a href="<?php echo wp_registration_url(); ?>" class="btn btn--dark-green">Sign Up</a>

          <?php  }?>

         </div>

     <div class="site_header__iPad_text">
        <div class="site_header__iPad_text_rules"><i class="fa fa-heartbeat" aria-hidden="true" style="color: #E75480;"></i><a href="<?php echo esc_url(site_url('rules')); ?>" class="removeHyphen">&nbsp Rules</a></div>
      </div>

    <div class="main-navigation">

        <i class="site-header__menu-trigger fa fa-bars" style="color: white;" aria-hidden="true" alt="mario"></i>

    </div>

</div>


<div class="site-header__menu">

 <div class="site_header__menu_util">

    <a href="<?php echo esc_url(site_url('post-your-shoes')); ?>" class="btn btn--red">Post Your Shoes</a>
    <?php if (is_user_logged_in()){ ?>

        <a href="<?php echo wp_logout_url(); ?>" class="btn btn--dark-orange">Log Out</a>

        <?php
        } else { ?>

      <!-- <a href="<?php echo esc_url(site_url('login')); ?>" class="btn btn--dark-orange">Log In</a>
      <a href="<?php echo esc_url(site_url('register')); ?>" class="btn btn--dark-green">Sign Up</a> -->
        <a href="<?php echo wp_login_url(); ?>" class="btn btn--dark-orange">Log In</a>
        <a href="<?php echo wp_registration_url(); ?>" class="btn btn--dark-green">Sign Up</a>

    <?php  }?>


 </div>

  <div class="site-header__menu_items">
          <div class="site-header__menu_items__home"><i class="fa fa-home" style="color: yellow;" aria-hidden="true" alt="mario"></i><a href="<?php echo esc_url(site_url(' ')); ?>" class="removeHyphen">&nbsp Home</a></div>
      <div class="site-header__menu_items__rules"><i class="fa fa-heartbeat" aria-hidden="true" style="color: #E75480;"></i><a href="<?php echo esc_url(site_url('rules')); ?>" class="removeHyphen">&nbsp Rules</a></div>
      <div class="site-header__menu_items__past"><i class="fa fa-trophy" aria-hidden="true" style="color: goldenrod;"></i><a href="<?php echo esc_url(site_url('past-winners')); ?>" >&nbsp Past Shoe Winners</a></div>
      <div class="site-header__menu_items__about"><i class="fa fa-heart" style="color: red;" aria-hidden="true" style="color: white;"></i><a href="<?php echo esc_url(site_url('about-us')); ?>" >&nbsp About Us</a></div>
  </div>

</div>

</header>

</head>

</div>
<?php
}
// FooterLogin page ...............................................

add_action('login_footer', 'pageBanner');

function pageBanner($args=null){
	?>

<footer class="site-footer">

<div class="site-footer__grid1">

    <h2 class=""><a href="<?php echo site_url() ?>">Have You Seen My <strong>Shoes</strong></a></h2>
    <p><a class="" href="#">E-mail: <i>info@have-you-seen-my-shoes.com</i></a></p>

</div>

<div class="site-footer__grid2">

        <h3 class="headline">Explore</h3>

        <div class="site-footer__grid2_ul">
            <div><a href="<?php echo site_url('/about-us') ?>">About Us</a></div>
            <div><a href="<?php echo site_url('/popular-shoe-types') ?>">Popular Shoe Types</a></div>
            <div><a href="<?php echo site_url('/history-of-shoes') ?>">History of Shoes</a></div>
        </div>

</div>

<div class="site-footer__grid3">

    <h3 class="headline">Administration</h3>

    <div class="site-footer__grid3_ul">
        <div><a href="<?php echo site_url('/privacy') ?>">Privacy Policy</a></div>
        <div><a href="<?php echo site_url('/Legal') ?>">Legal</a></div>
        <div><a href="<?php echo site_url('/contact-us') ?>">Contact Us</a></div>
    </div>

</div>

<div class="site-footer__grid4">

    <h3 class="headline">Connect With Us</h3>

    <!-- <nav> -->

        <div class="social-icons-list">
            <div class=""><a href="#" class="social-color-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
            <div class=""><a href="#" class="social-color-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
            <div class=""><a href="#" class="social-color-youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a></div>
            <div class=""><a href="#" class="social-color-facebook"><i class="fa fa-linkedin" aria-hidden="true"></i></a></div>
            <div class=""><a href="#" class="social-color-facebook"><i class="fa fa-instagram" aria-hidden="true"></i></a></div>
        </div>

    <!-- </nav> -->

</div>


<div class="site-footer__grid5">
    <br>
    <h3>Copyright &copy; 2019</h3>

</div>


</footer>


<?php
}




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



// Hiding Top Admin Bar
add_action('wp_loaded', 'noSubsAdminBar');

function noSubsAdminBar(){
	$ourCurrentUser = wp_get_current_user();

	if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber'){
		show_admin_bar(false);
	}
}
     
// // END LOGIN SCREEN 2

// // LOGIN SCREEN

// /* Main redirection of the default login page */
// function redirect_login_page() {
// 	$login_page  = home_url('/login/');
// 	$page_viewed = basename($_SERVER['REQUEST_URI']);

// 	if($page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
// 		wp_redirect($login_page);
// 		exit;
// 	}
// }
// add_action('init','redirect_login_page');

// /* Where to go if a login failed */
// function custom_login_failed() {
// 	$login_page  = home_url('/login/');
// 	wp_redirect($login_page . '?login=failed');
// 	exit;
// }
// add_action('wp_login_failed', 'custom_login_failed');

// /* Where to go if any of the fields were empty */
// function verify_user_pass($user, $username, $password) {
// 	$login_page  = home_url('/login/');
// 	if($username == "" || $password == "") {
// 		wp_redirect($login_page . "?login=empty");
// 		exit;
// 	}
// }
// add_filter('authenticate', 'verify_user_pass', 1, 3);

// /* What to do on logout */
// function logout_redirect() {
// 	$login_page  = home_url('/login/');
// 	wp_redirect($login_page . "?login=false");
// 	exit;
// }
// add_action('wp_logout','logout_redirect');

// // Redirect Subscriber Accounts out of Admin and onto homepage





// // REGISTRATION SCREEN
// /* Main redirection of the default login page */
// function redirect_registration_page() {
// 	$register_page  = home_url('/register/');
// 	$page_viewed = basename($_SERVER['REQUEST_URI']);

// 	if($page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
//         // wp_redirect($register_page);
//         wp_redirect(site_url('/'));
// 		exit;
// 	}
// }
// add_action('init','redirect_registration_page');

// // function action_user_register($user_ID)
// // {
// //     wp_redirect(site_url('/'));
// // }
// // add_filter( 'user_register', 'action_user_register', 10, 1 );

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

