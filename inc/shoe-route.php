<?php

function postMyShoesRoute(){

    register_rest_route('shoes/v1', 'manageShoe', array(
        'methods' => 'POST',
        'callback' => 'createShoe'

    ));
}

function createShoe($data) { 

    // Previous text - Beginning
    echo "<pre>";
      print_r($_POST);
      echo "</pre>";
  
  
  
      echo "<pre>";
      print_r($_FILES);
    echo "</pre>";
  
  $dummy= sanitize_text_field($data['dummy']);
  $postedBy= sanitize_text_field($data['posted']);
  $name = sanitize_text_field($data['name']);
  $address = sanitize_text_field($data['address']);
  $country = sanitize_text_field($data['country']);
  $city = sanitize_text_field($data['city']);
  $commentary = sanitize_text_field($data['commentary']);
  $location = $address . ', ' . $city .', '. $country;
  $value = array("address" => $location, "lat" => $lat, "lng" => $lng, "zoom" => $zoom);
  
  print_r("is this working??");
  print_r($value);
  print_r("is this working?? END");
  
  $post_info= array(  'post_type' => 'shoes',       
                      'post_status' => 'publish',
                      'post_title' => 'Shoe Post',
                      'post_content' => 'Shoe Posts from users.' );
  
  $postID = wp_insert_post($post_info, true);
  // update_field('dummy', $dummy, $postID);
  update_field('postedBy', $postedBy, $postID);
  update_field('name', $name, $postID);
  update_field('address', $address, $postID);
  update_field('country', $country, $postID);
  update_field('city', $city, $postID);
  update_field('commentary', $commentary, $postID);
  update_field('number_of_likes', 0, $postID);
  update_field('shoeLocation', $value, $postID);
  
  $att = my_update_attachment('files',$postID);
  
  print_r("hello are you there?");
  print_r($postID);
  
  update_field('shoePhoto', $att['attach_id'], $postID);
  
  // print_r("additional Info");
  // print_r($att['pid']);
  // print_r($att['url']);
  
  // update_post_meta( $att['pid'], 'shoePhoto', $att['url'] );
  
  }
  
  
  function my_update_attachment($f,$pid,$t='',$c='') {
  
    $filename = null;
    foreach ($_FILES[$f] as $key => $value){
  
      $filename[$key] = $value[0];
    }
  
    // $filename = $_FILES[$f];
  
  
    print_r("just checking");
    print_r($filename);
    print_r("just checking end");
  
    wp_update_attachment_metadata( $pid, $f );
    if( !empty( $filename )) { //New upload
    // testing
      
      require_once( ABSPATH . 'wp-admin/includes/file.php' );
      require_once( ABSPATH . 'wp-admin/includes/image.php' );
      // $override['action'] = 'editpost';
      $overrides = array('test_form' => false);
  
      // $file_prep = $_FILES[$f]['tmp_name'][0];
      // $file_prep_name = basename($_FILES[$f]['name'][0]);
      //$file = wp_upload_bits($file_prep_name, null, file_get_contents($file_prep));
  
        $file = wp_handle_upload( $filename, $overrides );
      // testing
  
      // if ( !$file['error']) {
      //   print_r("programend 1 ");
      //   return new WP_Error( 'upload_error', $file['error'][0] );
      // }
  
      print_r("programend 2 ");
      $file_type = wp_check_filetype($filename['name'], array(
        'jpg|jpeg' => 'image/jpeg',
        'gif' => 'image/gif',
        'png' => 'image/png',
      ));
      if ($file_type['type']) {
        print_r("programend 3 ");
        $name_parts = pathinfo( $file['file'] );
        // $name = $file['filename'];
        // $type = $file['shoes'];
        print_r($name_parts);
        $title = $t ? $t : $name;
        $content = $c;
  
        $attachment = array(
          // 'post_title' => 'Shoe Post',
          'post_type' => 'shoes',
          // 'post_content' => 'hello world 123.',
          //'post_parent' => $pid,
          'post_mime_type' => $file_type[type],
          'post_status' => 'publish',
          'guid' => $file['url']
        );
  
        foreach( get_intermediate_image_sizes() as $s ) {
          $sizes[$s] = array( 'width' => '', 'height' => '', 'crop' => true );
          $sizes[$s]['width'] = get_option( "{$s}_size_w" ); // For default sizes set in options
          $sizes[$s]['height'] = get_option( "{$s}_size_h" ); // For default sizes set in options
          $sizes[$s]['crop'] = get_option( "{$s}_crop" ); // For default sizes set in options
        }
  
        $sizes = apply_filters( 'intermediate_image_sizes_advanced', $sizes );
        print_r("programend 4 ");
        foreach( $sizes as $size => $size_data ) {
          $resized = image_make_intermediate_size( $file['file'], $size_data['width'], $size_data['height'], $size_data['crop'] );
          if ( $resized )
            $metadata['sizes'][$size] = $resized;
        }
  
        $attach_id = wp_insert_attachment( $attachment, $file['file'] , $pid /*, $pid - for post_thumbnails*/);
  
        print_r("telling attache id");
        print_r($attach_id);
        print_r("telling attache id end");
  
        if ( !is_wp_error( $id )) {
          print_r("programend 5 ");
          $attach_meta = wp_generate_attachment_metadata( $attach_id, $file['file']);
          print_r("programend 6 ");
          wp_update_attachment_metadata( $attach_id, $attach_meta );
          print_r("programend 7 ");
          print_r($attach_meta);
        }
  
        print_r("programend 8 ");
        print_r("beginning 9 ");
        print_r($pid);
        print_r($file['url']);
        print_r($attach_id);
        print_r(" end 9 ");
  
  
        return array(
          'pid' =>$pid,
          'url' =>$file['url'],
          // 'file'=>$file,
          'attach_id'=>$attach_id
        );
    
      }
    }
  }
  
  
add_action('rest_api_init', 'postMyShoesRoute');


?>