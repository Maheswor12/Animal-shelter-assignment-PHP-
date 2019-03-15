<?php 
include( 'connection.php');

function adminLogin($data){
	$username = $data['username'];  
	$password = $data['password'];
	$md5password = md5( $password);
	$sql = "SELECT *  FROM users WHERE username='$username' and password ='$md5password' and user_type=1";

	$result = mysql_query($sql);
	if( $result > 0 ){
		return $result;
	}else{
		return false;
	}

}
function listAnimal(){
	$sql = "SELECT * FROM animals ORDER BY id desc";
	$result = mysql_query($sql);
	if( $result >0 ){
		return $result;
	}else{
		return false;
	}
}

function getAnimalById( $id ){

	$sql = "SELECT * FROM animals WHERE id=$id";
	$result = mysql_query($sql);
	if( $result > 0 ){
		return $result;
	}else{
		return false;
	}
} 
function updateAnimal( $data ){
	$id = $data['id'];
	$type = $data['type'];
	$breed = $data['breed'];
	$size = $data['size'];
	$weight = $data['weight'];
	$gender = $data['gender'];
	$amount = $data['amount'];
	$image1 = $data['image1'];



	$sql ="UPDATE `animals` SET `type`= '$type',`breed`='$breed',`size`='$size',`weight`='$weight',`gender`='$gender',`amount`='$amount', `image`='$image1' WHERE id='$id'";
		// echo "<pre>";
		// echo $sql;
		// echo "</pre>";
		// die();
	$result = mysql_query($sql);
	if( $result > 0){
		return true;
	}else{
		return false;
	}
}

function deleteAnimal( $id ){
	
	$sql = "DELETE FROM animals WHERE id=$id";
	$result = mysql_query($sql);
	if( $result> 0){
		return true;
	}else{
		return false;
	}
}

function allBoking(){

	$sql = "SELECT animals_booking.dog_id, animals_booking.user_id, animals_booking.email, animals_booking.phone, animals_booking.message, animals.id, animals.type FROM animals_booking INNER JOIN animals ON animals_booking.dog_id = animals.id";
	$result = mysql_query($sql);

	if( $result > 0 ){
		return $result;
	}else{
		return false;
	}
}

function listdonation(){

	$sql = "SELECT * FROM donation ORDER BY id desc";
	$result = mysql_query($sql);
	if( $result > 0 ){
		return $result;
	}else{
		return false;
	}
}