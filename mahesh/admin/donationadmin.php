<?php if(!session_start()){
	session_start()	;
}else {
	if($_SESSION['login'] != '' && $_SESSION['level'] == 1){

		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<title>Admin | Animals</title>
			<link rel="stylesheet" type="text/css" href="../assets/admin/css/custom.css">
			<script src="../assets/admin/js/custom.js"></script>
		</head>
		<body>
			
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



			<div class="animallist_container">
				<div class="animallist_box">

					<table border="2">
						<tr>
							<td id="animal_lost" colspan="9" style="text-align: center;">Donation List </td>
						</tr>
						<tr>
							<td>#</td>
							<td>Username</td>
							<td>Email</td>
							<td>Currency</td>
							<td>Amount</td>
						</tr>
						<?php
						require_once('../connection.php');
						$sql = "SELECT * FROM donation ORDER BY id desc";
						$result = mysqli_query($con,$sql);
						if ($result) {
							$path = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
							$path .=$_SERVER["SERVER_NAME"]. dirname($_SERVER["PHP_SELF"]); 
					    // output data of each row
							$i=1;
							while($row = mysqli_fetch_array($result)) {
								$student_id = $row['id'];

								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['username']; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td><?php echo $row['currency']; ?></td>
									<td><?php echo $row['amount']; ?></td>
								</tr>
								<?php
								$i++; 
					    } //end iof while
					} //end of if 
					?>
					<?php 
				$qry1 = "Select SUM(amount) AS sum from donation";
				$data1 = $con->query($qry1);
				while ($query1 = $data1->fetch_assoc() ) {
					echo "<b style='text-align: center; margin:100px 0px 0px 100px; color: white; background:  #1aff1a;font-style: sans-serif; font-size: 20px;text-align: center;'' >Total donation is:</b>".$sum=$query1["sum"]."<br>";

				}

				?>
				</table>

			</div>
			
		</div>
		

		<?php } else {
			header('Location: ../index.php');
		}

	} ?>