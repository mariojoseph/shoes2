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

add_action('login_enqueue_scripts', 'ourLoginCSS');

// Redirecting Login page to Front Page

add_action('admin_init', 'redirectSubsToFrontend');

function redirectSubsToFrontend() {
    
	$ourCurrentUser = wp_get_current_user();
    if (count($ourCurrentUser->roles)== 1 AND $ourCurrentUser->roles[0] == 'subscriber'){
        wp_redirect(site_url('/'));

		exit;
	} 
}

// LOGGING TO CONSOLE

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

// END LOGGING TO CONSOLE

// Header Login page ......................................................................

add_action('login_head', 'pageBanner1');

function pageBanner1($args=null){
	?>

<!-- Main Container Header -->
<div class="mainContainer ">
<!-- END Main Container Header -->

<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	   <?php wp_head(); ?>

<!-- making a change -->
<header class="site-header login-header">

<div class="main-header">

    <div class="main-header-text">
    <a href="<?php echo esc_url(site_url('/')); ?>" ><h1>for those who &nbsp <img src="<?php echo get_theme_file_uri('/images/smallHeart.png'); ?>" alt=""> 
    <strong>&nbsp shoes</strong></h1></a>    

    </div>

    <div class="main-header-image">
    <input type="file" style="display: none" />
    <!-- <a href="<?php echo esc_url(site_url('post-your-shoes')); ?>" ><img src="<?php echo get_theme_file_uri('/images/PostYourShoes.png'); ?>" alt=""></a> -->
    <a href="<?php echo esc_url(site_url('post-your-shoes')); ?>" ><i class="fa fa-camera fa-lg" style="color: rgb(244,232,23);"></i></a>

    </div>

    <div class="site_header__iPad_buttons">

        <!-- <a href="<?php echo esc_url(site_url('post-your-shoes')); ?>" class="btn btn--red">Post Your Shoes</a> -->

        <?php if (is_user_logged_in()){ ?>

            <a href="<?php echo wp_logout_url(); ?>" class="btn btn--dark-orange">Log Out</a>

            <?php
            } else { ?>
            <!-- <a href="<?php echo esc_url(site_url('login')); ?>" class="btn btn--dark-orange">Log In</a> -->

            <a href="<?php echo wp_login_url(); ?>" class="btn btn--dark-orange">Log In</a>
             <!-- <a href="<?php echo esc_url(site_url('register')); ?>" class="btn btn--dark-green">Sign Up</a> -->
            <a href="<?php echo wp_registration_url(); ?>" class="btn btn--dark-green">Register</a>

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

    <!-- <a href="<?php echo esc_url(site_url('post-your-shoes')); ?>" class="btn btn--red">Post Your Shoes</a> -->
    <?php if (is_user_logged_in()){ ?>

        <a href="<?php echo wp_logout_url(); ?>" class="btn btn--dark-orange">Log Out</a>

        <?php
        } else { ?>

      <!-- <a href="<?php echo esc_url(site_url('login')); ?>" class="btn btn--dark-orange">Log In</a>
      <a href="<?php echo esc_url(site_url('register')); ?>" class="btn btn--dark-green">Sign Up</a> -->
        <a href="<?php echo wp_login_url(); ?>" class="btn btn--dark-orange">Log In</a>
        <a href="<?php echo wp_registration_url(); ?>" class="btn btn--dark-green">Register</a>

    <?php  }?>


 </div>

  <div class="site-header__menu_items">
          <div class="site-header__menu_items__home"><i class="fa fa-home" style="color: yellow;" aria-hidden="true" alt="mario"></i><a href="<?php echo esc_url(site_url(' ')); ?>" class="removeHyphen">&nbsp Home</a></div>
      <div class="site-header__menu_items__rules"><i class="fa fa-heartbeat" aria-hidden="true" style="color: #E75480;"></i><a href="<?php echo esc_url(site_url('rules')); ?>" class="removeHyphen">&nbsp Rules</a></div>
      <div class="site-header__menu_items__past"><i class="fa fa-trophy" aria-hidden="true" style="color: goldenrod;"></i><a href="<?php echo esc_url(site_url('past-winners')); ?>" >&nbsp Past Shoe Winners</a></div>
      <div class="site-header__menu_items__about"><i class="fa fa-bold" style="color: #F5DEB3;" aria-hidden="true" ></i><a href="<?php echo esc_url(site_url('blog')); ?>" >&nbsp Blog</a></div>
      <div class="site-header__menu_items__about"><i class="fa fa-users" style="color: gold;" aria-hidden="true" ></i><a href="<?php echo esc_url(site_url('brands')); ?>" >&nbsp Popular Shoe Types</a></div>
      <div class="site-header__menu_items__about"><i class="fa fa-th-list" style="color: orange;" aria-hidden="true" ></i><a href="<?php echo esc_url(site_url('popular-shoe-sites')); ?>" >&nbsp Popular Shoe Web Sites</a></div>
      <div class="site-header__menu_items__about"><i class="fa fa-users" style="color: yellowgreen;" aria-hidden="true" ></i><a href="<?php echo esc_url(site_url('about-us')); ?>" >&nbsp About Us</a></div>
      <div class="site-header__menu_items__about"><i class="fa fa-history" style="color: cyan;" aria-hidden="true" ></i><a href="<?php echo esc_url(site_url('history-of-shoes')); ?>" >&nbsp History of Shoes</a></div>
      <div class="site-header__menu_items__about"><i class="fa fa-phone" style="color: 	pink;" aria-hidden="true" ></i><a href="<?php echo esc_url(site_url('contact-us')); ?>" >&nbsp Contact Us</a></div>
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

<!-- Main Container Header -->

<!-- END Main Container Header -->
<div class="login-container">
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
            <div><a href="<?php echo esc_url(site_url('/popular-shoe-sites')) ?>">Popular Shoe Websites</a></div>
            <div><a href="<?php echo esc_url(site_url('/history-of-shoes')) ?>">History of Shoes</a></div>
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

</div>

<?php
}




// register scripts / styles
function shoes_files() {
// wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=AIzaSyDn63VvrALmyYEatDMhxwyLKzx_jwcIOBI', NULL, '1.0', false);
wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=AIzaSyAxmes2pIhDACDBKaBif8T5geXCfWTLNmQ', NULL, '1.0', false);
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
    $api['key'] = 'AIzaSyAxmes2pIhDACDBKaBif8T5geXCfWTLNmQ';
    // $api['key'] = 'AIzaSyDn63VvrALmyYEatDMhxwyLKzx_jwcIOBI';
	return $api;
}

add_filter('acf/fields/google_map/api', 'shoeMapKey');

// function shoeMapKeyUpdate(){

//     acf_update_setting('google_api_key', 'AIzaSyAxmes2pIhDACDBKaBif8T5geXCfWTLNmQ');
// }

// add_action('acf/init', 'shoeMapKeyUpdate');



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
     
// numbers

add_filter('acf/format_value/name=number_of_likes', 'fix_number', 20, 3);

function fix_number($value, $post_id, $field){
    $value = number_format($value);
    return $value;
}

add_filter('comments_open', 'my_comments_open', 10 , 2);

function my_comments_open($open, $post_id){
    $post = get_post($post_id);

    if('shoes' == $post->post_type || 'pastWinners' == $post->post_type )
        $open = true;
    
    return $open;


}



// Load parent theme stylesheets
function total_child_enqueue_parent_theme_style() {
	// Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update your theme)
	$theme   = wp_get_theme( 'have-you-seen-my-shoes' );
	$version = $theme->get( 'Version' );
	// Load the stylesheet
	wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css', array(), $version );
	
}
add_action( 'wp_enqueue_scripts', 'total_child_enqueue_parent_theme_style' );

// ADMIN PAGE FOR SHOE POSTS

require get_theme_file_path('/inc/function-admin.php');
require get_theme_file_path('/inc/enqueue.php');


// TRYING AJAX FOR ADMIN PAGE

// TESTING AJAX 20200926

add_action('wp_ajax_my_action', 'data_fetch');
add_action('wp_ajax_nopriv_my_action', 'data_fetch');

function data_fetch(){

    $id = $_POST['id'];
    $step = $_POST['step'];
 
    $args = array (
        'ID' => $id,
        'post_status' => $step,
    );

    print_r("working");
    wp_update_post($args);

    return $id;
}

// END OF TESTING AJAX 20200926

// BEGINNING OF TESTING EMAIL CHANGES

add_filter('wp_mail','mail_subject', 10,1);
function mail_subject($args){
    // $args['subject'] .= ' - Site Name';
    $args['subject'] = 'Have You Seen My Shoes Registration';
    return $args;
  }

// END OF TESTING EMAIL CHANGES
