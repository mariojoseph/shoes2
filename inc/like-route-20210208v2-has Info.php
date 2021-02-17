<?php

function LikeRoutes() {
  
  register_rest_route('shoes/v1', 'manageLike', array(
    'methods' => 'POST',
    'callback' => 'createLike'
  ));

  register_rest_route('shoes/v1', 'manageLike', array(
    'methods' => 'DELETE',
    'callback' => 'deleteLike'
  ));
}

function createLike($data) {

print_r('we are in the create like post');

  if (is_user_logged_in()) {
    $shoe = sanitize_text_field($data['shoeId']);
    $userId = sanitize_text_field($data['userId']);
    $dateId = sanitize_text_field($data['dateId']);
    $weekId = sanitize_text_field($data['weekId']);
    $yearId = sanitize_text_field($data['yearId']);
    print_r($data);

   print_r("why is it not printing the rest");

  //  new type
   echo "<pre>";
    print_r('now I work');
    $selector1 = 'liked';
    $post_id1 = sanitize_text_field($data['shoeId']);
    $previous_like_value1 = get_field($selector1, $post_id1);
    print_r($previous_like_value1);
    print_r('did it work');
    echo "</pre>";
  //  START OF SHOE UPDATE
   $selector = 'field_5cebf5c256328';
   $post_id = sanitize_text_field($data['shoeId']);
   $previous_like_value = get_field($selector, $post_id);
   $value = $previous_like_value+1;
  //  $post_id = $data['shoeId'];
 
  
   update_field($selector, $value, $post_id);

      if (get_post_type($shoe) == 'shoes') {
      return wp_insert_post(array(
        'post_type' => 'like',
        'post_status' => 'publish',
        'post_title' => '2nd PHP Test',
        'meta_input' => array(
          'liked' => $shoe,
          'liked-user' => $userId,
          'liked-date' => $dateId,
          'liked-week' => $weekId,
          'liked-year' => $yearId
        )
      ));
    } else {
      die("Invalid shoe id");
    }

  } else {

    $message = "wrong answer";
   
    echo '<script language="javascript">';
    echo 'alert("message successfully sent")';
    echo '</script>';
    
    die("Only logged in users can create a like.");
  }

  return "we have money";
}

function deleteLike($data) {
  $post_id = sanitize_text_field($data['shoeId']);
  $shoe = sanitize_text_field($data['shoeId']);
  $likeId = sanitize_text_field($data['like']);

    //  START OF SHOE UPDATE
    $selector = 'field_5cebf5c256328';
    $post_id = sanitize_text_field($data['shoeId']);
    $previous_like_value = get_field($selector, $post_id);
    $value = $previous_like_value - 1;
   //  $post_id = $data['shoeId'];
  
   
    update_field($selector, $value, $post_id);
 
    //  END OF SHOE UPDATE

  print_r("This is the shoe ID???");
  print_r($post_id);
  print_r("This is the END shoe ID???");
  print_r($data);
  if (get_current_user_id() == get_post_field('post_author', $likeId) AND get_post_type($likeId) == 'like') {
    wp_delete_post($likeId, true);
    return 'Congrats, like deleted.';
  } else {
    die("You do not have permission to delete that.");
  }
}

add_action('rest_api_init', 'LikeRoutes');






?>
