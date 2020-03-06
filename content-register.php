
 <?php
 $error= '';
 $success = '';
 
 global $wpdb, $PasswordHash, $current_user, $user_ID;
 
 if(isset($_POST['task']) && $_POST['task'] == 'register' ) {
 
 
 $password1 = $wpdb->escape(trim($_POST['password1']));
 $password2 = $wpdb->escape(trim($_POST['password2']));
 $first_name = 'John';
 $last_name = 'Doe';
//  $first_name = $wpdb->escape(trim($_POST['first_name']));
//  $last_name = $wpdb->escape(trim($_POST['last_name']));

 $email = $wpdb->escape(trim($_POST['email']));
//  $username = $wpdb->escape(trim($_POST['username']));
 $username = $wpdb->escape(trim($_POST['email']));
 
 if( $email == "" || $password1 == "" || $password2 == "" || $username == "" || $first_name == "" || $last_name == "") {
 $error= 'Please don\'t leave the required fields.';
 } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 $error= 'Invalid email address.';
 } else if(email_exists($email) ) {
 $error= 'Email already exist.';
 } else if($password1 <> $password2 ){
 $error= 'Password do not match.'; 
 } else {
 
 $user_id = wp_insert_user( array ('first_name' => apply_filters('pre_user_first_name', $first_name), 'last_name' => apply_filters('pre_user_last_name', $last_name), 'user_pass' => apply_filters('pre_user_user_pass', $password1), 'user_login' => apply_filters('pre_user_user_login', $username), 'user_email' => apply_filters('pre_user_user_email', $email), 'role' => 'subscriber' ) );
 if( is_wp_error($user_id) ) {
 $error= 'Error on user creation.';
 } else {
 do_action('user_register', $user_id);

 $success = 'Success you can Login';
 

 }
 
 }
 
 }
 ?>
 
        <!--display error/success message-->
 <div id="message">
 <?php 
 if(! empty($err) ) :
 echo '<p class="error">'.$err.'';
 endif;
 ?>
 
 <!-- <?php 
 if(! empty($success) ) :
 echo '<p class="error">'.$success.'';
 endif;
 ?> -->
 </div>
 
 <form method="post" class="register-form">

<div class="registration-message"><p><?php if($success != "") { echo $success; } ?></p></div>
<?php
if($success == 'Success you can Login'){
?>

<div class="registerSuccess">

<a href="<?php echo esc_url(site_url('login')); ?>"><h3 class="button-primary" >Login</h3></a>
</div>

<?php }else{ ?>

    <div class="register-heading">

    <h1>Don't have an account?</h1>
    <h2>Register for one now</h2>
</div>

    <div class="registerShell">
    <div class="register-input1">
        <p><label>Email</label></p>
        <p><input type="text" value="" name="email" id="email" /></p>
    </div>

    <div class="register-input2">
        <p><label>Password</label></p>
        <p><input type="password" value="" name="password1" id="password1" /></p>
    </div>
    <div class="register-input3">
        <p><label>Password again</label></p>
        <p><input type="password" value="" name="password2" id="password2" /></p>
    </div>

 </div>
 <div class="registration-message"><p><?php if($error!= "") { echo $error; } ?></p></div>
    <button type="submit" name="btnregister" class="button-register" >Submit</button>
<?php
}
?>

<input type="hidden" name="task" value="register" />
</form>
 