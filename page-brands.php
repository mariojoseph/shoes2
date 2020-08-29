<?php
    get_header();

   
      
    // while(have_posts()){
    //     the_post(); 
    
    ?>

<body>
    
<div class="brands-grid">

    <div class="brands-grid-header">
                <h1>Brands</h1>

                <div class="brands-grid-header-btn">
                <i class="fa fa-home" style="color: yellow;" aria-hidden="true" alt="mario"></i><a href="<?php echo esc_url(site_url(' ')); ?>" class="removeHyphen">&nbsp Home</a>
                </div>
    </div>

    <div class="brands-grid-middle">
         
        <div class="brands-grid-middle1">
            <p class="brands-grid-middle1-p1">This page is to help you decide on what type of brands you would like to buy and to open your mind to the extraordinary development of shoes since its creation.</p>
            <p class="brands-grid-middle1-p2">Click on each photo to find more information</p>  
        </div>
        <div class="brands-grid-middle2">
            <label for=""><p>Ladies Shoes</p></label>
            <div class="brands-thumbnails2">
                <div class="brands-imgs2">
                
            <?php 
            
            
            $brand = new WP_Query(array(
                'post_type' => 'brands',
                'posts_per_page' => -1,
                'meta_key' => 'brandcategory',
                'meta_value' => 'ladies'

              ));
            
              while($brand->have_posts()){
                  $brand->the_post();
                  $brandImage = get_field('brandphoto');
                  $brandImageSize = 'thumbnail';
                  $brandImage1 = wp_get_attachment_image_src($brandImage['id'], $brandImageSize);
                     ?>
                                <div class="brands-thumbnails-slider">
                                    <a href="<?php echo esc_url(the_permalink()); ?>">  <img class="brands-thumbnails-slider-img" src="<?php echo $brandImage1[0]; ?>" alt="shoe1"></a>
                                    <div class="brands-thumbnails-slider-like">
                                        
                                    <span class="like-boxF" data-exists="<?php print_r($existStatusF) ?>">
                                        <a href="<?php echo esc_url(the_permalink()); ?>"><p><?php the_title(); ?></p></a>
                                    </span>

                                    </div>
                                </div>

             <?php                       
              }
            ?>

                 <?php wp_reset_postdata(); ?>                          
                </div>

            </div>
        </div>
        <div class="brands-grid-middle3">
        <label for=""><p>Men's Shoes</p></label>
        <div class="brands-thumbnails3">
                <div class="brands-imgs3">
                
            <?php 
            
            
            $brand = new WP_Query(array(
                'post_type' => 'brands',
                'posts_per_page' => -1,
                'meta_key' => 'brandcategory',
                'meta_value' => 'mens'

              ));
            
              while($brand->have_posts()){
                  $brand->the_post();
                  $brandImage = get_field('brandphoto');
                  $brandImageSize = 'thumbnail';
                  $brandImage1 = wp_get_attachment_image_src($brandImage['id'], $brandImageSize);
                     ?>
                                <div class="brands-thumbnails-slider">
                                    <a href="<?php echo esc_url(the_permalink()); ?>">  <img class="brands-thumbnails-slider-img" src="<?php echo $brandImage1[0]; ?>" alt="shoe1"></a>
                                    <div class="brands-thumbnails-slider-like">
                                        
                                    <span class="like-boxF" data-exists="<?php print_r($existStatusF) ?>">
                                    <a href="<?php echo esc_url(the_permalink()); ?>"><p><?php the_title(); ?></p></a>
                                    </span>

                                    </div>
                                </div>

             <?php                       
              }
            ?>

                 <?php wp_reset_postdata(); ?>                          
                </div>

            </div>
        </div>
        <div class="brands-grid-middle4">
        <label for=""><p>Sports Shoes</p></label>
        <div class="brands-thumbnails4">
                <div class="brands-imgs4">
                
            <?php 
            
            
            $brand = new WP_Query(array(
                'post_type' => 'brands',
                'posts_per_page' => -1,
                'meta_key' => 'brandcategory',
                'meta_value' => 'sports'

              ));
            
              while($brand->have_posts()){
                  $brand->the_post();
                  $brandImage = get_field('brandphoto');
                  $brandImageSize = 'thumbnail';
                  $brandImage1 = wp_get_attachment_image_src($brandImage['id'], $brandImageSize);
                     ?>
                                <div class="brands-thumbnails-slider">
                                    <a href="<?php echo esc_url(the_permalink()); ?>">  <img class="brands-thumbnails-slider-img" src="<?php echo $brandImage1[0]; ?>" alt="shoe1"></a>
                                    <div class="brands-thumbnails-slider-like">
                                        
                                    <span class="like-boxF" data-exists="<?php print_r($existStatusF) ?>">
                                    <a href="<?php echo esc_url(the_permalink()); ?>"><p><?php the_title(); ?></p></a>
                                    </span>

                                    </div>
                                </div>

             <?php                       
              }
            ?>

                 <?php wp_reset_postdata(); ?>                          
                </div>

            </div>
        </div>

    </div>  
   
</div>

</body>

    <?php 
    // }
    
    get_footer();

?>