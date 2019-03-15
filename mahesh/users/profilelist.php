<?php
if(!session_start()){
session_start()	;
}else {
	/*var_dump($_SESSION);*/
} 
if(!isset($_SESSION['login']))
{
	header('location:../index.php');
}
$u_id = $_SESSION['login'];
include_once '../functions/usersFunction.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Spencer Animal Shelter (SAS)</title>
	<link rel="stylesheet" type="text/css" href="../assets/users/css/custom.css">
</head>
</head>
<body>
	<div class="index_wrapper">
		<header>
			<nav> 
				<img src="../assets/images/reg2.png" alt="default image" class = "index_img1" width="100px" height="42px">
				<div class="index_menu">	
					<ul>
						<li><a class="index_black" href="index.php" title="">HOME</a></li>
						<li><a class="index_black" href="forum.php" title="">Forum</a></li>
						<li><a class="index_red" href="profilelist.php" title="">Profile</a></li>
						<li><a class="index_black" href="donation.php" title="">Donation</a></li>
						<li><input class="searchbox" type="text" placeholder = "Search"/><button><b>Search</b></button></li>
						<li><a href="logout.php" title="">Logout</a></li>
					</ul>
				</div>
			</nav>
		</header>
		<div class="red_box">
		</div>
	</div>

	<?php /*
require_once('functions.php');*/
	$allStudent = listprofile($u_id);

	?>
	<div class="animallist_container">
		<div class="animallist_box">
			<table border="8">
				<tr>
					<td id="animal_lost" colspan="9" style="text-align: center; color: white; background: black;font-style: sans-serif; font-size: 20px;"><p>Edit Your Profile</p></td>
				</tr>
				<tr>
					<!-- <td>#</td> -->
					<td  style="text-align: center; color: white; background:  #1aff1a;font-style: sans-serif; font-size: 20px;text-align: center;"><b>Customer Name</b></td>
					<td style="text-align: center; color: white; background:  #1aff1a;font-style: sans-serif; font-size: 20px;text-align: center;"><b>Email</b></td>
					<td style="text-align: center; color: white; background:  #1aff1a;font-style: sans-serif; font-size: 20px;text-align: center;"><b>Postal</b></td>
					<td style="text-align: center; color: white; background:  #1aff1a;font-style: sans-serif; font-size: 20px;text-align: center;"><b>Contact</b></td>
					<td style="text-align: center; color: white; background:  #1aff1a;font-style: sans-serif; font-size: 20px;text-align: center;"><b>Birthdate</b></td>
					<td style="text-align: center; color: white; background:  #1aff1a;font-style: sans-serif; font-size: 20px;text-align: center;"><b>Gender</b></td>
					<td style="text-align: center; color: white; background:  #1aff1a;font-style: sans-serif; font-size: 20px;text-align: center;"><b>Password</b></td>
					<td style="text-align: center; color: white; background:  black;font-style: sans-serif; font-size: 25px;text-align: center;"><b>Action</b></td>
				</tr>
				<?php
				if ($allStudent) {
					    // output data of each row
					$i=1;
					while($row = mysqli_fetch_array($allStudent)) {
						$student_id = $row['id'];

						?>
						<tr>
							<!-- <td><?php echo $i; ?></td> -->
							<td style="text-align: center; color: white; background: #003300
							;font-style: sans-serif; font-size: 20px;text-align: center;"><?php echo $row['name']; ?></td>
							<td style="text-align: center; color: white; background:  #003300;font-style: sans-serif; font-size: 20px;text-align: center;"><?php echo $row['email']; ?></td>
							<td style="text-align: center; color: white; background:  #003300;font-style: sans-serif; font-size: 20px;text-align: center;"><?php echo $row['postal']; ?></td>
							<td style="text-align: center; color: white; background:  #003300;font-style: sans-serif; font-size: 20px;text-align: center;"><?php echo $row['contact_num']; ?></td>
							<td style="text-align: center; color: white; background:  #003300;font-style: sans-serif; font-size: 20px;text-align: center;"><?php echo $row['dob']; ?></td>
							<td style="text-align: center; color: white; background:  #003300;font-style: sans-serif; font-size: 20px;text-align: center;"><?php echo $row['gender']; ?></td>
							<td style="text-align: center; color: white; background:  #003300;font-style: sans-serif; font-size: 20px;text-align: center;"><?php echo $row['password']; ?></td>
							<td style="text-align: center; color: white;font-style: sans-serif; font-size: 25px;text-align: center;"><a href="profileedit.php?id=<?php echo $student_id; ?>" onclick="return confirm('Are you sure you want to Edit this item?');">Edit</a></td>
						</tr>
						<?php
						$i++; 
					    } //end iof while
					} //end of if 
					?>
				</table>
			</div>
		</div>

		<br>
		<?php require_once('footer.php'); ?>