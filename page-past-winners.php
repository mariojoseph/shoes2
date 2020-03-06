<?php
    get_header();

   
      
    // while(have_posts()){
    //     the_post(); 
    
    ?>

<body>
    
<div class="past-winners-grid">

    <div class="past-winners-grid-header">
                <h1>Past Shoe Winners</h1>

                <div class="past-winners-grid-header-btn">
                <a href="<?php echo esc_url(site_url('/')); ?>" class="btn  btn--red">Return to Home</a>    
                </div>
                
        
    </div>

    <div class="past-winners-grid-middle">
         
        <ul class="dot-class">
            <li class="baby"></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>

        <div class="hero-sliderP-container">

            <div class="hero-sliderP">
 
            <?php
                    // content from database

                        $pastWinner = new WP_Query(array(
                                    'post_type' => 'pastwinners',
                                    'posts_per_page' => 7,
                                    'meta_key' => 'winner_of_the_week',
                                    'orderby' => 'meta_value_num',
                                    'order' => 'ASC'

                        ));

                        while($pastWinner->have_posts()) {
                            $pastWinner->the_post(); 
                            $pastWinnerImage = get_field('shoePhoto');
                            $pastWinnerImageLikes = get_field('number_of_likes');
                            $winnerWeek = get_field('winner_of_the_week');

                            $winnerWeek2 = date("F j Y", strtotime($winnerWeek));
                            $size = "Slider";
                            // $size = "full";
                            $pastWinnerImage1 = wp_get_attachment_image_src($pastWinnerImage['id'], $size);
                           ?>
                           <div>
                            <p><?php echo $winnerWeek2; ?></p>
                            <img src="<?php echo $pastWinnerImage1[0]; ?>" longdesc=" <?php  print_r($longDesc) ?> "alt="what the" width="<?php echo $width; ?>" height="<?php echo $height; ?>" alt="shoe1">               
                            <script>
                                // console.log(<?php echo json_encode($winnerWeek2);?>);
                            </script>
                        </div>


                            <?php
                        }
                ?>

                 <?php wp_reset_postdata(); ?>
     
            </div>
        </div>
    </div>  
   
</div>

</body>

    <?php 
    // }
    
    get_footer();

?>

  



  


  



  
