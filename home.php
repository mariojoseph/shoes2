<?php get_header();?>



    
<div class="blog">
<div class="blog-cover">
    <div class="blog-image">
        <div class="blog-image-filter">
            <div class="blogTitle">
                <h1>Have You Seen My Shoes Blog</h1>
            </div>
            <div class="blogContent">
                <p><?php
                    if(have_posts()):
                        while(have_posts()):the_post();?>

                    <article class="blogContent-post">
                        <h2 class="blogContent-post-title"><?php the_title(); ?></h2>
                        <h4>Posted on <?php the_time('M j Y');?></h4>
                        <h2 class="blogContent-post-content"><?php the_excerpt();?><p><a class="btn" href="<?php the_permalink() ?>">Continue Reading &raquo;</a></p></h2>

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

  
