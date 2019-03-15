<?php  require_once('header.php'); ?>
<?php
	$id = $_GET['id'];
	$animals_details = getDogById($id);
	$path = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
	$path .=$_SERVER["SERVER_NAME"]. dirname($_SERVER["PHP_SELF"]);
	if ($animals_details && $animals_details->num_rows > 0) {
		while($row = mysql_fetch_array($animals_details)) {
?>
	<img src="<?php echo $path."/admin/dataimg/".$row['image']; ?>" height="180">
	<a href="buy-now.php?id=<?php echo $row['id']; ?>">Buy Now</a>
<?php
		}
	} 
?>
<?php  require_once('footer.php'); ?>
