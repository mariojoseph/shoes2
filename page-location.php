<?php
	get_header();

	while(have_posts()){
		the_post(); 
	?>


  <div class="locationBody">
  
  <div class="locationTitle">
             <div class="locationLabel">
                 <h1>Location of Seller</h1>
             </div> 


   						<div class="locationButton">
                  <a href='javascript:history.back()' class="btn  btn--red ">Return to Shoe Post</a>	
            </div> 
  </div>

  <?php
    $maybe = $_GET['variable'];
  ?>

  <div class="locationContent">

    <h2>Below is the location of the seller, thanks to the contribution of <?php echo get_field('postedBy', $maybe); ?></h2>
  </div>



  <div class="map-content"><?php the_content(); ?></div>
  
  <?php
    $mapLocation = get_field('shoeLocation', $maybe);
   ?>
   <div class="acf-map">
    <div class="marker" data-lat="<?php echo $mapLocation['lat'] ?>" data-lng="<?php echo $mapLocation['lng']; ?>">
      <h3><?php the_title(); ?></h3>
      <?php echo $mapLocation['address']; ?>
    </div>
	 </div>



</div>

   </div> 
  <?php }
	
	get_footer();

?>

  		
		
