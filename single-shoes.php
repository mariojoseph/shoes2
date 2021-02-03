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
              $image = get_the_ID();
              
              $alreadyPosted = 'no';
              $existStatus = 'no';
            $week = date('W');
            $year = date('Y');
            $date = current_time('F jS, Y');

            $likeCount = new WP_Query(array(
              'post_type' => 'like',
              'posts_per_page' => -1,
              'meta_query' => array(
                array(
                  'liked-user' =>'liked',
                  'compare' => '=',
                  'value' => $author
                )
              )));

              while($likeCount->have_posts()) {
                  $likeCount->the_post();

                  $userWeek = get_field('liked-week');
                  $userYear = get_field('liked-year');
                  if(($userWeek == $week) && ($userYear == $year)){
                    $alreadyPosted = 'yes';
                  };

                  $liked = get_field('liked');
                  
                  if(($liked == $image ) && ($alreadyPosted == 'yes')){
                      $existStatus = 'yes';
                  }

                }



                wp_reset_postdata();
              // }
              
           ?>
           
          <span class="like-box" data-like="<?php echo esc_attr($likeCount->posts[0]->ID);?>" data-shoePost1="<?php the_permalink();?>" data-shoe="<?php the_ID();?>" data-exists="<?php echo esc_attr($existStatus);?>" data-user="<?php echo esc_attr($author) ?>" data-logged="<?php echo esc_attr($UserLogged) ?>" data-posted="<?php echo esc_attr($alreadyPosted)  ?>" data-date="<?php echo esc_attr($date)  ?>" data-week="<?php echo esc_attr($week)?>" data-year="<?php echo esc_attr($year)  ?>">
              <div class="like-box-inner">
              <i class="fa like-box-inner-side fa-heart-o fa-2x" aria-hidden="true"></i>
              <i class="fa like-box-inner-side fa-heart fa-2x" aria-hidden="true"></i>
              </div>
              </span>
    
     
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

      <img src="<?php echo esc_url($image['url']); ?>" alt="what the" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>">

    </div>
  </div>
  
      <div class="single-right">

        <div class="single-right-top">

          <h1>Posted by <?php echo esc_html(get_field(postedBy)); ?></h1>
           <span class="metabox__main"></span> 
           <br>
           <!-- <span class="single-right-top-date"><?php the_time('F j Y g:i a'); ?></span>  -->
        </div>
        
        <div class="single-right-top-middle">
        
        <div class="single-right-top-middle-case">
            <h1 class="single-right-top-middle-button">Bought From</h1>
            <a href="<?php echo esc_url(site_url('/location?variable='.$data)) ?>"><button type="button" name="button">Store Location</button></a>
        </div>

          <div class="flex-buttons-commentary">
          <p><?php echo esc_html(get_field(name)); ?>,</p> 
          <p><?php echo esc_html(get_field(address)); ?>,</p>
          <p><?php echo esc_html(get_field(city)); ?>,</p>
          <p><?php echo esc_html(get_field(country)); ?>,</p>                    
          </div>
          <hr style="margin-top: 2rem; background-color: rgb(74,126,187); border: none; width: 80%; height: 1px">
        </div>

     

        <div class="single-right-bottom-middle">

        <h1 class="single-right-top-middle-button2">Commentary</h1>

        <div class="flex-buttons-commentary2">
        <p><?php echo esc_html(get_field(commentary)); print_r(esc_html($existStatus)); ?></p>
              </div>
        </div>
        <div class="single-right-bottom">
            <div class="singleShoeButton">
                        <i class="fa fa-home" style="color: yellow;" aria-hidden="true" alt="mario"></i><a href="<?php echo esc_url(site_url(' ')); ?>" class="removeHyphen">&nbsp Home</a>
                            
            </div>
        
        </div>

      </div>
      
  </div>
  <section class="singleshoes-comments-color">
<div class="comment-section" style="height: auto;">
    <?php
        if(comments_open() || '0' != get_comments_number()) :comments_template();
        endif; 
    ?>

</div>

</section>
</body>
  <?php } ?>
 
<?php
  get_footer();

?>

      
    


