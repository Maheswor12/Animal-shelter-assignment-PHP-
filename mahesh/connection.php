<?php 
	$servername = "localhost";
	$user = "root";
	$pwd = "";
	$dbname = "dwassignment";
	 
	$con = mysqli_connect($servername, $user, $pwd, $dbname) or die("Unable to connect to MySQL");
	if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }