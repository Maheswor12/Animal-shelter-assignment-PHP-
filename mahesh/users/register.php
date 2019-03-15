<!DOCTYPE html>
<html>
<head>
	<title>Registration form</title>
	<link rel="stylesheet" type="text/css" href="../assets/users/css/custom.css">
</head>
<body>
	<?php
	require_once("../connection.php");
	if( isset( $_POST['submit'] ) ){
		$data = array();
		$day = $_POST['day'];
		$months = $_POST['months'];
		$year = $_POST['year'];
		$Birthday = $year."/".$months."/".$day;
		$data['name'] = $_POST['customer'];
		$data['email'] = $_POST['email'];
		$data['postal'] = $_POST['Postal'];
		$data['number'] = $_POST['Contact'];
		$data['dob'] = $Birthday;
		$data['gender'] = $_POST['gender'];
		$data['username'] = $_POST['username'];
		$reg_date=date("Y-m-d");
		$password = md5($_POST['Password']);
		$data['password'] = $password;
		$password = md5($_POST['Password']);
		$repassword = md5($_POST['Re-enter_Password']);
		if ($repassword != $password) {
			?>
			<script>
				alert("password donot match!!");
			</script>
			<?php 
		}else{
			$email = $data['email'];
	$name = $data['name'];
	$postal = $data['postal'];
	$number = $data['number'];
	$dob = $data['dob'];
	$gender = $data['gender'];
	$username = $data['username'];
	$password = $data['password'];
	
	
	$qry = "INSERT INTO users (email, postal, contact_num, dob, gender, name, username, password, user_type,reg_date) VALUES ('$email','$postal','$number','$dob','$gender','$name','$username','$password', '2','$reg_date')";
	/*echo "<pre>";
	var_dump( $data);
	echo "</pre>";
	die();*/
	
	$result = mysqli_query($con,$qry);

			if($result){
				?>
				<script>
					alert("data inserted successfully!!");
				</script>
				<?php 
				}else{


					if (!isset($_SESSION)) session_start();
					
					while ($row = mysqli_fetch_array($result)) {
						
						$_SESSION['user_id']=$row['id'];
						
					}
					
					
					}  // login conditon

				
			}
		}
		?>
		<div class ="register_wrapper">

			<div class="container">
				<img src="../assets/images/reg2.png" alt="default image" class = "reg_img1" width="100px">
				<h1>Create a new account</h1>
				<form action="#" onsubmit="return validation()" id="theform" class="register-form" method="POST" accept-charset="utf-8">
					<div class = register_text>
						<div>
							<label for="fname">Customer Name:</label><br>
							<input type = "text" id="fname" name="customer"  placeholder="Enter Full Name" autocomplete="off" required><br>
							<span class id="username" ></span>
						</div>	
						<div>
							<label for="username1">Username:</label><br>
							<input type = "text" id="username1" name="username"  placeholder="Enter Username" autocomplete="off" required><br>
							<span class id="username1" ></span>
						</div>
						<div> 
							<label for="email">Email Address</label><br>
							<input type="email" id="email" name="email" placeholder="Enter Email Address" autocomplete="off" required><br>
							<span class id="eemail" ></span>

						</div>
						<div>
							<label for="postal">Postal Address</label><br>
							<input type = "text" name="Postal" id="postal"  placeholder="Enter Postal Address" autocomplete="off" required><br>
							<span class id="ppostal" ></span>

						</div>
						<div>
							<label for="number">Contact Number</label><br>

							<input type = "number" id="number" name="Contact"  placeholder="Enter Contact Number" autocomplete="off" required><br>					
							<span class id="nnumber" ></span>

						</div>
						<div>
							<label>Birthday<span class>*</span></label>
							<select name="day">
								<option value="" >--Day--</option>
								<?php
								for($i=1;$i<=31; $i++){
									echo "<option value='".$i."'>".$i."</option>";
								} 
								?>
							</select>
							<select name="months">
								<option value="">--Months--</option>
								<?php
								for($i=1;$i<=12; $i++){
									echo "<option value='".$i."'>".$i."</option>";
								} 
								?>
							</select>
							<select name="year">
								<option value="">--Year--</option>
								<?php
								$now_date = date('Y');
								for($i=$now_date ;$i>=1960; $i--){
									echo "<option value='".$i."'>".$i."</option>";
								} 
								?>
							</select><br><br>
						</div>
						<div>
							<label for="">Gender<span class>*</span></label>
							<br>

							<div class="gender">
								<input type="radio" name="gender" id="male" value="male" checked> <label for="male">Male</label>
								<input type="radio" name="gender" id="female" value="female"><label for="female">Female</label>
								<input type="radio" name="gender" id="others" value="others"> <label for="others">Others</label>
							</div><br>
						</div>
						<div>
							<label for="Enter">Password</label>

							<input type = "password" id="pass" name="Password"  placeholder="Enter Password" autocomplete="off" required><br>
							<span class id="password" ></span>

						</div>
						<div>
							<label for="re">Re Enter Password</label>
							<input type = "password" name="Re-enter_Password" id="re"  placeholder="Enter Re Enter Password" autocomplete="off" required><br>
							<span class id="repass" ></span>

						</div>
					</div>
					<div class="reg_submit">
						<input type="submit" name="submit" id="submit" value="Sign Up" autocomplete="off">
					</div>
					<span class="reg_already">Already have an account?</span><a href="../index.php" class="reg_last">Login</a>
				</form>
			</div>
		</div>
	<!-- 	<script type="text/javascript">
		function validation(){
	
			var user = document.getElementById('fname').value;
			var uemail = document.getElementById('email').value;
			var upostal = document.getElementById('postal').value;
			var ucontact = document.getElementById('number').value;
			var upass = document.getElementById('pass').value;
			var ure = document.getElementById('re').value;
	
			if (user == "") {
				document.getElementById('username').innerHTML = "**Please fill the Customer Name";
				return false;
			}
			if ((user.length <= 2) ||(user.length > 20)){
				document.getElementById('username').innerHTML = "**User length must be between 2 and 20";
				return false;
			}
			if(!isNAN(user)){
				document.getElementById('username').innerHTML = "**Only character are allowed";
				return false;
			}
	
	
	
	
	
	
	
	
	
	
			if (uemail == "") {
				document.getElementById('eemail').innerHTML = "**Please fill the Email Address";
				return false;
	
			}
			if ((uemail.length <= 5) ||(uemail.length > 20)){
				document.getElementById('eemail').innerHTML = "**Email length must be between 2 and 20";
				return false;
			}
			if (uemail.indexOf('@')<= 0) {
				document.getElementById('eemail').innerHTML = "**@ Invalid Position ";
				return false;
			}
			if ((uemail.charAt(uemail.length-4)!='.') $$ (uemail.charAt(uemail.length-3)!='.')){
				document.getElementById('eemail').innerHTML = "** Invalid Position ";
				return false;
			}
	
	
	
	
	
			if (upostal == "") {
				document.getElementById('ppostal').innerHTML = "**Please fill the Postal Address";
				return false;
	
			}
	
	
	
	
			if (ucontact == "") {
				document.getElementById('nnumber').innerHTML = "**Please fill the Contact Number";
				return false;
	
			}
			if(isNAN(ucontact)){
				document.getElementById('nnumber').innerHTML = "** Users must write digits only not characters";
				return false;
			}
			if(ucontact.length!=10){
				document.getElementById('nnumber').innerHTML = "** Contact number must be 10 digits only";
				return false;
			}
	
	
	
	
	
	
			if (upass == "") {
				document.getElementById('password').innerHTML = "**Please fill the Password";
				return false;
	
			}
			if ((upass.length <= 5) ||(upass.length > 20)){
				document.getElementById('password').innerHTML = "**Password length must be between 5 and 20";
				return false;
			}
			if (upass!= ure) {
				document.getElementById('password').innerHTML = "**Password  are not matched";
				return false;
			}
	
			if (ure == "") {
				document.getElementById('repass').innerHTML = "**Please fill the Confirmed Password";
				return false;
	
			}
		}
	
	</script> -->

<!-- 
	<form action="" id="theform" class="register-form" method="POST" accept-charset="utf-8" onsubmit="return validatetext();"> -->