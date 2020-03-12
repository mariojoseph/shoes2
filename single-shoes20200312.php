<?php
  get_header();
  ?>

  <?php
  while(have_posts()){
    the_post(); 
    // pageBanner();

  ?>
<body>
  <div class="single-cover">
  
  <div class="single-left">

    <div class="single-left-header">
      <h1>Shoe <strong>Post</strong> </h1>
    </div>

    <div class="single-left-like">

              <?php

            $UserLogged = "no";

            // Checking if user logged in
            
            if(is_user_logged_in()){
              $UserLogged = "yes";
            }
            
              $author = get_current_user_id();

            // $date = "July 12th 2019"; 
            $date = current_time('F jS, Y');
            $week = date('W');
            $year = date('Y');
            $likeCount = new WP_Query(array(
              'post_type' => 'like',
              'meta_query' => array(
                'relation' => 'AND',
                array(
                    'liked-user' => 'liked',
                    'compare' => '=',
                    'value' => $author   
                ),
                array(
                  'key' => 'liked',
                  'compare' => '=',
                  'value' =>  get_the_ID()
              )

              )));
    

              $existStatus ='no';

              $likeCount->the_post();

              $count = $likeCount->found_posts;


                if($likeCount->found_posts){
                  $existStatus = 'yes';
             
                }

                wp_reset_postdata();
              // }
              
           ?>
           
          <span class="like-box" data-like="<?php echo $likeCount->posts[0]->ID;?>" data-shoe="<?php the_ID();?>" data-exists="<?php echo $existStatus;?>" data-user="<?php echo $author ?>" data-logged="<?php echo $UserLogged ?>" data-date="<?php echo $date ?>" data-week="<?php echo $week ?>" data-year="<?php echo $year ?>">
                <div class="like-box-cover">
                <i class="fa fa-heart-o fa-2x" aria-hidden="true"></i>
              <i class="fa fa-heart fa-2x" aria-hidden="true"></i>
                </div>
          </span>      
    
          <script>
                                    console.log(<?= json_encode($year); ?>);
                                </script>
     
    </div>
   
    <h4 class="like-response">Please press Heart to Vote / Unvote</h4>


    <div class="single-left-photo">
      <?php

      $image = get_field('shoePhoto');
      $size = 'full';
      $thumb = $image['sizes'][ $size ];
      $width = $image['sizes'][ $size . '-width' ];
      $height = $image['sizes'][ $size . '-height' ];
       $data = get_the_ID();
      ?>

      <img src="<?php echo $image['url']; ?>" alt="what the" width="<?php echo $width; ?>" height="<?php echo $height; ?>">

    </div>
  </div>
  
      <div class="single-right">

        <div class="single-right-top">

          <h1>Posted by <?php echo get_field(postedBy); ?></h1>
           <span class="metabox__main"></span> 
           <br>
           <span class="single-right-top-date"><?php the_time('F j Y g:i a'); ?></span> 
        </div>
        
        <div class="single-right-top-middle">
        
            <h1 class="single-right-top-middle-button">Bought from</h1>
 
            <a href="<?php echo site_url('/location?variable='.$data) ?>"><button type="button" name="button">Store Location</button></a>
       

          <div class="flex-buttons-commentary">
          <p><?php echo get_field(name); ?>,</p> 
          <p><?php echo get_field(address); ?>,</p>
          <p><?php echo get_field(city); ?>,</p>
          <p><?php echo get_field(country); ?>,</p>                    
          </div>
       
        </div>
        <div class="single-right-bottom-middle">

        <h1 class="single-right-top-middle-button2">Commentary</h1>

        <div class="flex-buttons-commentary2">
        <p><?php echo get_field(commentary); print_r($existStatus); ?></p>
              </div>
        </div>
        <div class="single-right-bottom">

          <span><a href="<?php echo esc_url(site_url('/')); ?>" class="btn  btn--red ">Return to Home</a></span>
        </div>

      </div>
      
  </div>

</body>
  <?php } ?>
 
<?php
  get_footer();

?>

      
    


