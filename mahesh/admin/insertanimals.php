
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
					<!-- <li><a href="animallist.php" class="Update_animal"><button>Animals</button></a></li> -->
					<li><a href="donationadmin.php" class="Update_animal"><button>Donation</button></a></li>
					<li><a href="logout.php" class="Update_animal"><button>Logout</button></a></li>
				</ul>
			</div>
		</div>
<?php
if( isset( $_POST['submit'] ) ){
require_once('../connection.php');

	$type = $_POST['atype'];
	$breed = $_POST['abreed'];
	$size = $_POST['asize'];
	$weight = $_POST['aweight'];
	$gender = $_POST['gender'];
	$amount = $_POST['aamount'];
	$image = $_FILES['aimage']['name'];
	$image = time().$image;
	$tempname = $_FILES['aimage']['tmp_name'];
	move_uploaded_file($tempname,"dataimg/$image");
	
$sql = "INSERT INTO animals( type, breed, size , weight , gender, amount, image, booking) VALUES ('$type', '$breed', '$size', '$weight', '$gender', '$amount', '$image','no') ";

	$result = mysqli_query($con,$sql);
		if($result == true){
		?>
		<script>
			alert('Data inserted succesfully!!');
		</script>
		<?php 
	}
} 
?>
<div class="insert_wrapper">
	<div class="view_insert">
		<a href="animallist.php"><button>View All Animals</button></a>
	</div>
	<form action="insertanimals.php" method="POST" enctype="multipart/form-data" class="table_dash">
		<div class="insert_dash">
		<table border="" align="center">
			<tr>
				<th colspan="2" id = "details_dash">Insert animal details</th>
			</tr>
			<tr>
				<td>Type:</td>
				<td><input type="text" name="atype" placeholder="Please Input Type Of Animal" required="required"></td>
			</tr>
			<tr>
				<td>Breed:</td>
				<td><input type="text" name="abreed" placeholder="Please Input Breed Of Animal" required="required"></td>
			</tr>
			<tr>
				<td>Size:</td>
				<td><input type="text" name="asize" placeholder="Please Input Size Of Animal" required="required"></td>
			</tr>
			<tr>
				<td>Weight:</td>
				<td><input type="text" name="aweight" placeholder="Please Input Weight Of Animal" required="required"></td>
			</tr>
			<tr>
				<td>Gender:</td>
				<td><input type="radio" name="gender" value="Male" checked="checked"> Male <input type="radio" name="gender" value="Female">Female </td>
			</tr>
			<tr>
				<td>Amount:</td>
				<td><input type="text" name="aamount" placeholder="Please Input Amount Of Animal" required="required"></td>	
			</tr>
			<tr>
				<td>Image:</td>
				<td><input type="file" name="aimage" placeholder="Please Input Weight Of Animal" required="required"></td>
			</tr>
			<tr>
				<th colspan="2"><input type="submit" name="submit" value="Add"></th>
			</tr>
		</table>
			</div>
	</form>
</div>
<?php require_once('footer.php');  ?>
	<?php } else {
		header('Location: ../index.php');
	}
	
} ?>