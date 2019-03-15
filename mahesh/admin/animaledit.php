
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
<?php 
				require_once('../connection.php');

if($_POST){

$id = $_POST['id'];
	$type = $_POST['atype'];
	$breed = $_POST['abreed'];
	$size = $_POST['asize'];
	$weight = $_POST['aweight'];
	$gender = $_POST['gender'];
	$amount = $_POST['aamount'];
	$image1 = $_POST['aimage'];



	$sql ="UPDATE `animals` SET `type`= '$type',`breed`='$breed',`size`='$size',`weight`='$weight',`gender`='$gender',`amount`='$amount', `image`='$image1' WHERE id='$id'";
	$result = mysqli_query($con,$sql);
	if($result){
		header("location: animaledit.php?id=".$id."");
	} else {
				echo '<script>alert("failed");</script>';

	}

}

	$id = $_GET['id'];
	$sql = "SELECT * FROM animals WHERE id=$id";
	$animal_detail = mysqli_query($con,$sql);	// var_dump($animal_detail);

	if ($animal_detail) {
		$path = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
		$path .=$_SERVER["SERVER_NAME"]. dirname($_SERVER["PHP_SELF"]);
		    // output data of each row
		while($row = mysqli_fetch_array($animal_detail) ) {
			$id = $row['id'];
			$type = $row['type'];
			$breed = $row['breed'];
			$size = $row['size'];
			$weight =$row['weight'];
			$gender = $row['gender'];
			$amount = $row['amount'];
			$image = $row['image'];
		    } //end of while
		} //end of if
		//debugger($gender);
		if( isset( $_POST['submit'] ) ){
			$image = $_FILES['aimage']['name'];
			$ext = end((explode(".", $image)));
			if(file_exists($_FILES['aimage']['tmp_name']) || is_uploaded_file($_FILES['aimage']['tmp_name'])) {
				$image1 = time().$image;
			}

			
			
			if (isset($image1) && $image1!=''){
				$old_img = $_POST['old_img'];
				$tempname = $_FILES['aimage']['tmp_name'];
				move_uploaded_file($tempname,"dataimg/$image1");
			}else{
				$image1 = $_POST['old_img'];
			}
			
			$data = array(
				'id' => $_POST['id'],
				'type' => $_POST['atype'],
				'breed' => 	$_POST['abreed'],
				'size'  => $_POST['asize'],
				'weight'  => $_POST['aweight'],
				'gender' => $_POST['gender'],
				'amount' => $_POST['aamount'],
				'image1'		=> $image1
			);
			$result = updateAnimal($data);
			if( $result ){
				header("Location: animallist.php");
			}
		} 
?>
	<div class="animaledit_container">
		<div class="animaledit_box">
			<form action="animaledit.php" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<table border="1" >
					<tr>
						<th colspan="2" id = "details_dash">Update animal details</th>
					</tr>
					<tr>
						<td>Type:</td>
						<td><input type="text" name="atype" placeholder="Please Input Type Of Animal" required="required" value="<?php echo $type; ?>"></td>
					</tr>
					<tr>
						<td>Breed:</td>
						<td><input type="text" name="abreed" placeholder="Please Input Breed Of Animal" required="required" value="<?php echo $breed; ?>"></td>
					</tr>
					<tr>
						<td>Size:</td>
						<td><input type="text" name="asize" placeholder="Please Input Size Of Animal" required="required" value="<?php echo $size; ?>"></td>
					</tr>
					<tr>
						<td>Weight:</td>
						<td><input type="text" name="aweight" placeholder="Please Input Weight Of Animal" required="required" value="<?php echo $weight; ?>"></td>
					</tr>
					<tr>
						<td>Gender:</td>
						<td><input type="radio" name="gender" value="Male" <?php if( $gender=='Male'){ echo 'checked'; } ?>> Male <input type="radio" name="gender" value="Female" <?php if( $gender=='Female'){ echo 'checked'; } ?>>Female </td>
					</tr>
					<tr>
						<td>Amount:</td>
						<td><input type="text" name="aamount" placeholder="Please Input Amount Of Animal" required="required" value="<?php echo $amount; ?>"></td>	
					</tr>
					<tr>
						<td>Image:</td>
						<td><input type="file" name="aimage"> <img src="<?php echo $path."/dataimg/".$image; ?>" height="50"><input type="hidden" name="aimage" value="<?php echo $image; ?>"></td>
					</tr>
					<tr>
						<th colspan="2"><input type="submit" name="submit" value="Update"></th>
					</tr>
				</table>
			</form>
				
		</div>
	</div>
<?php require_once('footer.php') ?>
	<?php } else {
		header('Location: ../index.php');
	}
	
} ?>