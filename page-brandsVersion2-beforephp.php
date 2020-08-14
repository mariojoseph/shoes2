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
            <div class="brands-thumbnails">
                <div class="brands-imgs">
                

                                <div class="brands-thumbnails-slider">
                                <img class="brands-thumbnails-slider-img" src="<?php echo get_theme_file_uri('/images/frontPagePik1.png'); ?>" longdesc=" <?php  print_r($longDesc) ?> "alt="what the" width="<?php echo $width; ?>" height="<?php echo $height; ?>" alt="shoe1">
                                    <div class="brands-thumbnails-slider-like">
                                        
                                    <span class="like-boxF" data-exists="<?php print_r($existStatusF) ?>">
                                        <p>High Heels</p>
                                    </span>

                                    </div>
                                </div>
                                <div class="brands-thumbnails-slider">
                                <img class="brands-thumbnails-slider-img" src="<?php echo get_theme_file_uri('/images/frontPagePik2.png'); ?>" longdesc=" <?php  print_r($longDesc) ?> "alt="what the" width="<?php echo $width; ?>" height="<?php echo $height; ?>" alt="shoe1">
                                    <div class="brands-thumbnails-slider-like">
                                        
                                    <span class="like-boxF" data-exists="<?php print_r($existStatusF) ?>">
                                        <p>High Heels</p>
                                    </span>

                                    </div>
                                </div>
                                <div class="brands-thumbnails-slider">
                                <img class="brands-thumbnails-slider-img" src="<?php echo get_theme_file_uri('/images/frontPagePik4.png'); ?>" longdesc=" <?php  print_r($longDesc) ?> "alt="what the" width="<?php echo $width; ?>" height="<?php echo $height; ?>" alt="shoe1">
                                    <div class="brands-thumbnails-slider-like">
                                        
                                    <span class="like-boxF" data-exists="<?php print_r($existStatusF) ?>">
                                        <p>High Heels</p>
                                    </span>

                                    </div>
                                </div>
                                <div class="brands-thumbnails-slider">
                                <img class="brands-thumbnails-slider-img" src="<?php echo get_theme_file_uri('/images/frontPagePik5.png'); ?>" longdesc=" <?php  print_r($longDesc) ?> "alt="what the" width="<?php echo $width; ?>" height="<?php echo $height; ?>" alt="shoe1">
                                    <div class="brands-thumbnails-slider-like">
                                        
                                    <span class="like-boxF" data-exists="<?php print_r($existStatusF) ?>">
                                        <p>High Heels</p>
                                    </span>

                                    </div>
                                </div>                             
                                
                                <div class="brands-thumbnails-slider">
                                <img class="brands-thumbnails-slider-img" src="<?php echo get_theme_file_uri('/images/frontPagePik5.png'); ?>" longdesc=" <?php  print_r($longDesc) ?> "alt="what the" width="<?php echo $width; ?>" height="<?php echo $height; ?>" alt="shoe1">
                                    <div class="brands-thumbnails-slider-like">
                                        
                                    <span class="like-boxF" data-exists="<?php print_r($existStatusF) ?>">
                                        <p>High Heels</p>
                                    </span>

                                    </div>
                                </div>  



  
            

                <script>
                                        console.log(<?php json_encode($existStatusF); ?>);
                                        console.log(<?php json_encode($counter); ?>);
                </script>                            
                </div>

            </div>
        </div>
        <div class="brands-grid-middle3">
        <label for="">Men's Shoes</label>
        </div>
        <div class="brands-grid-middle4">
        <label for="">Sports Shoes</label>
        </div>

    </div>  
   
</div>

</body>

    <?php 
    // }
    
    get_footer();

?>