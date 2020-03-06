<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	   <?php wp_head(); ?>

<!-- making a change -->
<header class="site-header">

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
            <a href="<?php echo esc_url(site_url('login')); ?>" class="btn btn--dark-orange">Log In</a>

            <!-- <a href="<?php echo wp_login_url(); ?>" class="btn btn--dark-orange">Log In</a> -->
             <a href="<?php echo esc_url(site_url('register')); ?>" class="btn btn--dark-green">Sign Up</a>
            <!-- <a href="<?php echo wp_registration_url(); ?>" class="btn btn--dark-red">Sign Up</a> -->

          <?php  }?>

         </div>

     <div class="site_header__iPad_text">
        <div><i class="fa fa-book" aria-hidden="true" style="color: #E75480;"></i><a href="<?php echo esc_url(site_url('rules')); ?>" class="removeHyphen">&nbsp Rules</a></div>
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

      <a href="<?php echo esc_url(site_url('login')); ?>" class="btn btn--dark-orange">Log In</a>
      <a href="<?php echo esc_url(site_url('register')); ?>" class="btn btn--dark-green">Sign Up</a>
        <!-- <a href="<?php echo wp_login_url(); ?>" class="btn btn--dark-orange">Log In</a>
        <a href="<?php echo wp_registration_url(); ?>" class="btn btn--dark-red">Sign Up</a> -->

    <?php  }?>


 </div>

  <div class="site-header__menu_items">
          <div class="site-header__menu_items__home"><i class="fa fa-home" style="color: yellow;" aria-hidden="true" alt="mario"></i><a href="<?php echo esc_url(site_url(' ')); ?>" class="removeHyphen">&nbsp Home</a></div>
      <div class="site-header__menu_items__rules"><i class="fa fa-book" aria-hidden="true" style="color: #E75480;"></i><a href="<?php echo esc_url(site_url('rules')); ?>" class="removeHyphen">&nbsp Rules</a></div>
      <div class="site-header__menu_items__past"><i class="fa fa-trophy" aria-hidden="true" style="color: goldenrod;"></i><a href="<?php echo esc_url(site_url('past-winners')); ?>" >&nbsp Past Shoe Winners</a></div>
      <div class="site-header__menu_items__about"><i class="fa fa-heart" style="color: red;" aria-hidden="true" style="color: white;"></i><a href="<?php echo esc_url(site_url('about-us')); ?>" >&nbsp About Us</a></div>
  </div>

</div>

</header>

</head>
