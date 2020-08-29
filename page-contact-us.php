<?php get_header();?>

    
<div class="contactBody">
    <div class="contactBackground">

            <?php while(have_posts()){ ?>
                <div class="contactTitle">

                        <div class="contactLabel">
                        <h1 >Contact Us</h1>
                        </div>
                      
                        <div class="contactButton">
                        <i class="fa fa-home" style="color: yellow;" aria-hidden="true" alt="mario"></i><a href="<?php echo esc_url(site_url(' ')); ?>" class="removeHyphen">&nbsp Home</a>
                    
                        </div>
                </div>
    
            <div class="contactContent">
            <p><?php
                the_post(); 
                the_content();
            }
            ?></p>

            </div>

          
            </div>


    </div>



<?php get_footer();?>
