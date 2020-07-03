<?php get_header();?>

<body>


        <div class="container">

            <div class="grid1">
                <!-- <div class="grid1-image">  -->
                    <div class="grid1-image-case">

                    <?php
                    // content from database

                        $lastWinner = new WP_Query(array(
                                    'post_type' => 'pastwinners',
                                    'posts_per_page' => -1,
                                    'meta_key' => 'winner_of_the_week',
                                    'orderby' => 'meta_value_num',
                                    'order' => 'ASC'

                        ));

                        while($lastWinner->have_posts()) {
                            $lastWinner->the_post(); 
                            $imageWinner = get_field('shoePhoto');
                            $imageWinnerLikes = get_field('number_of_likes');
                            $size = "full";
                            $imageWinner1 = wp_get_attachment_image_src($imageWinner['id'], $size);
                        }
                ?>
                
                <img class="grid1-image-case-sub" src="<?php echo $imageWinner1[0]; ?>" longdesc=" <?php  print_r($longDesc) ?> "alt="what the" width="<?php echo $width; ?>" height="<?php echo $height; ?>" alt="shoe1">

                <?php wp_reset_postdata(); ?>

                </div>  
                <div class="grid1-title">
                <h1> Shoes of Last Week</h1>
                
                </div>
                <div class="grid1-likeScore">
                <h1> <img src="<?php echo get_theme_file_uri('/images/smallHeart.png'); ?>" alt=""> &nbsp <?php print_r($imageWinnerLikes) ; ?></h1>
                </div>
                <!-- </div> -->

                <script>
                    // console.log(<?= json_encode($imageWinnerLikes); ?>);
                </script>
            </div>

            <div class="grid2">

                 <div class="grid2-image">
                </div> 
            </div>

            <div class="grid3">
                <h1>This week's TOP Contenders  <i class=" fa fa-caret-down" ></i></h1>
              

                

            </div>
            
            <div class="grid4">

                <div class="grid4-image">

                        <?php
                            $BestShoes = new WP_Query(array(
                                    'post_type' => 'shoes',
                                    'posts_per_page' => 7,
                                    'meta_key' => 'number_of_likes',
                                    'orderby' => 'meta_value_num',
                                    'order' => 'DESC'
                            ));

                            
                            while($BestShoes->have_posts()) {
                                $BestShoes->the_post(); 
                                $imageBestShoes = get_field('shoePhoto');
                                $likesBestShoes = get_field('number_of_likes');
                                // $size1 = "full";
                                $size1 = "Slider";
                                // $size1 = "frontPageSlider2";
                                $imageBestShoes1 = wp_get_attachment_image_src($imageBestShoes['id'], $size1);
                                $longDesc =  get_permalink();
       
                        ?> 

                           <div class="shellContainer">
                           <div class="grid4-likeScore">
                           <h1> <img class= "likeImage" src="<?php echo get_theme_file_uri('/images/smallHeart.png'); ?>" alt=""> &nbsp <?php print_r($likesBestShoes) ; ?></h1>
                            </div>                                
            
                           <img class="photoImages" src="<?php echo($imageBestShoes1[0] ); ?>" alt="shoe1">
                            <a href="<?php echo $longDesc ?>"  ><button id="testing" type="button" name="button">Vote</button></a>   
                            </div>       
                            <?php
   
                        } ?>

                        <?php wp_reset_postdata(); ?>
                </div>

        </div>

        <div class="grid5">
            <div class="grid5-title">
                <h1> Rules</h1>
                <div class="grid5-button-case"><i class="fa fa-heartbeat" aria-hidden="true" style="color: #E75480;"></i><a href="<?php echo esc_url(site_url('rules')); ?>" class="removeHyphen">&nbsp More Details</a></div>
         
            </div> 
            <div class="grid5-content">
                <ul>
                    <li>The Rules are to have Fun !!!</li>
                    <li><p> <u>VOTE</u>&nbsp for your favorite shoes of the week (See this week's contenders below !!!) </p> AND</li>
                    <li><p> <u>POST</u> your favorite shoes </p> and maybe win the prize of "SHOES OF THE WEEK" and soon we will be giving prizes for the winners !!!</li>
                </ul>
            </div>
        </div>                

        <div class="grid6">
            <div class="grid6-title">
                <h1> Shoes Blog</h1>
                <div class="grid6-button-case"><i class="fa fa-newspaper-o" aria-hidden="true" style="color: #F5DEB3;"></i><a href="<?php echo esc_url(site_url('blog')); ?>" class="removeHyphen">&nbsp Shoes Blog</a></div>
         
            </div> 
            <div class="grid6-content">
                <ul>
                    <li>Please visit our Blog where we will tell you weekly the latest trends on Shoes</li>
                    <li>We'll also give advice on what shoes goes with what clothes, where to get the best discounts and lots more</li>
                </ul>
                <div class="grid6-content-image"></div>
            </div>
        </div>                

        <div class="grid7">
        <h1>This week's Contenders <i class=" fa fa-caret-down" ></i></h1>
            </div>

    </div>



    
        <div class="thumbnails">
    
            <div class="imgs">
            
                    <?php

                    // content from database

                        $userNotes = new WP_Query(array(
                            'post_type' => 'shoes',
                            'posts_per_page' => -1,
                            'meta_key' => 'number_of_likes',
                            'orderby' => 'meta_value_num',
                            'order' => 'DESC'
                            // 'author' => get_current_user_id()
                        ));
                        
                        $counter = 1;

                    //processing
                       
                        while($userNotes->have_posts()) {
                            $userNotes->the_post(); 
                            if($counter <= 5){
                                $counter++;
                                continue;
                            } 
                            else{
                            $counter++;
                          
                            $image = get_field('shoePhoto');
                            $imageLike = get_field('number_of_likes');
                            // $size = "frontPageSlider2";
                            $size = "Slider";
                            $longDescThumb =  get_permalink();
                            $image1 = wp_get_attachment_image_src($image['id'], $size);
                            $thumb = $image['sizes'][ $size ];
                            // $width = $image['sizes'][ $size . '-width' ];
                            // $height = $image['sizes'][ $size . '-height' ];
                            $width = $image['sizes'][ $size . '-width'];
                            $height = $image['sizes'][ $size . '-height'];

                            // while($likeCount->have_posts()){
                            //     $count = $likeCount->the_post();
                                
                            // }
                       
                            $longDesc =  get_permalink();

                            // content for like
                            $IDforCount = get_the_ID();

                            // $likeCount = new WP_Query(array(
                            //     'post_type' => 'like',
                            //     'meta_query' => array(
                            //       array(
                            //           'key' => 'liked',
                            //           'compare' => '=',
                            //           'value' =>  $IDforCount 
                            //       )
                            //     )));
                            
                            // $likeCount->the_post();

                            // $count = $likeCount->found_posts;
                            settype($imageLike, "integer");
                            if($imageLike === 0){
                                $existStatusF = 'no';
                            }else{
                                $existStatusF = 'yes';
                            }
                            
                            ?>
                      

                            <div class="thumbnails-slider">
                            <img class="thumbnails-slider-img" src="<?php echo $image1[0]; ?>" longdesc=" <?php  print_r($longDesc) ?> "alt="what the" width="<?php echo $width; ?>" height="<?php echo $height; ?>" alt="shoe1">
                                <div class="thumbnails-slider-like">
                                     
                                <span class="like-boxF" data-exists="<?php print_r($existStatusF) ?>">
                                    <i class="fa fa-heart-o fa-2x" aria-hidden="true"></i>
                                    <i class="fa fa-heart fa-2x" aria-hidden="true"></i>
                                    <span class="like-countF"><?php print_r($imageLike) ?></span>
                  
                                </span>

                                </div>
                                <div class="thumbnails-container">
                                     <a href="<?php echo $longDescThumb ;?>"><button>Vote</button> </a>  
                                </div>

                            </div>                
        
                                
                        <?php wp_reset_postdata();} }
                    ?>

            <script>
                                    console.log(<?php json_encode($existStatusF); ?>);
                                    console.log(<?php json_encode($counter); ?>);
            </script>                            
            </div>



        </div>
  
            <div class="front-page-modal">
                <div class="main-img">
                <a href="#portfolio" class="close"></a>
                <img src=<?php echo get_theme_file_uri('/images/frontPagePik2.png') ?> alt="" id="current">
                <button class="image-button">Vote</button>
                </div>
            </div>



</body>
  
<?php get_footer();?>