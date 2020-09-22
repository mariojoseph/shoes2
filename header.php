<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<!-- Main Container Footer -->
<div class="mainContainer">
<!-- END Main Container Footer -->

<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="http:/localhost:3000/favicon.ico?v=2" />
     <?php wp_head(); ?>

<!-- making a change -->
<header class="site-header">

<div class="main-header">

    <div class="main-header-text">
    <a href="<?php echo esc_url(site_url('/')); ?>" ><h1>for those who &nbsp <img src="<?php echo esc_url(get_theme_file_uri('/images/smallHeart.png')); ?>" alt=""> 
    <strong>&nbsp shoes</strong></h1></a>    
   
    </div>
    
    <div class="main-header-image">
    <input type="file" style="display: none" />
    <a href="<?php echo esc_url(site_url('post-your-shoes')); ?>" ><i class="fa fa-camera fa-lg" style="color: rgb(244,232,23);"></i></a>

    </div>
   
    <div class="site_header__iPad_buttons">

      

        <?php if (is_user_logged_in()){ ?>

            <a href="<?php echo esc_url(wp_logout_url()); ?>" class="btn btn--dark-orange">Log Out</a>

            <?php
            } else { ?>
            <!-- <a href="<?php echo esc_url(site_url('login')); ?>" class="btn btn--dark-orange">Log In</a> -->

            <a href="<?php echo esc_url(wp_login_url()); ?>" class="btn btn--dark-orange">Log In</a>
             <!-- <a href="<?php echo esc_url(site_url('register')); ?>" class="btn btn--dark-green">Sign Up</a> -->
            <a href="<?php echo esc_url(wp_registration_url()); ?>" class="btn btn--dark-green">Register</a>

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

        <a href="<?php echo esc_url(wp_logout_url()); ?>" class="btn btn--dark-orange">Log Out</a>

        <?php
        } else { ?>

      <!-- <a href="<?php echo esc_url(site_url('login')); ?>" class="btn btn--dark-orange">Log In</a>
      <a href="<?php echo esc_url(site_url('register')); ?>" class="btn btn--dark-green">Sign Up</a> -->
        <a href="<?php echo esc_url(wp_login_url()); ?>" class="btn btn--dark-orange">Log In</a>
        <a href="<?php echo esc_url(wp_registration_url()); ?>" class="btn btn--dark-green">Register</a>

    <?php  }?>


 </div>

   <!-- <hr style="border: 0.5px solid grey; width: 80%; margin: 5px auto;"> -->
 
  <div class="site-header__menu_items">
          <div class="site-header__menu_items__home"><i class="fa fa-home" style="color: yellow;" aria-hidden="true" alt="mario"></i><a href="<?php echo esc_url(site_url(' ')); ?>" class="removeHyphen">&nbsp Home</a></div>
      <div class="site-header__menu_items__rules"><i class="fa fa-heartbeat" aria-hidden="true" style="color: #E75480;"></i><a href="<?php echo esc_url(site_url('rules')); ?>" class="removeHyphen">&nbsp Rules</a></div>
      <div class="site-header__menu_items__past"><i class="fa fa-trophy" aria-hidden="true" style="color: goldenrod;"></i><a href="<?php echo esc_url(site_url('past-winners')); ?>" >&nbsp Past Shoe Winners</a></div>
      <div class="site-header__menu_items__about"><i class="fa fa-users" style="color: yellowgreen;" aria-hidden="true" style="color: white;"></i><a href="<?php echo esc_url(site_url('about-us')); ?>" >&nbsp About Us</a></div>
      <div class="site-header__menu_items__about"><i class="fa fa-users" style="color: gold;" aria-hidden="true" style="color: white;"></i><a href="<?php echo esc_url(site_url('brands')); ?>" >&nbsp Brands</a></div>
      <div class="site-header__menu_items__about"><i class="fa fa-history" style="color: cyan;" aria-hidden="true" style="color: white;"></i><a href="<?php echo esc_url(site_url('history-of-shoes')); ?>" >&nbsp History of Shoes</a></div>
      <div class="site-header__menu_items__about"><i class="fa fa-phone" style="color: 	pink;" aria-hidden="true" style="color: white;"></i><a href="<?php echo esc_url(site_url('contact-us')); ?>" >&nbsp Contact Us</a></div>
      <div class="site-header__menu_items__about"><i class="fa fa-bold" style="color: 	brown;" aria-hidden="true" style="color: brown;"></i><a href="<?php echo esc_url(site_url('blog')); ?>" >&nbsp Blog</a></div>
  </div>

</div>

</header>

</head>
