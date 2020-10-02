
<?php get_header(); ?>

<div class="popularShoesBody">
    <div class="popularShoesBackground">

     
        <div class="popularShoesTitle">
            <div class="popularShoesLabel">
                <h1 > Popular Shoe Sites</h1>
            </div>
            <div class="popularShoesButton">
            <i class="fa popularShoesButtonColor fa-home" style="color: yellow;" aria-hidden="true" alt="mario"></i><a href="<?php echo esc_url(site_url(' ')); ?>" class="removeHyphen">&nbsp Home</a>  
            </div>
        </div> 

        <div class="popularShoesMessage">
        <ul>
                    <li>Below is a list of popular shoe sites</li>
                    <li>Please contact us if you know others. Thanks !!!</li>
                </ul>
               
        </div>

<!-- POPULAR SHOES WEBSITE -->
        <div class="popularShoesContent">
            <div class="popularShoesContent-General">
                <h2>General Shoe Websites</h2>
            </div>
            <div class="popularShoesContent-ipad"> 
            <?php
            $site = new WP_Query(array(
                'post_type' => 'sites',
                'posts_per_page' => -1,
                'meta_key' => 'category',
                'meta_value' => 'general'

              ));
            
              while($site->have_posts()){
                  $site->the_post();
                  $siteImage = get_field('image');
                  $siteName = get_field('name');
                  $siteLink = get_field('link');
                  $siteAvailability = get_field('availability');
                  $siteTypeOfSite = get_field('type_of_site');
                  $siteOther = get_field('other');
                  $siteImageSize = 'thumbnail';
                  $siteImage1 = wp_get_attachment_image_src($siteImage['id'], $siteImageSize);
                     ?>

            <div class="popularShoesContent-1">
               <div class="popularShoesContent-1-title">
                    <h4><?php echo esc_html($siteName); ?></h4>
                    <img src="<?php echo esc_url($siteImage1[0]); ?>" alt="hallo">
               </div> 

              
                <ul>
                    <li><a href=<?php echo esc_url($siteLink); ?>>Link</a></li>
                    <li class="popularShoesContent-1-content-li">
                        <p>Availability: </p>
                        <p><?php echo esc_html($siteAvailability); ?></p>
                    </li>
                    <li class="popularShoesContent-1-content-li">
                        <p>Type of Site:</p>
                        <p><?php echo esc_html($siteTypeOfSite); ?></p>
                     </li>
                     <li class="popularShoesContent-1-content-li">
                        <p>Comments:</p>
                        <p><?php echo esc_html($siteOther); ?></p>
                     </li>
                </ul>
            </div>


              <?php } 
              
              wp_reset_postdata();
              ?>
                </div>
            </div>
<!-- DRESS SHOE WEBSITE -->
            <div class="popularShoesContent2">
            <div class="popularShoesContent-General2">
                <h2>Dress Shoe Websites</h2>
            </div>
            <div class="popularShoesContent-ipad">     
            <?php
            $site = new WP_Query(array(
                'post_type' => 'sites',
                'posts_per_page' => -1,
                'meta_key' => 'category',
                'meta_value' => 'dress'

              ));
            
              while($site->have_posts()){
                  $site->the_post();
                  $siteImage = get_field('image');
                  $siteName = get_field('name');
                  $siteLink = get_field('link');
                  $siteAvailability = get_field('availability');
                  $siteTypeOfSite = get_field('type_of_site');
                  $siteOther = get_field('other');
                  $siteImageSize = 'thumbnail';
                  $siteImage1 = wp_get_attachment_image_src($siteImage['id'], $siteImageSize);
                     ?>
        
            <div class="popularShoesContent-2">
               <div class="popularShoesContent-2-title">
                    <h4><?php echo esc_html($siteName); ?></h4>
                    <img src="<?php echo esc_url($siteImage1[0]); ?>" alt="hallo">
               </div> 

              
                <ul>
                    <li><a href=<?php echo esc_url($siteLink); ?>>Link</a></li>
                    <li class="popularShoesContent-2-content-li">
                        <p>Availability: </p>
                        <p><?php echo esc_html($siteAvailability); ?></p>
                    </li>
                    <li class="popularShoesContent-2-content-li">
                        <p>Type of Site:</p>
                        <p><?php echo esc_html($siteTypeOfSite); ?></p>
                     </li>
                     <li class="popularShoesContent-2-content-li">
                        <p>Comments:</p>
                        <p><?php echo esc_html($siteOther); ?></p>
                     </li>
                </ul>
            </div>
           



              <?php } 
              
              wp_reset_postdata();
              ?>
            </div>
        </div>

<!-- SPORTS WEBSITE -->

<div class="popularShoesContent3">
            <div class="popularShoesContent-General3">
                <h2>Sport Shoes Websites</h2>
            </div>
            <div class="popularShoesContent-ipad"> 
            <?php
            $site = new WP_Query(array(
                'post_type' => 'sites',
                'posts_per_page' => -1,
                'meta_key' => 'category',
                'meta_value' => 'sports'

              ));
            
              while($site->have_posts()){
                  $site->the_post();
                  $siteImage = get_field('image');
                  $siteName = get_field('name');
                  $siteLink = get_field('link');
                  $siteAvailability = get_field('availability');
                  $siteTypeOfSite = get_field('type_of_site');
                  $siteOther = get_field('other');
                  $siteImageSize = 'thumbnail';
                  $siteImage1 = wp_get_attachment_image_src($siteImage['id'], $siteImageSize);
                     ?>

            <div class="popularShoesContent-3">
               <div class="popularShoesContent-3-title">
                    <h4><?php echo esc_html($siteName); ?></h4>
                    <img src="<?php echo esc_url($siteImage1[0]); ?>" alt="hallo">
               </div> 

              
                <ul>
                    <li><a href=<?php echo esc_url($siteLink); ?>>Link</a></li>
                    <li class="popularShoesContent-3-content-li">
                        <p>Availability: </p>
                        <p><?php echo esc_html($siteAvailability); ?></p>
                    </li>
                    <li class="popularShoesContent-3-content-li">
                        <p>Type of Site:</p>
                        <p><?php echo esc_html($siteTypeOfSite); ?></p>
                     </li>
                     <li class="popularShoesContent-3-content-li">
                        <p>Comments:</p>
                        <p><?php echo esc_html($siteOther); ?></p>
                     </li>
                </ul>
            </div>


              <?php } 
              
              wp_reset_postdata();
              ?>
                </div>
            </div>

<!--  END SPORTS WEBSITE -->


    </div>
</div>
<?php
    get_footer();

?>


  
