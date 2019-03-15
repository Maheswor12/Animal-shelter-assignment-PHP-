
<?php
/*session_start();
if(!isset($_SESSION['u_id']))
{
	header('location:../index.php');
}
$u_id = $_SESSION['u_id'];*/
?>
<?php require_once('header.php') ?>
 	<?php

 	if( isset( $_POST['submit'] ) ){
 		$uname = $_POST['uname'];
 		$uemail = $_POST['uemail'];
 		$currency = $_POST['currency'];
 		$uamount = $_POST['uamount'];
 		$result = insertdon($uname ,$uemail ,$currency,$uamount);
		
		if($result){
			?>
			<script>
				alert("your some fund makes animal healthy!!!");
			</script>
			<?php 
				} // login conditon
				
			}
			?>
			<div class="index_wrapper">
				<header>
					<nav> 
						<img src="../assets/../assets/images/reg2.png" alt="default image" class = "index_img1" width="100px" height="42px">
						<div class="index_menu">	
							<ul>
								<li><a class="index_black" href="index.php" title="">HOME</a></li>
								<li><a class="index_black" href="forum.php" title="">Forum</a></li>
								<li><a class="index_black" href="profilelist.php" title="">Profile</a></li>
								<li><a class="index_red" href="" title="">Donation</a></li>
								<li><input class="searchbox" type="text" placeholder = "Search"/><button><b>Search</b></button></li>
								<li><a href="logout.php" title="">Logout</a></li>
							</ul>
						</div>
					</nav>
				</header>
				<div class="red_box">
				</div>
			</div>
			<div class="donation_box">
				<div class="donate" style="float: left;">
					<img src="../assets/images/tt.jpg" alt="default image" class = "donate_img1" width="500px" height="450px">
				</div>
				<div class="donate2" style="float: left;">
					<img src="../assets/images/rr.jpg" alt="default image" class = "don_img1" width="420px" height="450px">
				</div>
				<div class="form_donate">
					<title>Animal Donation Box</title>
					<style>
					@keyframes zoom {
						from {transform: scale(0)} 
						to {transform: scale(1)}
					}
				</style>
			</style>
			<body background="../background1.png">

				<button onclick="document.getElementById('modal-wrapper').style.display='block'" style="width:200px; margin-top:28px; margin-left:124px;">
				How to Donate</button>

				<div id="modal-wrapper" class="modal">

					<form class="modal-content animate" method="POST" action="">

						<div class="imgcontainer">
							<span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
							<img src="../assets/images/1.png" alt="Avatar" class="avatar">
							<h1 style="text-align:center">Animal Donation Box</h1>
						</div>

						<div class="popcontainer">
							<input type="text" placeholder="Enter Username" name="uname" required="required">
							<input type="text" placeholder="Enter Email" name="uemail" required="required">   

							<a href=""><img src="../assets/images/p.png" alt="default image" ></a>
							<a href=""><img src="../assets/images/m.png" alt="default image" ></a>
							<a href=""><img src="../assets/images/v.png" alt="default image" ></a>

							<select name="currency">
								<option value="USD" >USD</option>
								<option value="IDR" >IDR</option>
								<option value="Rs" >Rs</option>
								<option value="SAR" >SAR</option>
							</select>
							<input type="number" placeholder="Enter amount" name="uamount" required="required">
							<button type="submit" name="submit" value="submit">submit</button> 
						</div>

					</form>
				</div>
				<script>
					var modal = document.getElementById('modal-wrapper');
					window.onclick = function(event) {
						if (event.target == modal) {
							modal.style.display = "none";
						}
					}
				</script>


			</div>
		</div>
		<br><br>
		<div class="donaterequire" style="margin: -364px 0px 0px 950px;">
			<?php require_once('donateout.php'); ?>
		</div>
		
	<?php require_once('footer.php'); ?>