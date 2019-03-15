<?php
if(!session_start()){
session_start()	;
}else {
/*	var_dump($_SESSION);*/
} 
/*if(!isset($_SESSION['login']))
{
	header('location:../index.php');
}*/
$u_id = $_SESSION['login'];
include_once '../functions/usersFunction.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../assets/users/css/custom.css">

</head>
<body>
	<?php 
	/*require_once('functions.php');*/
	$id = $_GET['id'];

	$student_detail = getprofileById( $id );
	if ($student_detail->num_rows > 0) {
		    // output data of each row
		while($row = $student_detail->fetch_assoc()) {
			$id = $row['id'];
			$customer_name = $row['name'];
			$email = $row['email'];
			$postal = $row['postal'];
			$contact =$row['contact_num'];
			$birthdate = $row['dob'];
			$gender = $row['gender'];
			$password = $row['password'];

		    } //end of while
		} //end of if
		// debugger($gender);
		if( isset( $_POST['Update'] ) ){
			include '../connection.php';
			$id = $id;
			//$customer_name = $_POST['bcustomer_name'];
			$email = $_POST['bemail'];
			$postal = $_POST['bpostal'];
			$contact = $_POST['bcontact'];
			$birthdate = $_POST['bbirthdate'];
			$gender = $_POST['bgender'];
			$password = $_POST['bpassword'];

			$sql ="UPDATE `users` SET `email`='$email',`postal`='$postal',`contact_num`='$contact',`dob`='$birthdate',`gender`='$gender',`password`='$password' WHERE id='$id'";
			if($con->query($sql)==FALSE)
			{
				die("ERROR:".$con->error);
			}



			}
		?>
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
		<div class="animaledit_container">
			<div class="animaledit_box">
				<form action="" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<table border="1" >
						<tr>
							<th colspan="2" id = "details_dash">Edit Your Profile</th>
						</tr>
						<tr>
							<td>customer_name:</td>
							<td><input type="text" name="bcustomer_name" placeholder="Please Input customer_name Of Animal" required="required" value="<?php echo $customer_name; ?>"></td>
						</tr>
						<tr>
							<td>email:</td>
							<td><input type="text" name="bemail" placeholder="Please Input email Of Animal" required="required" value="<?php echo $email; ?>"></td>
						</tr>
						<tr>
							<td>postal:</td>
							<td><input type="text" name="bpostal" placeholder="Please Input postal Of Animal" required="required" value="<?php echo $postal; ?>"></td>
						</tr>
						<tr>
							<td>contact:</td>
							<td><input type="text" name="bcontact" placeholder="Please Input contact Of Animal" required="required" value="<?php echo $contact; ?>"></td>
						</tr>
						<tr>
							<td>birthdate:</td>
							<td><input type="text" name="bbirthdate" placeholder="Please Input gender Of Animal" required="required" value="<?php echo $birthdate; ?>"></td>	
						</tr>
						<tr>
							<td>gender:</td>
							<td><input type="radio" name="bgender" value="male"  <?php if( $gender=='male'){ echo "checked"; } ?> > Male <input type="radio" name="bgender" value="female"  <?php if( $gender=='female'){ echo "checked"; } ?>>female <input type="radio" name="bgender" value="others"  <?php if( $gender=='others'){ echo "checked"; } ?>>others </td>
						</tr>
						<tr>
							<td>Password:</td>
							<td><input type="password" name="bpassword" placeholder="Please Input password" required="required" value="<?php echo $contact; ?>"></td>
						</tr>
						<tr>
							<th colspan="2"><input type="submit" name="Update" value="Update"></th>
						</tr>
					</table>
				</form>

			</div>
		</div>
		<br>
<?php require_once('footer.php'); ?>
	