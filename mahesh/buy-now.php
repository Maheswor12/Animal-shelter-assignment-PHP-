<?php  require_once('header.php'); ?>
<?php
if( $_SESSION['user_id']==''){
	header('Location: users/register.php');
} 
?>
