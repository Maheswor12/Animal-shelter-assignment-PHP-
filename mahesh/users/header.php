<?php if(!session_start()){
session_start()	;
}else {
	if($_SESSION['login'] != '' && $_SESSION['level'] == 2){
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User | Animals</title>
	<link rel="stylesheet" type="text/css" href="../assets/users/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/users/css/custom.css">
	<script src="../assets/users/js/jquery.js"></script>
	<script src="../assets/users/js/bootstrap.js"></script>
	<script src="../assets/users/js/custom.js"></script>
</head>
<body>
	<?php require_once('../functions/usersFunction.php') ?>

<!-- 	<div id="test"></div> -->





<?php
	} else {
		header('Location: ../index.php');
	}
	/*var_dump($_SESSION);*/
} ?>
