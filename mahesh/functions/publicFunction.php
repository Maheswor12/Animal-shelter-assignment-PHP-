<?php 
include( 'connection.php');

	/*function test12(){

		$sql = "SELECT * FROM animals ORDER BY id desc";
		$result = mysql_query($sql);
		if( $result > 0 ){
			return $result;
		}else{
			return false;
		}
	}*/

	function getLatestDog( $limit ){
		
		
		if( $result > 0 ){
			return $result;
		}else{
			return false;
		}
	}

	function loginCheck( $Email, $password ){
		
		$sql1 = "SELECT *  FROM users WHERE email='$Email' and password='$password' and user_type='2'";
		$result = mysql_query($sql1); 
		if( $result > 0 ){
			return $result;
		}else{
			return false;
		}
	}

	function getDogById( $id ){
		
		$sql = "SELECT * FROM animals where id=".$id;
		$result = mysql_query($sql);
		if( $result->num_rows > 0 ){
			return $result;
		}else{
			return false;
		}
	}
