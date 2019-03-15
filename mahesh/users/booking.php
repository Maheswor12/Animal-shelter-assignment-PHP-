
	<?php  require_once('header.php'); ?>
	<?php
	$id = $_GET['id'];
	if( !isset($_SESSION ) ){
		session_start();
	} 
	$user_id =  $_SESSION['u_id']; 
	if( isset( $_POST['submit'] ) ){
		$data = array(
			'dog_id' => $_POST['dog_id'],
			'user_id' => $user_id,
			'email' => $_POST['email'],
			'phone' => $_POST['phone'],
			'message' => $_POST['message'],
		);
		$send_request = buyDog($data);
		if( $send_request ){
			$message = "Thank You For Your Request We will get you back soon!!";
		}else{
			$message = "ouch There is somthing Wrong Please Send Again";
		}
	}

	?>

	<?php if( isset( $message ) ){ echo $message; } ?>
	<div class="booking_wrapper">
		<h1>Booking Of Animals</h1>

	<form method="POST">
		<input type="hidden" name="dog_id" value="<?php echo $id; ?>">
		<div class="booking_name">
			<input type="text" name="ful_name" placeholder=" Enter Full Name" required="required"><br>
		</div>
		<div class="booking_email">
			<input type="email" name="email" placeholder="Enter Email Address" required="required"><br>
		</div>
		<div class="booking_phone">
			<input type="number" name="phone" placeholder="Enter Phone Number" required="required"><br>
		</div>
		<div class="booking_text">
			<textarea rows="8" name="message" placeholder="Enter Message" required="required"></textarea><br>
		</div>
		<div class="booking_sub">
		<input type="submit" name="submit" value="submit">
		</div>
		<a href="../users/index.php"><b>Back</b></a>
	</form>
</div>
