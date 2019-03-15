<?php 
	$servername = "localhost";
	$user = "root";
	$pwd = "";
	$dbname = "dwassignment";
	// global $conn;

	// // Create connection
	// $conn = new mysqli($servername, $user, $pwd, $dbname);
	// // Check connection
	// if ($conn->connect_error) {
	// 	die("Connection failed: " . $conn->connect_error);
	// } 
	$con = mysqli_connect($servername, $user, $pwd, $dbname) or die("Unable to connect to MySQL");
	if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }