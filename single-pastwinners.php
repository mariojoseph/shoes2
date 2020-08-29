<?php
  get_header();
  ?>

  <?php
  while(have_posts()){
    the_post(); 
    // pageBanner();

  ?>
<body>
  <div class="singleP-cover">
  
  <div class="singleP-left">

    <div class="singleP-left-header">
      <h1>Shoe <strong>Post</strong> </h1>
    </div>

  
    <div class="singleP-left-photo">
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
  
      <div class="singleP-right">

        <div class="singleP-right-top">

          <h1>Posted by <?php echo get_field(postedBy); ?></h1>
           <span class="metabox__main"></span> 
           <br>
           <span class="singleP-right-top-date"><?php the_time('F j Y g:i a'); ?></span> 
        </div>
        
        <div class="singleP-right-top-middle">
        
        <div class="singleP-right-top-middle-case">
            <h1 class="singleP-right-top-middle-button">Bought From</h1>
            <a href="<?php echo esc_url(site_url('/location?variable='.$data)) ?>"><button type="button" name="button">Store Location</button></a>
        </div>

          <div class="flex-buttons-commentary">
          <p><?php echo get_field(name); ?>,</p> 
          <p><?php echo get_field(address); ?>,</p>
          <p><?php echo get_field(city); ?>,</p>
          <p><?php echo get_field(country); ?>,</p>                    
          </div>
          <hr style="margin-top: 2rem; background-color: rgb(74,126,187); border: none; width: 80%; height: 1px">
        </div>

     

        <div class="singleP-right-bottom-middle">

        <h1 class="singleP-right-top-middle-button2">Commentary</h1>

        <div class="flex-buttons-commentary2">
        <p><?php echo get_field(commentary); print_r($existStatus); ?></p>
              </div>
        </div>
        <div class="singleP-right-bottom">
            <div class="singlePShoeButton">
                        <i class="fa fa-trophy" style="color: gold;" aria-hidden="true" alt="mario"></i><a href="<?php echo esc_url(site_url('/past-winners ')); ?>" class="removeHyphen">&nbsp Back</a>
                    
            </div>
      
        </div>

      </div>
      
  </div>

  <section class="past-winners-comments-color">
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

      
    


