
<?php if(!session_start()){
session_start()	;
}else {
	if($_SESSION['login'] != '' && $_SESSION['level'] == 1){
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../assets/admin/css/custom.css">
</head>
<body>
	<?php
	require_once '../connection.php';?>
	<?php
	require_once 'index.php';?>
	<div class="animallist_container">
		<div class="animallist_box">
			<div id="btn_insert">
				<a href="insertanimals.php"><button class="insert_button">Insert New Animals</button></a>
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
					<td>Action</td>
				</tr>
				<?php
				$query2 = "select * from animals";
				$allStudent=mysqli_query($con,$query2);
				if ($allStudent) {
					$path = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
					$path .=$_SERVER["SERVER_NAME"]. dirname($_SERVER["PHP_SELF"]); 
					    // output data of each row
					$i=1;
					while($row = mysqli_fetch_array($allStudent)) {
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
		<?php require_once('footer.php') ?>
		<?php } else {
		header('Location: ../index.php');
	}
	
} ?>