<?php get_header(); ?>

<div class="rulesBody">
    <div class="rulesBackground">

        <?php while(have_posts()){ ?>
        <div class="rulesTitle">
            <div class="rulesLabel">
                <h1 >History of Shoes</h1>
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

        <?php
        $args = array('category_name' => 'shoesHistory');
        $catPost = get_posts($args);
        
        foreach($catPost as $post): setup_postdata($post); ?>

        <div>
            <h2><?php the_title(); ?></h2>
            <h2><?php the_content(); ?></h2>
        </div>
        <?php endforeach?>

        <div class="testingNow">

        <div>Beginnings</div>
        <div>
        Shoes have existed since the dawn of mankind. The exact time of the first use of shoes is not known, since the perishable nature of the material used. However, scientists have observed that the bones of small toes have decreased in thickness approximately 40,000 to 26,000 years ago indicating the use of shoes during this period.
        The earliest evidence of shoes, were shoes made of bark found in caves dating back from 7,000 to 8,000 BC. The oldest leather shoes dates back to around 3,500 BC. As you go through history you can see the use of our favorite shoes.
        </div>
        &nbsp;
        <div class="HistoryMoccasins"></div>
        <div class="HistoryMoccasinsText">Typically used by early natives of North America. The shoes were made out of the hides of leather or bison hides. They were decorated with various beads and other adornments.</div>
        &nbsp;
        <div class="HistorySandals"></div>
        <div class="HistorySandalsText">Occurrence of use of Sandals can be found on ancient Egyptian murals and from Roman, Indian and Greek civilizations.</div>
        &nbsp;
        <div class="HistoryEspadrilles"></div>
        <div class="HistoryEspadrillesText">These were commonly used in the Middle Ages in Spain and Italy. They were commonly used by peasants.</div>

        </div>
        </div>
    </div>
</div>
<?php
    get_footer();

?>