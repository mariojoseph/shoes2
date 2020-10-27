<?php

/*
    ADMIN PAGE

*/

function shoes_add_admin_page(){

    add_menu_page('ShoePost Control', 'ShoePostCtrl', 'manage_options', 'shoePostCtrl', 'shoe_post_ctrl','dashicons-block-default' ,110);
}

add_action('admin_menu', 'shoes_add_admin_page');


function shoe_post_ctrl(){ 
    
        ?>

<h1 class="gee" >Pending Shoe Post Review</h1>

<div class="admin">
    
    <div class="imgs">
    
            <?php

            // content from database

                $userNotes = new WP_Query(array(
                    'post_type' => 'shoes',
                    'posts_per_page' => -1,
                    'post_status' => 'pending'
                    // 'author' => get_current_user_id()
                ));
                
                $counter = 1;
                

            //processing
               
                while($userNotes->have_posts()) {
                    $userNotes->the_post(); 
                    $counter++;
                    $id = get_the_ID();
                    $image = get_field('shoePhoto');
                    $size = "thumbnail";
                    $longDescThumb =  get_permalink();
                    $image1 = wp_get_attachment_image_src($image['id'], $size);
                    $longDesc =  get_permalink();
                    
                    ?>
              

                    <div class="admin-slider">
                        <img class="admin-slider-img" src="<?php echo esc_url($image1[0]); ?>" longdesc=" <?php  print_r(esc_attr($longDesc)) ?> "alt="what the" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" alt="shoe1">
                        <div class="admin-slider-button" id="datafetch">
                            <button onclick="fetch(<?php  echo $id?>)">Publish</button>
                        </div>
                    </div>          
                <?php wp_reset_postdata(); }
            ?>
                
    </div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    function fetch(picture_id){
        const id = picture_id;
        $.post('http://localhost:3000/wp-admin/admin-ajax.php', {'action': 'my_action', id: id}, function(response){
            $('#datafetch').append(
                window.location.reload()   
                );
        });
    }
</script>

</div>

<?php
} ?>