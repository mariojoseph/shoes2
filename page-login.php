<?php get_header();?>

<body>


<div class="login-container1">

<div class="heading">

    <h1 style="color: white;">Log in to your Account</h1>
    <input type="hidden" style="display: none;" id="datafetch">
</div>

<div class="login-form">

    <?php
    wp_login_form();
    ?>


    <!-- <input type="hidden" name ="field_name" value ="marcin" class="datafetch"> -->
</div>


</div>

</body>


<?php get_footer();?>
