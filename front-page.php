<?php get_header();?>

<body>


        <div class="container">

            <div class="grid1">
                <!-- <div class="grid1-image">  -->
                    <div class="grid1-image-case">

   
                    <?php
                         $urlA = print_r(get_site_url());
                    // content from database
                        $posts1 = $wpdb->get_results("
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
                        order by cast(m.meta_value as unsigned) desc
                        ");

                        $pj_likes = $posts1[0]->likes;
                        $pj_likes1 = number_format($pj_likes);
                $pj_image_url = $_SERVER['HTTPS_HOST'] . "/wp-content/uploads/" . $posts1[0]->file_name;
                $pj_image_lurl2 = $_SERVER['HTTPS_HOST'] . "/shoes/" . $posts1[0]->post_name .  "/";			     
                 $pj_image_lurl = $_SERVER['HTTPS_HOST'] . "/shoes/" . $post->post_name .  "/";
                ?>
                <img class="grid1-image-case-sub" src="<?php echo esc_url($pj_image_url); ?>" longdesc=" <?php esc_attr(print_r($longDesc)) ?> "alt="what the" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" alt="shoe1">

                </div>  
                <div class="grid1-title">
		        <h1> Current Winner</h1>
                
                </div>
                <div class="grid1-likeScore">
                <h1> <img src="<?php echo esc_url(get_theme_file_uri('/images/smallHeart.png')); ?>" alt=""> &nbsp <?php print_r($pj_likes1) ; ?></h1>
                <!-- <h1> <img src="<?php echo esc_url(get_theme_file_uri('/images/smallHeart.png')); ?>" alt=""> &nbsp <?php print_r($pj_likes1) ; ?></h1> -->
                </div>
                <!-- </div> -->
                <a href="<?php echo esc_url($pj_image_lurl2) ?>"  ><button id="testing" type="button" name="button">Vote</button></a>   
            </div>

            <div class="grid2">

                 <div class="grid2-image">
                </div> 
            </div>

            <div class="grid3">
                <h1>Runners Up &nbsp &nbsp<i class=" fa fa-caret-down" ></i></h1>
              

                

            </div>
            
            <div class="grid4">

                <div class="grid4-image">

                        <?php
                      
                        $i=1;
			    foreach ($posts1 as $post) {
                        if($i==1){
                            $i++;
                        } else{
                        if($i<8){
                            $i++;
                        $pj_likes = $post->likes;
                        $pj_likes1 = number_format($pj_likes);
                        $pj_unscale = str_replace("-scaled","",$post->file_name);
                        
                     

                        if($urlA == '//localhost:3000')
                        {
                            // $pj_400a = str_replace(".".pathinfo($pj_unscale,1),"-400x400.". pathinfo($pj_unscale,1),$pj_unscale);
                            // $pj_400ab = "2020/10/rachmat-agung-FOm-8f9hntQ-unsplash-400x400.jpg";
                            // $pj_400 = str_replace("." . pathinfo($pj_unscale,'PATHINFO_EXTENSION'),"-400x400." . pathinfo($pj_unscale,'PATHINFO_EXTENSION'),$pj_unscale);
                            // print_r($pj_400);
                            // print_r('jimmy start');
                           
                            // print_r($pj_400ab);
                            // print_r('jimmy start');
                            // $pj_400v4a = substr($pj_unscale,0,-4);
                            // $pj_400v4ext = substr($pj_unscale,-4);
                            // $pj_400 = $pj_400v4a."-400x400".$pj_400v4ext;  

                            $pj_400a = substr($pj_unscale,0,-4);
                            $pj_400b = substr($pj_unscale,-4);
                            $pj_400ab = $pj_400a."-400x400".$pj_400b;           
                        
          
                            $pj_image_url = $_SERVER['HTTP_HOST'] . "/wp-content/uploads/" . $pj_400ab;
                            $pj_image_lurl = $_SERVER['HTTP_HOST'] . "/shoes/" . $post->post_name .  "/";
                        } else {
                            $pj_400 = str_replace("." . pathinfo($pj_unscale,'PATHINFO_EXTENSION'),"-400x400." . pathinfo($pj_unscale,'PATHINFO_EXTENSION'),$pj_unscale);
                            $pj_image_url = $_SERVER['HTTPS_HOST'] . "/wp-content/uploads/" . $pj_400;  
                            $pj_image_lurl = $_SERVER['HTTPS_HOST'] . "/shoes/" . $post->post_name .  "/";
                        }

                        //   For Website
                
                        //   End For Website

                        //   For Local Server
                      // $pj_400v4a = substr($pj_unscale,0,-4);
                      // $pj_400v4ext = substr($pj_unscale,-4);
                      // $pj_400v4comp = $pj_400v4a."-400x400".$pj_400v4ext;           
                      // $pj_image_url4 = $_SERVER['HTTP_HOST'] . "/wp-content/uploads/" . $pj_400v4comp;
      
                      // End for Local Server
      
                   
             
                              ?> 
      
                                 <div class="shellContainer">
                                 <div class="grid4-likeScore">
       
                                 <h1> <img class= "likeImage" src="<?php echo get_theme_file_uri('/images/smallHeart.png'); ?>" alt=""> &nbsp <?php print_r(esc_attr($pj_likes1)) ; ?></h1>
         
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
                            }
                        }
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
                    <li><p> Press &nbsp<a href="<?php echo esc_url(site_url('post-your-shoes')); ?>" ><i class="fa fa-camera fa-lg" style="color: rgb(244,232,23); width: 2rem;"></i></a>to POST your favorite shoes and see if you can be the Current Winner</p> AND </li>
                    <li><p> VOTE &nbsp for your favorite shoes (See all the contenders above and below !!!) </p></li>
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
        <h1>All Contestants &nbsp &nbsp<i class=" fa fa-caret-down" ></i></h1>
            </div>

    </div>



    
        <div class="thumbnails">
    
            <div class="imgs">
            
                    <?php

                    // content from database
                        
                   $ind = 1;     
                    //processing
		       foreach ($posts1 as $post) {
                 if($ind < 1){
                     $ind++;
                 } else{

                  $pj_likes = $post->likes;
                  $pj_likes1 = number_format($pj_likes);
			      $pj_unscale = str_replace("-scaled","",$post->file_name);

                  if($urlA == '//localhost:3000')
                  {
                    $pj_400a = substr($pj_unscale,0,-4);
                    $pj_400b = substr($pj_unscale,-4);
                    $pj_400ab = $pj_400a."-400x400".$pj_400b;           
                
    
                    $pj_image_url = $_SERVER['HTTP_HOST'] . "/wp-content/uploads/" . $pj_400ab;
                    $pj_image_lurl = $_SERVER['HTTP_HOST'] . "/shoes/" . $post->post_name .  "/";

                  } else{

                    $pj_400 = str_replace("." . pathinfo($pj_unscale,'PATHINFO_EXTENSION'),"-400x400." . pathinfo($pj_unscale,'PATHINFO_EXTENSION'),$pj_unscale);
                    $pj_image_url = $_SERVER['HTTPS_HOST'] . "/wp-content/uploads/" . $pj_400;
                    $pj_image_lurl = $_SERVER['HTTPS_HOST'] . "/shoes/" . $post->post_name .  "/";
                    
                    print_r('cruddy');
                    print_r($pj_image_url);
                    print_r($pj_image_lurl);
                  }


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
                                    <i class="like-boxF-inner-side-o fa fa-heart-o fa-x" aria-hidden="true"></i>
                                    <i class="like-boxF-inner-side fa fa-heart fa-x" aria-hidden="true"></i>
                                    <span class="like-countF"><?php esc_attr(print_r($pj_likes1)) ?></span>
                  
                                </span>

                                </div>
                                <div class="thumbnails-container">
                                     <a href='<?php echo esc_url($pj_image_lurl) ;?> '><button>Vote</button> </a>  
                                </div>

                            </div>                
                            <script>
                           
                            </script>
                                
                            <?php
                                             }
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
