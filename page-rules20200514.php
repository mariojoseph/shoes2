
<?php get_header(); ?>

<div class="rulesBody">
    <div class="rulesBackground">

        <?php while(have_posts()){ ?>
        <div class="rulesTitle">
            <div class="rulesLabel">
                <h1 > Rules</h1>
            </div>
            <div class="rulesButton">
            <i class="fa rulesButtonColor fa-home" style="color: yellow;" aria-hidden="true" alt="mario"></i><a href="<?php echo esc_url(site_url(' ')); ?>" class="removeHyphen">&nbsp Home</a>  
            </div>
        </div> 
        <div class="rulesContent">
        <p><?php
            the_post(); 
            the_content();
        }
        ?></p>
        </div>
    </div>
</div>
<?php
    get_footer();

?>


  
