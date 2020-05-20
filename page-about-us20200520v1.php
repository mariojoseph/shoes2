<?php get_header();?>


<body>
    
<div class="aboutUsBody">
    <div class="aboutUsBackground">

            <?php while(have_posts()){ ?>
                <div class="aboutUsTitle">

                        <div class="aboutUsLabel">
                        <h1 > About Us</h1>
                        </div>
                      
                        <div class="aboutUsButton">
                        <i class="fa fa-home" style="color: yellow;" aria-hidden="true" alt="mario"></i><a href="<?php echo esc_url(site_url(' ')); ?>" class="removeHyphen">&nbsp Home</a>
                                    <!-- <a href="<?php echo esc_url(site_url('/')); ?>" class="btn  btn--red">Return to Home</a>     -->
                        </div>
                </div>
    
            <div class="aboutUsContent">
            <p><?php
                the_post(); 
                the_content();
            }
            ?></p>
            </div>

            <!-- <img src="<?php echo get_theme_file_uri('/images/aboutUsShoes.png'); ?>" alt=""> -->
            </div>


    </div>
</div>

</body>


<?php get_footer();?>

  
