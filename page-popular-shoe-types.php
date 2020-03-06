<?php get_header(); ?>

<div class="rulesBody">
    <div class="rulesBackground">

        <?php while(have_posts()){ ?>
        <div class="rulesTitle">
            <div class="rulesLabel">
                <h1 > Popular Shoe Types</h1>
            </div>
            <div class="rulesButton">
                        <a href="<?php echo esc_url(site_url('/')); ?>" class="btn  btn--red ">Return to Home</a>    
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