<?php get_header(); ?>

<div class="legalBody">
    <div class="legalBackground">

        <?php while(have_posts()){ ?>
        <div class="legalTitle">
            <div class="legalLabel">
                <h1 >Web Site Disclaimer </h1>
            </div>
            <div class="legalButton">
                        <a href="<?php echo esc_url(site_url('/')); ?>" class="btn  btn--red ">Return to Home</a>    
            </div>
        </div> 
        <div class="legalContent">
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