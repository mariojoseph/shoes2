<?php get_header();?>

<body>


        <div class="container">

            <div class="grid1">
                <!-- <div class="grid1-image">  -->
                    <div class="grid1-image-case">

   
                    <?php
                    // content from database
                        //$posts = $wpdb->get_results("SELECT ID, post_title FROM $wpdb->posts WHERE  post_type='pastwinners' ORDER BY comment_count DESC LIMIT 0,4");
                        $posts = $wpdb->get_results("
                        SELECT m.post_id,
                        p.post_name,
                        m.meta_value likes,
                        (select meta_value from wp_postmeta where meta_key = '_wp_attached_file' and post_id = m2.meta_value) as file_name
                        FROM 
                          wp_posts p,wp_postmeta as m  
                          left join wp_postmeta as m2 on (m.post_id = m2.post_id and m2.meta_key = 'ShoePhoto')
                        WHERE p.post_type = 'shoes'
                          and p.id = m.post_id
                          and m.meta_key  = 'number_of_likes'
                          and p.post_status = 'publish'
                        order by cast(m.meta_value as unsigned) desc limit 1
                        ");

                        $pj_likes = $posts[0]->likes;
			    $pj_image_url = $_SERVER['HTTP_HOST'] . "/wp-content/uploads/" . $posts[0]->file_name;
                ?>
                <img class="grid1-image-case-sub" src="<?php echo esc_url($pj_image_url); ?>" longdesc=" <?php esc_attr(print_r($longDesc)) ?> "alt="what the" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" alt="shoe1">

                </div>  
                <div class="grid1-title">
		<h1> Current Winner</h1>
                
                </div>
                <div class="grid1-likeScore">
                <h1> <img src="<?php echo esc_url(get_theme_file_uri('/images/smallHeart.png')); ?>" alt=""> &nbsp <?php print_r($pj_likes) ; ?></h1>
                <!-- <h1> <img src="<?php echo esc_url(get_theme_file_uri('/images/smallHeart.png')); ?>" alt=""> &nbsp <?php print_r($pj_likes) ; ?></h1> -->
                </div>
                <!-- </div> -->

            </div>

            <div class="grid2">

                 <div class="grid2-image">
                </div> 
            </div>

            <div class="grid3">
                <h1>Runners Up  <i class=" fa fa-caret-down" ></i></h1>
              

                

            </div>
            
            <div class="grid4">

                <div class="grid4-image">

                        <?php
                        $postss = $wpdb->get_results("
                           SELECT m.post_id,
                           p.post_name,
                           m.meta_value likes,
                           (select meta_value from wp_postmeta where meta_key = '_wp_attached_file' and post_id = m2.meta_value) as file_name
                           FROM 
                             wp_posts p,wp_postmeta as m  
                             left join wp_postmeta as m2 on (m.post_id = m2.post_id and m2.meta_key = 'ShoePhoto')
                           WHERE p.post_type = 'shoes'
                             and p.id = m.post_id
                             and m.meta_key  = 'number_of_likes'
                             and p.post_status = 'publish'
                           order by cast(m.meta_value as unsigned) desc limit 7
			   ")
			    ;
			    foreach ($postss as $post) {
                              $pj_likes = $post->likes;
                  $pj_unscale = str_replace("-scaled","",$post->file_name);
                  

                  //   For Website
                  $pj_400 = str_replace("." . pathinfo($pj_unscale,'PATHINFO_EXTENSION'),"-400x400." . pathinfo($pj_unscale,'PATHINFO_EXTENSION'),$pj_unscale);
			      $pj_image_url = $_SERVER['HTTP_HOST'] . "/wp-content/uploads/" . $pj_400;                  
                  //   End For Website
                
                
                  //   For Local Server
                // $pj_400v4a = substr($pj_unscale,0,-4);
                // $pj_400v4ext = substr($pj_unscale,-4);
                // $pj_400v4comp = $pj_400v4a."-400x400".$pj_400v4ext;           
                // $pj_image_url4 = $_SERVER['HTTP_HOST'] . "/wp-content/uploads/" . $pj_400v4comp;

                // End for Local Server

			      $pj_image_lurl = $_SERVER['HTTP_HOST'] . "/shoes/" . $post->post_name .  "/";
       
                        ?> 

                           <div class="shellContainer">
                           <div class="grid4-likeScore">
 
                           <h1> <img class= "likeImage" src="<?php echo get_theme_file_uri('/images/smallHeart.png'); ?>" alt=""> &nbsp <?php print_r(esc_attr($pj_likes)) ; ?></h1>
   
                            </div>                                
                <!-- For Website  -->
                           <img class="photoImages" src="<?php echo( esc_url($pj_image_url) ); ?>" alt="shoe1">
               <!-- End for Website  --> 
 
                 <!-- For Local Server  -->
                 <!-- <img class="photoImages" src="<?php // echo( esc_url($pj_image_url4) ); ?>" alt="shoe1"> -->
               <!-- End for Local Server  --> 

                            <a href="<?php echo esc_url($pj_image_lurl) ?>"  ><button id="testing" type="button" name="button">Vote</button></a>   
                            </div>       
                            <?php
   
                        } ?>

                </div>

        </div>

        <div class="grid5">
            <div class="grid5-title">
                <h1> Site Rules</h1>
         
            </div> 
            <div class="grid5-content">          
                <ul>
                    <li>The Rules are to have Fun !!!</li>
                    <li><p> <u>VOTE</u>&nbsp for your favorite shoes of the week (See this week's contenders below !!!) </p> AND</li>
                    <li><p> <u>POST</u> your favorite shoes </p> and maybe win the prize of "SHOES OF THE WEEK" !!!</li>
                </ul>
    
                <div class="grid5-button">
            <div class="grid5-button-case"><i class="fa fa-heartbeat" aria-hidden="true" style="color: #E75480;"></i><a href="<?php echo esc_url(site_url('rules')); ?>" class="removeHyphen">&nbsp Rules</a></div>
            </div>
  
            </div>
        </div>                

        <div class="grid6">
            <div class="grid6-title">
                <h1> Shoes Blog</h1>
            </div> 
            <div class="grid6-content">
                <div class="grid6-text">
                    <ul>
                        <li>Read about everything related to shoes, including latest Shoe trends</li>
                        <li>See our tips on what shoes goes with what clothes, where to get the best discounts and lots more</li>
                    </ul>
                    <div class="grid6-content-image"></div>
                </div>
                <div class="grid6-button">
                <div class="grid6-button-case"><i class="fa fa-bold" aria-hidden="true" style="color: #F5DEB3;"></i><a href="<?php echo esc_url(site_url('blog')); ?>" class="removeHyphen">&nbsp Shoes Blog</a></div>
                </div>
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

                        $postsd = $wpdb->get_results("
                            SELECT m.post_id,
                              p.post_name,
                              m.meta_value likes,
                              (select meta_value from wp_postmeta where meta_key = '_wp_attached_file' and post_id = m2.meta_value) as file_name
                            FROM 
                              wp_posts p,wp_postmeta as m  
                              left join wp_postmeta as m2 on (m.post_id = m2.post_id and m2.meta_key = 'ShoePhoto')
                            WHERE p.post_type = 'shoes'
                              and p.id = m.post_id
                              and m.meta_key  = 'number_of_likes'
                              and p.post_status = 'publish'
                             order by cast(m.meta_value as unsigned) desc limit 100 OFFSET 5

                        ");
                        

                    //processing
		       foreach ($postsd as $post) {
                              $pj_likes = $post->likes;
			      $pj_unscale = str_replace("-scaled","",$post->file_name);
			      $pj_400 = str_replace("." . pathinfo($pj_unscale,'PATHINFO_EXTENSION'),"-400x400." . pathinfo($pj_unscale,'PATHINFO_EXTENSION'),$pj_unscale);
			      $pj_image_url = $_SERVER['HTTP_HOST'] . "/wp-content/uploads/" . $pj_400;
			      $pj_image_lurl = $_SERVER['HTTP_HOST'] . "/shoes/" . $post->post_name .  "/";
			      $width="400";
                              $height="400";
                       
                            settype($pj_likes, "integer");
                            if($pj_likes === 0){
                                $existStatusF = 'no';
                            }else{
                                $existStatusF = 'yes';
                            }
                            
                            ?>
                      

                            <div class="thumbnails-slider">
                            <img class="thumbnails-slider-img" src="<?php echo esc_url($pj_image_url); ?>" longdesc=" <?php  print_r(esc_attr($pj_image_lurl)) ?> "alt="what the" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" alt="shoe1">
                                <div class="thumbnails-slider-like">
                                     
                                <span class="like-boxF" data-exists="<?php esc_attr(print_r($existStatusF)) ?>">
                                    <i class="fa fa-heart-o fa-2x" aria-hidden="true"></i>
                                    <i class="fa fa-heart fa-2x" aria-hidden="true"></i>
                                    <span class="like-countF"><?php esc_attr(print_r($pj_likes)) ?></span>
                  
                                </span>

                                </div>
                                <div class="thumbnails-container">
                                     <a href="<?php echo esc_url($pj_image_lurl) ;?>"><button>Vote</button> </a>  
                                </div>

                            </div>                
        
                                
                            <?php
                         }
                    ?>
                        
            </div>



        </div>
  
            <div class="front-page-modal">
                <div class="main-img">
                <a href="#portfolio" class="close"></a>
                <img src=<?php echo esc_url(get_theme_file_uri('/images/frontPagePik2.png')) ?> alt="" id="current">
                <button class="image-button">Vote</button>
                </div>
            </div>



</body>
  
<?php get_footer();?>
