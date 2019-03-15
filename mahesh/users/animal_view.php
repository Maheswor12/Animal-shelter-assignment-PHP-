<?php
$id = $_GET['ids'];

//$clicked = 243;
setcookie('clicked',$id);

include '../connection.php';

 //2 id clicked by user
$q = "select * from animals where id = '$id'";
$res = $con->query($q);
$data = $res->fetch_array();
?>
 <div style="width:400px; padding:20px; background:#ccc; float:left; margin:10px;">
 	<img src="<?php echo 'http://localhost/mahesh/'."admin/dataimg/".$data['image']; ?>" height="165">
    <h2><?php echo $data['breed']; ?></h2>
	  <p><?php echo $data['type']; ?></p>
	  <p><?php echo $data['size']; ?></p>
	   <p><?php echo $data['weight']; ?></p>
	    <p><?php echo $data['gender']; ?></p>

	 
  </div>
  <a href="index.php"><button>Back</button></a>



