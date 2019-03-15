<?php 

	function insertusers($data) {
		include 'connection.php';
	
}

function buyDog($data ){
		include 'connection.php';
	$dog_id = $data['dog_id'];
	$user_id = $data['user_id'];
	$email = $data['email'];
	$phone = $data['phone'];
	$message = $data['message'];
	$sql = "INSERT INTO animals_booking(dog_id, user_id, email , phone, message) VALUES ('$dog_id', '$user_id', '$email', '$phone', '$message')";
			// echo "<pre>";
			// var_dump($sql);
			// echo "</pre>";
			// die();
	$result = mysqli_query($con,$sql);
	if( $result ){
		return true;
	}else{
		return false;
	}
}

function insertdon($uname ,$uemail ,$currency,$uamount){
		include 'connection.php';
	$qry = "INSERT INTO `donation`( `username`, `email`, `currency`, `amount`) VALUES ('$uname','$uemail ','$currency','$uamount')";
	$result =mysqli_query($con,$qry);
	if( $result ){
		return true;
	}else{
		return false;
	}
}

function listdonate(){
		include 'connection.php';
	$sql = "SELECT * FROM donation ORDER BY id desc";
	$result = mysqli_query($con,$sql);
	if( $result> 0 ){
		return $result;
	}else{
		return false;
	}
}


function getLatestDog( $limit ){
			include 'connection.php';
		$sql = "SELECT * FROM animals limit ".$limit;
		$result =mysqli_query($con,$sql);
		if( $result > 0 ){
			return $result;
		}else{
			return false;
		}
	}


function listprofile($id){
	include 'connection.php';
	$sql = "SELECT * FROM users WHERE username='$id'";
	

	$result = mysqli_query($con,$sql);
	
	
	if( $result){
		return $result;
	}else{
		return false;
	}
}

function getprofileById( $id ){
	include 'connection.php';
	$sql = "SELECT * FROM users WHERE id=$id";
	$result = mysqli_query($con,$sql);
	
	//var_dump($result);
	if( $result){
		return $result;
	}else{
		return false;
	}
} 
function updateprofile( $id, $customer_name, $email, $postal, $contact, $birthdate, $gender , $password){
		include 'connection.php';
	$sql ="UPDATE `users` SET `customer_name`= '$customer_name',`email`='$email',`postal`='$postal',`contact`='$contact',`birthdate`='$birthdate',`gender`='$gender',`password`='$password' WHERE id='$id'";
	echo($sql);
	die();
	
	$result = mysqli_query($con,$sql);
	if( $result >0){
		return true;
	}else{
		return false;
	}
}
