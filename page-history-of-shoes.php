<?php get_header(); ?>

<div class="shoesHistoryBody">
 
        <?php while(have_posts()){ ?>
    <div class="shoesHistoryTitle">
            <div class="shoesHistoryLabel">
                <h1 >History of Shoes</h1>
            </div>
            <div class="shoesHistoryButton">
                        <a href="<?php echo esc_url(site_url('/')); ?>" class="btn  btn--red ">Return to Home</a>    
            </div>
    </div> 
    <div class="shoesHistoryIntro">
            <div class="ShoesHistory-Heading">
                <p><?php the_post();?> <p>
            </div>
            <div class="shoesHistoryIntro-Content">
                <p><?php the_content();} ?></p>
            </div>
    </div>
   <div class="shoesHistoryBrand">
        <?php
        $args = array('category_name' => 'shoesHistory');
        $catPost = get_posts($args);
        
        foreach($catPost as $post): setup_postdata($post); ?>

        <div>
            <h2><?php the_title(); ?></h2>
            <h2><?php the_content(); ?></h2>
        </div>
        <?php endforeach?>

        </div>
   
</div>
<?php
    get_footer();

?>