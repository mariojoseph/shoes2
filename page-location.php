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
                  <a href='javascript:history.back()' >Return to Shoe Post</a>	
            </div> 
  </div>

  <?php
    $maybe = $_GET['variable'];
  ?>

  <div class="locationContent">

    <h2>Below is the location of the seller, thanks to the contribution of <?php echo get_field('postedBy', $maybe); ?></h2>
  
    <?php

    $postInfo  = new WP_Query(array(
      'post_type' => array('shoes', 'pastwinners'),
      'p' => $maybe

      ));
    while($postInfo ->have_posts()){
      $postInfo->the_post();
      $storeName = get_field('name'); ?>
    <table class="location-Details">
      <tr class="location-row"><td class="location-detail">Name of Store:</td><td class="location-detail"><?php echo esc_html(get_field(name)); ?></td></tr>
      <tr class="location-row"><td class="location-detail">Address:</td><td class="location-detail"><?php echo esc_html(get_field(address)); ?></td></tr>
      <tr class="location-row"><td class="location-detail">Town:</td><td class="location-detail"><?php echo esc_html(get_field(city)); ?></td></tr>
      <tr class="location-row"><td class="location-detail">Country:</td><td class="location-detail"><?php echo esc_html(get_field(country)); ?></td></tr>
    </table>

<?php
    }
    wp_reset_postdata();
   ?>

  
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

  		
		
