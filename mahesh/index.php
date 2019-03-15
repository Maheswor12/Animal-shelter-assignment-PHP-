<?php 
//homw page
 $conn = new mysqli("localhost","root","");
 if(!mysqli_select_db( $conn, 'mahesh')){
 	include 'dwassignment.php';
 	setpage();
 }?>


<?php
include "connection.php";
if(isset($_COOKIE['count']) &&  $_COOKIE['count']>3)
     {

     die('You are Blocked For 5 Minute');
     

   }
   if (isset($_GET['error'])) {
            echo '<script> alert("'.$_GET['error'].'")</script>';
   }


      if(isset($_GET['msg']))
      {
        echo '<script> alert("'.$_GET['msg'].'")</script>';
      }
     
   
      ?>







<?php if(!session_start()){
	session_start()	;
}else {
	/*var_dump($_SESSION);*/
} 
/*var_dump($_SESSION);*/
require_once 'connection.php';
if( isset( $_POST['login'] ) ){

	
	
		$email = $_POST['email'];
	$pwd=$_POST['password'];
	$select="SELECT * FROM users WHERE username='$email'";
	$result=$con->query($select);
	$data=$result->fetch_assoc();

	$reg_date=$data['reg_date'];

	$login=strtotime($reg_date);
	$today=date("Y-m-d");
	$toda=strtotime($today);
	$difference=(($toda-$login)/(60*60*24*30));
	if($difference>24)
	{	
		$delete_date="delete from users where username='$email'";
		$con->query($delete_date);
		

		header('location:index.php?msg');
	

	}
	else{
	$email = $_POST['email'];
	$query = "select * from users where username='$email'";
	$user = mysqli_query($con,$query);
	$result = mysqli_fetch_assoc($user);
	if($result['password'] == md5($_POST['password'])){
		$_SESSION['login'] = $result['username'];
		$_SESSION['uid'] = $result['id'];
		$_SESSION['level'] = $result['user_type'];
		if($result['user_type']== 1) {	
			header('Location: admin/index.php');
		} else if($result['user_type']== 2) {
			$todayDate= date("Y-m-d");
               $updateDate="UPDATE users set reg_date='$todayDate' WHERE username='$email'";
               $con->query($updateDate);
			header('Location: users/index.php');
			$query4 = "UPDATE counter SET counter=counter+1";
			$con->query($query4);
		}
	}
	else{

		if(isset($_COOKIE['count']))
            {
            $count = $_COOKIE['count']+1;
            setcookie('count',$count,time()+300); // saves new data
            header('location:index.php?error=Email or Password Do not match');
            }
            else
            {
            setcookie('count',1); //// first time
              header('location:index.php?error=Email or Password Do not match');
            }

	}}

}

?>
<?php require_once('functions/publicFunction.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Animals</title>
	<link rel="stylesheet" type="text/css" href="assets/public/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/public/css/custom.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>

	#box img{
		width: 100%;
		height: 500px;
	}
	#slider{
		width: 1310px;
		height: 500px;
		margin: 20px auto;
		position: relative;
		border: 10px solid white;
		box-shadow: 0px 0px 5px 2px #ccc;
	}
	.slider_button button{
		padding: 20px;
		border: none;
		background: #37f;
		font-size: 30px;
		color: white;
		position: absolute;
		top:45%;
		cursor: pointer;
	}

	.next{
		border-radius: 10px 0px 0px 10px;
		margin-left: 1245px;
	}
	.prew{
		border-radius: 0px 10px 10px 0px;
	}

</style>
</head>
<body>

	<div class="index_wrapper">
		<header>
			<nav> 
				<div class="index_menu">	
					<ul>
						<li><a class="index_red" href="index.php" title="">HOME</a></li>
						
						<li><a class="index_black" href="rss/index.php" title="">RSS</a></li>
						<?php if(!isset($_SESSION['login'])){ ?><li><a class="index_black"  href="users/register.php">Sign Up</a></li> <?php } ?>
						
						<?php if(isset($_SESSION['login'])){ ?>
						
						<li><a class="index_black" href="" title="">Forum</a></li>
						<li><a class="index_black" href="profilelist.php" title="">Profile</a></li>
						<li><a class="index_black" href="donation.php" title="">Donation</a></li>
						<li><input class="searchbox" type="text" placeholder = "Search"/><button><b>Search</b></button></li>
						<li><a href="logout.php" title="">Logout</a></li>
						<?php } else { ?>
						<form action="index.php" method="POST" accept-charset="utf-8">

							<fieldset>
								<div class="email_input">
									
									<input type="text"  name="email" id="mail" autocomplete="off" placeholder="Enter your username">
									
								</div>
							</fieldset>
							<fieldset>
								<div class="password_input">
									
									<input type="password" id="pass" name="password" autocomplete="off" placeholder="Enter your password">
									
								</div>
							</fieldset>
							<div class="login_submit">
								<input type="submit" name="login" id="sub" value="Login">
							</div>		 				
						</form>
						
						
						

						<?php } ?>
					</ul>
				</div>
			</nav> 
		</header><!-- /header -->
		<div class="red_box">
		</div>
	</div>

	<div class="login_wrapp">
		<header>
			<nav>
				<img src="assets/images/reg2.png" alt="default image" class = "login_img1" width="100px" height="42px">
				<div class="log_ultag">

					<div class="login_image2">
					</div>
				</div>
			</nav>
		</header><!-- /header -->
	</div>



	<div id="slider">
		<div id="box">
			<img src="jsslider/a.jpg">
		</div>
		<div class="slider_button">
			<!-- buttons for controls slider -->
			<button class="prew fa fa-chevron-left" onclick="prewImage()"></button>
			<button class="next fa fa-chevron-right" onclick="nextImage()"></button>
		</div>
	</div>

	<div class="home_wrapper">
		<h2 Class="home_product">Upcoming Animals</h2>
		<div class="categories">
			<table >
				<tr>
					<td><img src="assets/images/hh.jpg" alt="Mountain View" /><br>Guinea pigs</td>
					<td><img src="assets/images/ff.jpg" alt="Mountain View" /><br>Sheep</td>
					<td><img src="assets/images/gh.jpg" alt="Mountain View" /><br>Mice</td>
					<td><img src="assets/images/as.jpg" alt="Mountain View" /><br>Mice</td>
					<td><img src="assets/images/op.jpg"  alt="Mountain View"/><br>Sheep</td>
					<td><img src="assets/images/tr.jpg"  alt="Mountain View"/><br>Bull Dog</td>
					<td><img src="assets/images/1.jpg" alt="Mountain View" /><br>German Dog</td>

				</tr>
				<tr>
					<td><img src="assets/images/yy.jpg" alt="Mountain View" /><br>Goat</td>
					<td><img src="assets/images/we.jpg" alt="Mountain View" /><br>Cat</td>
					<td><img src="assets/images/uj.jpg" alt="Mountain View" /><br>Goat</td>
					<td><img src="assets/images/sd.png" alt="Mountain View" /><br>Cat</td>
					<td><img src="assets/images/rf.jpg" alt="Mountain View" /><br>Himalayan Goat</td>
					<td><img src="assets/images/1.jpg" alt="Mountain View" /><br>puppy</td>
					<td><img src="assets/images/1.jpg" alt="Mountain View" /><br>puppy</td>
				</tr>
			</table>
		</div>
	</div>


	<div class="out_product1">
		<h2 class="outproduct">New Animals</h2>
		<table>
			<tr>
				<?php
				$query2 = "select * from animals LIMIT 5";
				$dogs = mysqli_query($con,$query2);




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
								<p id = "priceoutin"><?php echo $row['amount']; ?></p>
								<a href="users/register.php">
									<button class="buy-button"><b>Buy</b></button>
								</a>
							</div>
						</td>
						<?php
					}
				} 
				?>


			</tr>
		</table>
	</div>

	<!-- <div class="foot_box"> -->
		<div class="footer_wrapper">
			<div class="social">
				<div class="social_left">

					<span>Contact Us</span>	
					<div class="info_footer">
						<p>Spencer Animal Shelter (SAS) Pvt.Ltd</p>
						<ul>
							<li><img src="assets/images/map.png" alt="Mountain View"/>Animal Bussiness Center, Jawalakhel Road, Lalitpur</li><br>
							<li><img src="assets/images/email.png" alt="Mountain View"/> sales@animal.com.np, customercare@animal.com.np</li><br>
							<li><img src="assets/images/mail.png" alt="Mountain View"/>  GPO Box: 8975 EPC 1674
							</li><br>
						</ul>
					</div>
					<div class="social_icons">


						<ul>
							<li><a href="https://www.facebook.com/html/"><img src="assets/images/facebook.png" alt="Mountain View"/></a></li>
							<li><a href="https://www.twitter.com/html/" ><img src="assets/images/twitter.png" alt="Mountain View"/></a></li>
							<li><a href="https://www.instagram.com/html/"><img src="assets/images/instagram.png" alt="Mountain View"/></a></li>
							<li><a href="https://www.youtube.com/html/"><img src="assets/images/youtube.png" alt="Mountain View"/></a></li>
						</ul>
					</div>
				</div>
				<div class = help_footer>
					<p>Help & Support</p>
					<ul>
						<li><img src="assets/images/phone-book.png" alt="Mountain View"/>Phone Support</li>
						<li><img src="assets/images/email.png" alt="Mountain View"/> Message Support</li>
						<li><img src="assets/images/share.png" alt="Mountain View"/> share
						</li>
						<li><img src="assets/images/support.png" alt="Mountain View"/>  Field Support
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

		<script type="text/javascript">

			var slider_content = document.getElementById('box');

  	// contain images in an array
  	var image = ['e','b', 'd'];

  	var i = image.length;


    // function for next slide 

    function nextImage(){
    	if (i<image.length) {
    		i= i+1;
    	}else{
    		i = 1;
    	}
    	slider_content.innerHTML = "<img src=jsslider/"+image[i-1]+".jpg>";
    }


    // function for prew slide

    function prewImage(){

    	if (i<image.length+1 && i>1) {
    		i= i-1;
    	}else{
    		i = image.length;
    	}
    	slider_content.innerHTML = "<img src=jsslider/"+image[i-1]+".jpg>";

    }

    
  // script for auto image slider

  setInterval(nextImage , 4000);

</script>



</body>
</html>
