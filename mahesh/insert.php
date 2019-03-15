<?php
require_once('connection.php');
 $email=$_POST['email'];
if ($_SERVER['REQUEST_METHOD']=="POST")
   
{
    $error =  array();

    if(!empty($_POST['username'])){
        $username=$_POST['username'];
    }else{
        $error['username']= "This is required field";
    }
    if(!empty($_POST['postalcode'])){
        $postalcode=$_POST['postalcode'];
    }else{
        $error['postalcode']= "This is required field";
    }
    if(!empty($_POST['postaladdress'])){
        $postaladdress = $_POST['postaladdress'];
    }else{
        $error['postaladdress'] = "This is required field";
    }

    if(!empty($_POST['contactnumber'])){
        $contactnumber = $_POST['contactnumber'];
    }else{
        $error['contactnumber']= "This is required field";
    }
    if(!empty($_POST['gender'])){
        $gender=$_POST['gender'];
    }else{
        $error['gender']= "This is required field";
    }
    if(!empty($_POST['email'])){
        $email=$_POST['email'];
    }else{
        $error['email']= "This is required field";
    }

    if(!empty($_POST['password']) ){
        $password=$_POST['password'];
    }else{
        $error['password']= "This is required field";
    }

    if(!empty($_POST['rpass']) ){
        $rpass=$_POST['rpass'];
    }else{
        $error['rpass']= "This is required field";
    }


   /* if($password === $rpass){
        $password = md5($password);
    }else{
        $error['passwordnotmatch'] = "Password doesnt matches.";
    }*/
    $userrole = "subscriber";
?>
<?php 
   
    $qry = "INSERT INTO users VALUES ('$email','$postal','$number','$dob','$gender','$name','$username','$password', '2')";
    /*echo "<pre>";
    var_dump( $data);
    echo "</pre>";
    die();*/
    
    $result = $con->query($qry);

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
                        // echo "<pre>";
                        // var_dump( $_SESSION['user_id']);
                        // echo "</pre>";
                    }
                    
                    //header( "Location: index.php");
                    }  // login conditon

                
            }
        



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Register</title>
<link rel="stylesheet" href="Public/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Public/bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="Public/bootstrap/css/style.css">
</head>
<body>
<nav class="loginNav navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">


            <a class="navbar-brand" href="#" style="font-weight: bold; color: #ffffff;">
                Spencer-Animal-Shelter
                <a href="home.php"><i class="fa fa-chevron-circle-left"></i></a>
            </a>
        </div>

    </div>
</nav>

    <div class="container" id="wrapper">

            <div class="row">

    <div class="col-xs-12">
        <h2>Sign Up</h2>
        <form action="" method="post" onsubmit="return Validate()" name="vform">
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" class="form-control" id="name" name="username" placeholder="Enter Your Name"/><br>
                <div id="username_error" class="val-error"></div>
<!--                --><?php
//                $username = $_GET['username'];
//                $sql = ("SELECT * FROM users WHERE username = '$username'  ");
//                $result = $helpers->db_query($sql);
//                if($result[0]){
//                    echo "Username Already Exists!!";
//                }else{
//                    echo " Username is Available";
//                }

error_reporting(0);
                ?>
            </div>
                <div class="form-group">
                <label for="postcode">Postal Code</label>
                <input type="number" class="form-control" id="postcode" name="postalcode" placeholder="Enter Your Postal Code" /><br>
                    <div id="postalcode_error" class="val-error"></div>
            </div>
            <div class="form-group">
                <label for="postadd">Postal Address</label>
                <input type="text" class="form-control" id="postadd" name="postaladdress" placeholder="Enter Your Permanent Address" /><br>
                <div id="postaladdress_error" class="val-error"></div>
            </div>
                       <div class="form-group">
                <label for="contact">Contact Number</label>
                <input type="number" class="form-control" id="contact" name="contactnumber" placeholder="Enter Your Contact Number" /><br>
                           <div id="contact_error" class="val-error"></div>
            </div>
            <div class="form-group">
                <label for="">Gender</label> <br>
                <input type="radio" name="gender" id="gender"value="male">&ensp;Male
                <input type="radio" name="gender" id="gender" value="female">&ensp;Female
                <input type="radio" name="gender" id="gender" value="others">&ensp;Others
                <div id="gender_error" class="val-error"></div>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email Address"/><br>
                <div id="email_error" class="val-error"></div>
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password"/><br>
                <div id="password_error" class="val-error"></div>

            </div>
            <div class="form-group">
                <label for="rpass">Confirm Password</label>
                <input type="password" class="form-control" name="rpass" id="rpass" placeholder="Re-Enter Your Password" onchange="checkpw()"/><br>
                <div id="rpass_error" class="val-error"></div>
            </div>
            <div class="form-group">
                <button class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Register User</button>
            </div>
        </form>
    </div>
    </div>
</body>
</html>
<script type="text/javascript">
    var username = document.forms["vform"]["username"];
    var postalcode = document.forms["vform"]["postalcode"];
    var postaladdress = document.forms["vform"]["postaladdress"];
    var contact = document.forms["vform"]["contact"];
    var gender = document.forms["vform"]["gender"];
    var email = document.forms["vform"]["email"];
    var password = document.forms["vform"]["password"];
    var rpass = document.forms["vform"]["rpass"];

    var username_error = document.getElementById("username_error");
    var postalcode_error = document.getElementById("postalcode_error");
    var postaladdress_error = document.getElementById("postaladdress_error");
    var contact_error = document.getElementById("contact_error");
    var gender_error = document.getElementById("gender_error");
    var email_error = document.getElementById("email_error");
    var password_error = document.getElementById("password_error");

    username.addEventListener("blur",usernameVerify,true);
    postalcode.addEventListener("blur",postalcodeVerify,true);
    postaladdress.addEventListener("blur",postaladdressVerify,true);
    contact.addEventListener("blur",contactVerify,true);
    gender.addEventListener("blur",genderVerify,true);
    email.addEventListener("blur",emailVerify,true);
    password.addEventListener("blur",passwordVerify,true);


    function Validate() {
        if (username.value == ""){
            username.style.border = "2px solid red";
            username_error.textContent = "*Username is required";
            username.focus();
            return false;
        }
        if (postalcode.value == ""){
            postalcode.style.border = "2px solid red";
            postalcode_error.textContent = "*Postal Code is required";
            postalcode.focus();
            return false;
        }
        if (postaladdress.value == ""){
            postaladdress.style.border = "2px solid red";
            postaladdress_error.textContent = "*Postal Address is required";
            postaladdress.focus();
            return false;
        }
        if (contact.value == ""){
            contact.style.border = "2px solid red";
            contact_error.textContent = "*Contact is required";
            contact.focus();
            return false;
        }
        if (gender.value == ""){
            gender.style.border = "2px solid red";
            gender_error.textContent = "*Please select your Gender ";
            gender.focus();
            return false;
        }
        if (email.value == ""){
            email.style.border = "2px solid red";
            email_error.textContent = "*Email is required";
            email.focus();
            return false;
        }
        if (password.value == ""){
            password.style.border = "2px solid red";
            password_error.textContent = "*Password is required";
            password.focus();
            return false;
        }
        //check if the two password matched or not
        if (password.value != rpass.value){
            password.style.border = "1px solid red";
            rpass.style.border = "1px solid red";
            password_error.innerHTML = "the two password doesnot matches";
            return false;
        }

    }
        function usernameVerfiy() {
            if (username.value !=""){
                username.style.border = "2px solid red";
                username_error.innerHTML = "";
                return true;
            }
            if (postalcode.value !=""){
                postalcode.style.border = "1px solid red";
                postalcode_error.innerHTML = "";
                return true;
            }
            if (postaladdress.value !=""){
                postaladdress.style.border = "2px solid red";
                postaladdress_error.innerHTML = "";
                return true;
            }
            if (contact.value !=""){
                contact.style.border = "2px solid red";
                contact_error.innerHTML = "";
                return true;
            }
            if (gender.value !=""){
                gender.style.border = "2px solid red";
                gender_error.innerHTML = "";
                return true;
            }
            if (email.value !=""){
                email.style.border = "1px solid red";
                email_error.innerHTML = "";
                return true;
            }
            if (password.value !=""){
                password.style.border = "2px solid red";
                password_error.innerHTML = "";
                return true;
            }

            function checkpw() {
                var password = document.getElementById("password").value;
                var rpass = document.getElementById("rpass").value;
                if (password != rpass){
                    document.getElementById("passwordinfo").innerHTML = "Password did not matched";
                    document.getElementById("passwordinfo").style.color = "Red";
                }else{
                    document.getElementById("passwordinfo").innerHTML = "Password Matched";
                    document.getElementById("passwordinfo").style.color = "Blue";
                }
                
            }


        }




</script>