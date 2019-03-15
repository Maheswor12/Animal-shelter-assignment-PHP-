<?php if(!session_start()){
	session_start()	;
}else {
	if($_SESSION['login'] != '' && $_SESSION['level'] == 1){

		?>

<?php 

require_once('../connection.php');
$id = $_GET['id'];
$sql = "DELETE FROM animals WHERE id=$id";
$result = mysqli_query($con,$sql);
if( $result ){
	header("Location: animallist.php");
} else {
	echo "<script>alert('failed to delete');</script>";
}
?>
<?php } else {
		header('Location: ../index.php');
	}
	
} ?>
