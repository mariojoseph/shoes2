<?php get_header();?>

    
<div class="historyBody">
    <div class="historyBackground">

            <?php while(have_posts()){ ?>
                <div class="historyTitle">

                        <div class="historyLabel">
                        <h1 > Legal </h1>
                        </div>
                      
                        <div class="historyButton">
                        <i class="fa fa-home" style="color: yellow;" aria-hidden="true" alt="mario"></i><a href="<?php echo esc_url(site_url(' ')); ?>" class="removeHyphen">&nbsp Home</a>
                                  
                        </div>
                </div>
    
            <div class="historyContent">
            <p><?php
                the_post(); 
                the_content();
            }
            ?></p>
            </div>

          
            </div>


    </div>



<?php get_footer();?>
