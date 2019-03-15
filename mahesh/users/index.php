<?php if(!session_start()){
session_start()	;

}else {
	if($_SESSION['login'] != '' && $_SESSION['level'] == 2){
?>
<?php 

 $uid=$_SESSION['uid'];
if (isset($_GET['idd'])) {
		include'../connection.php';
		  $id=$_GET['idd'];

		$update='UPDATE animals set booking="yes" where id='.$id;
		$con->query($update);
}
 ?>
<?php require_once '../connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User | Animals</title>
	<link rel="stylesheet" type="text/css" href="../assets/users/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/users/css/custom.css">
	<script src="../assets/users/js/jquery.js"></script>
	<script src="../assets/users/js/bootstrap.js"></script>
	<script src="../assets/users/js/custom.js"></script>
</head>
<body>
	<?php require_once('../functions/usersFunction.php') ?>

<?php
	} else {
		header('Location: ../index.php');
	}
	/*var_dump($_SESSION);*/
} ?>
<div class="index_wrapper">
		<header>
			<nav> 
				<img src="../assets/images/reg2.png" alt="default image" class = "index_img1" width="100px" height="42px">
				<div class="index_menu">	
					<ul>
						<li><a class="index_red" href="home.php" title="">HOME</a></li>
						<li><a class="index_black" href="forum.php" title="">Forum</a></li>
						<li><a class="index_black" href="profilelist.php" title="">Profile</a></li>
						<li><a class="index_black" href="donation.php" title="">Donation</a></li>
						<li><input class="searchbox" type="text" placeholder = "Search"/><button><b>Search</b></button></li>
						<li><a href="logout.php" title="">Logout</a></li>
					</ul>
				</div>
			</nav> 
		</header><!-- /header -->
		<div class="red_box">
		</div>
	</div>


<img src="../assets/images/5.jpg" alt="default image" width="1332px" height="500px">
<br><br>

<div class="out_product1">
	<h2 class="outproduct">New Animals</h2>
	<table>
		<tr>
			<?php
	$query2 = "select * from animals LIMIT 5";
	$dogs = mysqli_query($con,$query2);
	if ($dogs) {
			$path = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
			$path .=$_SERVER["SERVER_NAME"]. dirname($_SERVER["PHP_SELF"]); 
			if ($dogs) {
				while($row = mysqli_fetch_array($dogs)) {
					?>
					<td class="latestproduct">
						<div class="latestoutproducts">
							<h3 Class="new"><?php echo $row['breed']; ?></h3>
							<div class="outimage">
								<img src="<?php echo 'http://localhost/mahesh/'."admin/dataimg/".$row['image']; ?>" height="165">
							</div>
							<h4 Class="product_Nameout"><?php echo $row['type']; ?></h4>
							<p><?php echo $row['size']; ?><br>
								<?php echo $row['weight']; ?><br>
								<?php echo $row['gender']; ?>

							</p>
							<a href="animal_view.php?ids=<?php echo $row['id']; ?>">view</a>
							<p id = "priceoutin"><?php echo $row['amount']; ?></p>
							<?php
							$book=$row['booking'];

							 if ($book=='yes') {
								echo "<p>Already Ordered</p>";

							} else {
								echo "<a href='index.php?idd=".$row['id']."'>
							<button class='buy-button'><b>Order Now</b></button>
							</a>";
							}
							 ?>
							
						</div>
					</td>
					<?php
				}
			} 
		}
			?>


			</tr>
		</table>
	</div>
	<div>
		
 <h1>your browsing histories</h1>
 <?php 
 if(isset($_COOKIE['clicked']))
 {
  $clicke_id =  $_COOKIE['clicked']; //2
  $q = "select * from animals where id = '$clicke_id'";
  $res = $con->query($q);
  while($data=$res->fetch_array())
  {
    echo $data['breed'];
  }
 
 }
 else
 {
 echo "no browsing history";
 }
 ?>
 
 <a href="delete_cookie.php">delete history</a>
	</div>

	<?php  $query4 = "SELECT * FROM counter";
	$result1 = $con->query($query4);
	$data = $result1->fetch_assoc();
	echo "<h1 style='text-align: center; color: white; background:  black;font-style: sans-serif; font-size: 20px;text-align: center;'> User Visitor : ".$data['counter']."</h1>";
		# code...
	
?>
<br><br><br>
<!-- <div class="foot_box"> -->
	<div class="footer_wrapper">
		<div class="social">
			<div class="social_left">
				
				<span>Contact Us</span>	
				<div class="info_footer">
					<p>Spencer Animal Shelter (SAS) Pvt.Ltd</p>
					<ul>
						<li><img src="../assets/images/map.png" alt="Mountain View"/>Animal Bussiness Center, Jawalakhel Road, Lalitpur</li><br>
						<li><img src="../assets/images/email.png" alt="Mountain View"/> sales@animal.com.np, customercare@animal.com.np</li><br>
						<li><img src="../assets/images/mail.png" alt="Mountain View"/>  GPO Box: 8975 EPC 1674
						</li><br>
					</ul>
				</div>
				<div class="social_icons">

					<ul>
						<li><a href="https://www.facebook.com/html/"><img src="../assets/images/facebook.png" alt="Mountain View"/></a></li>
						<li><a href="https://www.twitter.com/html/" ><img src="../assets/images/twitter.png" alt="Mountain View"/></a></li>
						<li><a href="https://www.instagram.com/html/"><img src="../assets/images/instagram.png" alt="Mountain View"/></a></li>
						<li><a href="https://www.youtube.com/html/"><img src="../assets/images/youtube.png" alt="Mountain View"/></a></li>
					</ul>
				</div>
			</div>
			<div class = help_footer>
				<p>Help & Support</p>
				<ul>
					<li><img src="../assets/images/phone-book.png" alt="Mountain View"/>Phone Support</li>
					<li><img src="../assets/images/email.png" alt="Mountain View"/> Message Support</li>
					<li><img src="../assets/images/share.png" alt="Mountain View"/> share
					</li>
					<li><img src="../assets/images/support.png" alt="Mountain View"/>  Field Support
					</li>
				</ul>
			</div>
			<div class="company_footer">
				<p>Company</p>
				<ul>
					<li>About Us</li>
					<li>Contact Us</li>
					<li>Vacancy</li>
					<li>Privacy Policy</li>
					<li>Coupon</li>
				</ul>		
			</div>		
		</div>
	</div>
</body>
</html>