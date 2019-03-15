
<?php /*if(!session_start()){
	session_start()	;
}else {
	if($_SESSION['login'] != '' && $_SESSION['level'] == 1){*/

		?>

		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<title>Admin | Animals</title>
			<link rel="stylesheet" type="text/css" href="../css/custom.css">
			<script src="http://localhost/mahesh/assets/admin/js/custom.js"></script>
			
		</head>
		<body>
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
						<li><a href="index.php" class="Update_animal"><button>Home</button></a></li>
						<li><a href="donationadmin.php" class="Update_animal"><button>Donation</button></a></li>
						<li><a href="logout.php" class="Update_animal"><button>Logout</button></a></li>
					</ul>
				</div>
			</div>



			<section class="main">
				<div class="animallist_container">
					<div class="animallist_box">
						<div id="btn_insert">
							<a href="../admin/insertanimals.php"><button class="insert_button">Insert New Animals</button></a>
						</div>

						<table border="2">
							<tr>
								<td id="animal_lost" colspan="9" style="text-align: center;">Animal List </td>
							</tr>
							<tr>
								<td>#</td>
								<td>Type</td>
								<td>Breed</td>
								<td>Size</td>
								<td>Weight</td>
								<td>Gender</td>
								<td>Amount</td>
								<td>Image</td>
								<td>Booking</td>
								<td>Action</td>
							</tr>
							<?php

							$query2 = "select * from animals";
							$dogs = mysqli_query($con,$query2);
							if ($dogs) {
								$path = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
								$path .=$_SERVER["SERVER_NAME"]. dirname($_SERVER["PHP_SELF"]); 
					    // output data of each row
								$i=1;
								while($row = mysqli_fetch_array($dogs)) {
									$student_id = $row['id'];

									?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row['type']; ?></td>
										<td><?php echo $row['breed']; ?></td>
										<td><?php echo $row['size']; ?></td>
										<td><?php echo $row['weight']; ?></td>
										<td><?php echo $row['gender']; ?></td>
										<td><?php echo $row['amount']; ?></td>

										<td><img src="<?php echo $path."/dataimg/".$row['image']; ?>" height="50"></td>
										<td><?php echo $row['booking']; ?></td>

										<td><a href="animaledit.php?id=<?php echo $student_id; ?>">Edit</a> | <a href="animaldelete.php?id=<?php echo $student_id; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>
									</tr>
									<?php
									$i++; 
					    } //end iof while
					} //end of if 
					?>
				</table>
			</div>
		</div>
	</section>
	<?php require_once('footer.php');  ?>
	<?php /*} else {
		header('Location: ../index.php');
	}
	
}*/ ?>