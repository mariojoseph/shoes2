<?php
    get_header();

   
      
    // while(have_posts()){
    //     the_post(); 
    
    ?>

<body>
    
<div class="past-winners-grid">

    <div class="past-winners-grid-header">
                <h1>Brands</h1>

                <div class="past-winners-grid-header-btn">
                <i class="fa fa-home" style="color: yellow;" aria-hidden="true" alt="mario"></i><a href="<?php echo esc_url(site_url(' ')); ?>" class="removeHyphen">&nbsp Home</a>
                </div>
    </div>

    <div class="past-winners-grid-middle">
         
        <div class="">
            <?php
                    // content from database
                        $brands = new WP_Query(array(
                                    'post_type' => 'brands',
                                    'posts_per_page' => 7

                        ));

                        while($brands->have_posts()) {
                            $brands->the_post(); 
                       
                           ?>

                        <div class="shellContainer">

                            <h2 class="brands-post-title"><?php the_title(); ?></h2>
                            <h4>Posted on <?php the_time('M j Y');?></h4>
                            <h2 class="brands-post-content"><?php the_excerpt();?><p><a class="btn" href="<?php the_permalink() ?>">Continue Reading &raquo;</a></p></h2>
 
                        <a href="<?php the_permalink(); ?>"  ><button id="testing" type="button" name="button">View</button></a>   
                            </div> 
                            <?php
                        }
                        ?>

                 <?php wp_reset_postdata(); ?>
  
        </div>

    </div>  
   
</div>

</body>

    <?php 
    // }
    
    get_footer();

?>