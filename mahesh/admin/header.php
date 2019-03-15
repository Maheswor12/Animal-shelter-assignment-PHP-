<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin | Animals</title>
	<!-- <link rel="stylesheet" type="text/css" href="../assets/admin/css/bootstrap.css"> -->
	<link rel="stylesheet" type="text/css" href="../assets/admin/css/custom.css">
	<!-- <script src="../assets/admin/js/jquery.js"></script>
		<script src="../assets/admin/js/bootstrap.js"></script> -->
		<script src="../assets/admin/js/custom.js"></script>
	</head>
	<body>
		<?php
		if (!isset($_SESSION)) session_start();
		if( $_SESSION['user_id']=='' ){
			header( "Location: index.php");
		}

		?>
		<?php require_once('../functions/adminFunction.php') ?>
		<div class="animal_wrapper">
			<div class="welcome_animal">
				<span>Welcome Admin Section Of Animals</span>
			</div>
		</div>
		<div class="admin_wrapper">
			<div id="admin_sidebar">
				<div class="admin_toggle_btn" onclick="togglesidebar()">
					<span></span>
					<span></span>
					<span></span>
				</div>
				<ul>
					<li><img src="../assets/images/reg2.png" alt="default image" class = "header_img1"></li>
					<li><span>Admin</span></li>
					<li><a href="dashboard.php" class="Update_animal"><button>Home</button></a></li>
					<li><a href="animallist.php" class="Update_animal"><button>Animals</button></a></li>
					<li><a href="animals-booking.php" class="Update_animal"><button>Animals Booking</button></a></li>
					<li><a href="donationadmin.php" class="Update_animal"><button>Donation</button></a></li>
					<li><a href="logout.php" class="Update_animal"><button>Logout</button></a></li>
				</ul>
			</div>
		</div>