<?php acf_form_head(); ?>
<?php
    get_header();

    // while(have_posts()){
    //  the_post();
    //  pageBanner();
            
    ?>

<body>
    
<div class="post-grid1">

    <div class="post-grid1-left-top-upload"  id="mario">

        <?php 
        
        // Checking if user logged in
        
        $UserLogged = "no";

        if(is_user_logged_in()){
          $UserLogged = "yes";
          $UserName = wp_get_current_user();

        }
        
        ?>

        <p>Upload Your Photo</p>
        <button id="upload-dialog">Choose Image</button>
         <p class="shoesMessage"></p>
        <input type="file"  class="shoePhoto" id="fileInput" name="image" accept="image/*" data-logged="<?php echo esc_attr($UserLogged)?>" />
        <img id="testing1" />
        <span id="image-name"></span>
        <button id="cancel-image">Cancel</button>

 
    </div>

    <div class="post-grid1-left-bottom-photo">
        <p>Photo Chosen </p>

        <img id="preview-image" src="<?php echo esc_url(get_theme_file_uri('/images/FrontPageShoes.jpg')); ?>" alt="heart">


    </div>

    <!-- <div class="post-grid1-right-top-posted">
        <p>Email Address (Required):</p>  
        <input class="posted-by" type="text" placeholder="posted by" name="posted-by"><br>

    </div> -->
<div class="post-grid1-right-middle-bought">
                <div class="post-grid2-left-top-label">
                        <p class="bought-from">Brought From (Optional)</p>
                        <p><small style="color: greenyellow ; font-style: italic;">Let Your Shop Benefit from Your Post</small></p>
                </div>

                <div class="post-grid2-left-top-name">
                        <p>Shop Name</p>
                        <input class="name" type="text" placeholder="Name" name="name">
                </div>
                <div class="post-grid2-right-top-address">
                        <p>Shop Address</p>
                        <input class="address" type="text" placeholder="Address" name="address">    
                </div>
                <div class="post-grid2-left-bottom-city">
                        <p>City</p>
                        <input class="city" type="text" placeholder="City" name="city">
                </div>

                <div class="post-grid2-right-bottom-country">
                        <p>Country</p>
                        <input list="countrylist1" name="country" id="countrylist" placeholder="Country">
                        <datalist name="" id="countrylist1">

                        </datalist>
                </div>  

</div>
    <div class="post-grid1-right-bottom-commentary">
            <p class="">Commentary (Optional)</p>
            <textarea placeholder="Any comments here..." class="commentary"></textarea>
            <br>

            <?php ?>
            <span class="ShoesSubmit-note" data-user="<?php esc_attr(print_r($UserName->user_login)) ?>">Create Post</span>

            <p class="whenNoImage"></p>
    </div>

   <!-- <script>console.log(<?php echo($UserName->user_login) ?>) </script> -->
</div>

<div class="post-shoes-modal">
    <div class="post-shoes-message">
        <div class="post-shoes-message-shell">
            <a href="#portfolio" class="ShoesClose"></a>
            <h3>Many thanks for your post.</h3>
            <h5>Please be patient our team will publish it as soon as it meets the house rules</h5>
            <a href="<?php echo esc_url(site_url('/')); ?>"><button class="ShoesImage-button">Home</button></a>
        
        </div>

    </div>
</div>

</body>

  

<?php 
// }

    get_footer();

?>


