
<?php get_header(); ?>

<div class="rulesBody">
    <div class="rulesBackground">

     
        <div class="rulesTitle">
            <div class="rulesLabel">
                <h1 > Rules</h1>
            </div>
            <div class="rulesButton">
            <i class="fa rulesButtonColor fa-home" style="color: yellow;" aria-hidden="true" alt="mario"></i><a href="<?php echo esc_url(site_url(' ')); ?>" class="removeHyphen">&nbsp Home</a>  
            </div>
        </div> 
        <div class="rulesContent">
            <div class="rulesContent-General">
                <ul>
                    <li>The Rules are to have Fun !!!</li>
                    <li><p> <u>VOTE</u>&nbsp for your favorite shoes of the week </p> AND</li>
                    <li><p> <u>POST</u> your favorite shoes </p> and maybe win the prize of "SHOES OF THE WEEK" !!!</li>
                </ul>
            </div>
           
            <div class="rulesContent-Vote">
                <h4>Vote for your favorite shoes</h4>
                <ul>
                    <li>Each week you can choose your favorite shoes from the contenders</li>
                    <li>Click on the photo and then you can choose on the individual photo page if you want to vote or not</li>
                    <li class="rulesContent-Vote-Image1">
                        <div class="rulesContent-Vote-Image1a"></div>
                    </li>
                    <li>You can vote by pressing the heart, which will change from hollow to complete.</li>
                    <li class="rulesContent-Vote-Image2">
                                    <div class="rulesContent-Vote-Image2a"></div>
                                    <div class="rulesContent-Vote-Image2b"></div>
                    </li>
                    <li>Remember you can only vote once for the same Photo. To ensure this we require you to Log On / Sign In</li>
                    <li>The following week we will show the winner of the week</li> 
                </ul>
            </div>

            <div class="rulesContent-Post">
                <div class="rulesContent-Post-Case">
                <h4>Post your favorite shoes</h4>
                <a href="<?php echo esc_url(site_url('post-your-shoes')); ?>" ><i class="fa fa-camera fa-lg" style="color: rgb(244,232,23);"></i></a>
                <!-- <a href="<?php echo esc_url(site_url('post-your-shoes')); ?>" class="btn btn--red btnRules">Post Your Shoes</a> -->
                </div>
               
                <ul>
                    <li>Take a photo of your favorite shoes and upload them in seconds to us</li>
                    <li class="rulesContent-Post-Image1">
                        <div class="rulesContent-Post-Image1a"></div>
                    </li>
                    <li>As a favor to others we ask you to upload where you bought your shoes (name and address), so that others can buy them</li>
                    <li class="rulesContent-Post-Image2">
                        <div class="rulesContent-Post-Image2a"></div>
                    </li>
                    <li>You can also leave any comments you would like to make</li>
                    <li>If you win your photo will be the folowing week's "SHOE OF THE WEEK"</li>
                    <li>Your shoes will also be pride of place in our "PAST WINNERS GALLERY"</li>
                </ul>  
            </div>

            <div class="rulesContent-End">
                    <h2>Good Luck and have Fun !!!!</h2>

            </div>

        </div>
    </div>
</div>
<?php
    get_footer();

?>


  
