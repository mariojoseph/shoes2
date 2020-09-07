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

        <p>Upload Your Photo</p>
        <button id="upload-dialog">Choose Image</button>
        <input type="file"  class="shoePhoto" id="fileInput" name="image" accept="image/*" />
        <img id="testing1" />
        <span id="image-name"></span>
        <button id="cancel-image">Cancel</button>

    </div>

    <div class="post-grid1-left-bottom-photo">
        <p>Photo Chosen </p>

        <img id="preview-image" src="<?php echo esc_url(get_theme_file_uri('/images/FrontPageShoes.jpg')); ?>" alt="heart">


    </div>

    <div class="post-grid1-right-top-posted">
        <p>Posted by:</p>  
        <input class="posted-by" type="text" placeholder="posted by" name="posted-by"><br>

    </div>
<div class="post-grid1-right-middle-bought">
                <div class="post-grid2-left-top-label">
                        <p class="bought-from">Brought From</p>
                </div>

                <div class="post-grid2-left-top-name">
                        <p>Shop Name</p>
                        <input class="name" type="text" placeholder="name" name="name">
                </div>
                <div class="post-grid2-right-top-address">
                        <p>Shop Address</p>
                        <input class="address" type="text" placeholder="address" name="address">    
                </div>
                <div class="post-grid2-left-bottom-city">
                        <p>City</p>
                        <input class="city" type="text" placeholder="city" name="city">
                </div>

                <div class="post-grid2-right-bottom-country">
                        <p>Country</p>
                        <select name="" id="countryList" onchange="getSelectedValue();" data-country="<?php echo esc_url(site_url('')); ?>" >
                                
                        </select>
    
                </div>  

</div>
    <div class="post-grid1-right-bottom-commentary">
            <p class="">Commentary</p>
            <textarea placeholder="Any comments here..."></textarea>
            <br>
            <span class="ShoesSubmit-note">Create Post</span>
    </div>
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


