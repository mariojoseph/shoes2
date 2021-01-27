<?php
/*
    ADMIN PAGE
*/

function shoes_add_admin_page(){

    add_menu_page('ShoePost Control', 'ShoePending', 'manage_options', 'shoePostCtrl', 'shoe_post_ctrl','dashicons-camera-alt' ,110);
    add_menu_page('Shoes Published', 'ShoePublished', 'manage_options', 'shoePublished', 'shoe_published','dashicons-camera' ,120);
    add_menu_page('Shoes Draft', 'ShoeDraft', 'manage_options', 'shoeDraft', 'shoe_draft','dashicons-video-alt' ,130);
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
                    $mapLocation = get_field('shoeLocation');
                    $post_url = admin_url('post.php?post='.$id.'&action=edit&classic-editor')
                    ?>
              
                    <div class="admin-slider-shell">
                        <div class="admin-slider">
                            <img class="admin-slider-img" src="<?php echo esc_url($image1[0]); ?>" longdesc=" <?php  print_r(esc_attr($longDesc)) ?> "alt="what the" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" alt="shoe1">
                            <div class="admin-slider-button1" id="datafetch">
                                <button class="fetch" data-value=<?php print_r(esc_attr($id)) ?>>Publish</button>
                            </div>
                            <div class="admin-slider-button2" id="datafetch">
                                <button class="draftFetch" data-source=<?php print_r(esc_attr($id)) ?>>Set to Draft</button>
                            </div>
                        </div> 
                        <div class="admin-slider-address">
                            <table class="admin-location-Details">
                                <tr class="admin-location-row"><td class="admin-location-detail">Name of Store:</td><td class="location-detail"><?php echo esc_html(get_field(name)); ?></td></tr>
                                <tr class="admin-location-row"><td class="admin-location-detail">Address:</td><td class="location-detail"><?php echo esc_html(get_field(address)); ?></td></tr>
                                <tr class="admin-location-row"><td class="admin-location-detail">Town:</td><td class="location-detail"><?php echo esc_html(get_field(city)); ?></td></tr>
                                <tr class="admin-location-row"><td class="admin-location-detail">Country:</td><td class="location-detail"><?php echo esc_html(get_field(country)); ?></td></tr>
                            </table>
                        </div>
                        <div class="admin-slider-shell-button">
                           <a href="<?php echo esc_url($post_url); ?>"> <button>Put Directions in Map</button></a>
                        </div>

                    </div>
         
                <?php wp_reset_postdata(); }
            ?>
                
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

</div>

<?php
} ?>

<?php 
function shoe_published(){

    ?>

    <h1 class="gee" >All Published Shoes</h1>
    
    <div class="admin">
        
        <div class="imgs">
        
                <?php
    
                // content from database
    
                    $userNotes = new WP_Query(array(
                        'post_type' => 'shoes',
                        'posts_per_page' => -1,
                        'post_status' => 'published'
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
                        $mapLocation = get_field('shoeLocation');
                        $post_url = admin_url('post.php?post='.$id.'&action=edit&classic-editor')
                        ?>
                  
                        <div class="admin-slider-shell">
                            <div class="admin-slider">
                                <img class="admin-slider-img" src="<?php echo esc_url($image1[0]); ?>" longdesc=" <?php  print_r(esc_attr($longDesc)) ?> "alt="what the" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" alt="shoe1">
                            </div> 
                            <div class="admin-slider-address">
                                <table class="admin-location-Details">
                                    <tr class="admin-location-row"><td class="admin-location-detail">Name of Store:</td><td class="location-detail"><?php echo esc_html(get_field(name)); ?></td></tr>
                                    <tr class="admin-location-row"><td class="admin-location-detail">Address:</td><td class="location-detail"><?php echo esc_html(get_field(address)); ?></td></tr>
                                    <tr class="admin-location-row"><td class="admin-location-detail">Town:</td><td class="location-detail"><?php echo esc_html(get_field(city)); ?></td></tr>
                                    <tr class="admin-location-row"><td class="admin-location-detail">Country:</td><td class="location-detail"><?php echo esc_html(get_field(country)); ?></td></tr>
                                </table>
                            </div>
                            <div class="admin-slider-shell-button">
                               <a href="<?php echo esc_url($post_url); ?>"> <button>Go to Image</button></a>
                            </div>
    
                        </div>
             
                    <?php wp_reset_postdata(); }
                ?>
                    
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    
    </div>
    
    <?php
    } ?>

<?php 
function shoe_draft(){

    ?>

    <h1 class="gee" >Shoes in Draft</h1>
    
    <div class="admin">
        
        <div class="imgs">
        
                <?php
    
                // content from database
    
                    $userNotes = new WP_Query(array(
                        'post_type' => 'shoes',
                        'posts_per_page' => -1,
                        'post_status' => 'draft'
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
                        $mapLocation = get_field('shoeLocation');
                        $post_url = admin_url('post.php?post='.$id.'&action=edit&classic-editor')
                        ?>
                  
                        <div class="admin-slider-shell">
                            <div class="admin-slider">
                                <img class="admin-slider-img" src="<?php echo esc_url($image1[0]); ?>" longdesc=" <?php  print_r(esc_attr($longDesc)) ?> "alt="what the" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" alt="shoe1">
                            </div> 
                            <div class="admin-slider-address">
                                <table class="admin-location-Details">
                                    <tr class="admin-location-row"><td class="admin-location-detail">Name of Store:</td><td class="location-detail"><?php echo esc_html(get_field(name)); ?></td></tr>
                                    <tr class="admin-location-row"><td class="admin-location-detail">Address:</td><td class="location-detail"><?php echo esc_html(get_field(address)); ?></td></tr>
                                    <tr class="admin-location-row"><td class="admin-location-detail">Town:</td><td class="location-detail"><?php echo esc_html(get_field(city)); ?></td></tr>
                                    <tr class="admin-location-row"><td class="admin-location-detail">Country:</td><td class="location-detail"><?php echo esc_html(get_field(country)); ?></td></tr>
                                </table>
                            </div>
                            <div class="admin-slider-shell-button">
                               <a href="<?php echo esc_url($post_url); ?>"> <button>Go to Image</button></a>
                            </div>
    
                        </div>
             
                    <?php wp_reset_postdata(); }
                ?>
                    
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    
    </div>
    
    <?php
    } ?>