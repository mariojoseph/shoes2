<?php get_header();?>
   
<div class="single-blog">
<div class="single-blog-cover">
    <div class="single-blog-image">
        <div class="single-blog-image-filter">
            <div class="single-blogContent">
                <p><?php
                    if(have_posts()):
                        while(have_posts()):the_post();?>

                    <a class="btn"href="<?php echo site_url('/blog'); ?>"><i class="fa fa-home"></i> Blog Home</a>
                    <article class="single-blogContent-post">
                        <h2 class="single-blogContent-post-title"><?php the_title(); ?></h2>
                        <h4>Posted on <?php the_time('n,j,y');?></h4>
                        <h2 class="single-blogContent-post-content"><?php the_content();?></h2>

                    </article>
                
                <?php endwhile;
                else:
                    echo '<p>No content found </p>';
                endif;
                ?>
                </p>
            </div>

                <!-- <img src="<?php echo get_theme_file_uri('/images/aboutUsShoes.png'); ?>" alt=""> -->
                </div>
        </div>
</div>


</div>

<?php get_footer();?>

  
