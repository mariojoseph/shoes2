<?php get_header();?>
   
<div class="single-brands">
<div class="single-brands-cover">
    <div class="single-brands-image">
        <div class="single-brands-image-filter">
            <div class="single-brandsContent">
                <div class="single-brandsContent-Casing"><?php
                    if(have_posts()):
                        while(have_posts()):the_post();?>

                    <a class="btn"href="<?php echo esc_url(site_url('/brands')); ?>"><i class="fa fa-home"></i> brands Home</a>
                    <article class="single-brandsContent-post">
                        <h2 class="single-brandsContent-post-title"><?php the_title(); ?></h2>
                        <h4>Posted on <?php the_time('n,j,y');?></h4>
                        <h2 class="single-brandsContent-post-content"><?php the_content();?></h2>

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

  
