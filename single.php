<?php get_header();?>
 
<div class="single-blog">
<div class="single-blog-cover">
    <div class="single-blog-image">
        <div class="single-blog-image-filter">
            <div class="single-blogContent">
                <div class="single-blogContent-Casing"><?php
                    if(have_posts()):
                        while(have_posts()):the_post();?>

                    <a class="btn"href="<?php echo esc_url(site_url('/blog')); ?>"><i class="fa fa-home"></i> Blog Home</a>
                    <article class="single-blogContent-post">
                        <h2 class="single-blogContent-post-title"><?php the_title(); ?></h2>
                        <h4>Posted on <?php the_time('n,j,y');?></h4>
                        <p class="single-blogContent-post-content"><?php the_content();?></p>

                    </article>
                
                <?php endwhile;
                else:
                    echo '<p>No content found </p>';
                endif;
                ?>
                </div>
            </div>

    
                </div>
        </div>
</div>

<section >
<div class="comment-section">
    <?php
        if(comments_open() || '0' != get_comments_number()) :comments_template();
        endif; 
    ?>

</div>

</div>

</section>
<?php get_footer();?>

  
