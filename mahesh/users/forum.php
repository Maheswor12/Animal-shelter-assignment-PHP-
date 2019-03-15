<?php 


if(!session_start()){
session_start()	;



include '../connection.php';

}else {
	if($_SESSION['login'] != '' && $_SESSION['level'] == 2){
?>
<?php if (isset($_GET['idd'])) {
		include'../connection.php';
		  $id=$_GET['idd'];

		$update='UPDATE animals set booking="yes" where id='.$id;
		$con->query($update);
}
 ?>

 <?php 
 $uid=$_SESSION['uid'];
 include '../connection.php';

 	if (isset($_GET['deleteanswer'])) {
       
      $aid=$_GET['deleteanswer'];


    $deleteanswer="DELETE FROM  tbl_answer where aid='$aid'";
     $con->query($deleteanswer);
     echo '<script> alert(" Your answer Delete")</script>';
        }     

     if (isset($_GET['deletequestion'])) {
      $qid=$_GET['deletequestion'];
      $deletequestion="DELETE FROM  tbl_question where qid='$qid'";
      $con->query($deletequestion);
      echo '<script> alert(" Your QUESTION Delete")</script>';
        
     }

     if (isset($_POST['submit_question'])) {
      $question=$_POST['question'];

      $insert_query="INSERT INTO tbl_question VALUES(NULL,'$uid','$question')";
             if ($con->query($insert_query)==FALSE) {
            die("ERROR:".$con->error);
        }else{

             echo '<script> alert(" Your question registered")</script>';
        }
     }

    

        if (isset($_POST['submit_answer'])) {
          $answer=$_POST['answer'];
          $qid=$_POST['qid'];
    

      $insert_answer="INSERT INTO tbl_answer VALUES(NULL,'$qid','$uid','$answer')";
             if ($con->query($insert_answer)==FALSE) {
            die("ERROR:".$conn->error);
        }else{

             echo '<script> alert(" Your answer registered")</script>';
        }
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
						<li><a class="index_black" href="index.php" title="">HOME</a></li>
						<li><a class="index_red" href="forum.php" title="">Forum</a></li>
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

 <div  class="question-answer">

            <form method="post" action="forum.php">
              <h1> Asked Questions</h1>
              <textarea class="question" name="question"  required></textarea> <br>
              <input  type="submit" value="Submit" name="submit_question">

            </form>


        <div class="question-display">

              <?php 
              $start=0;
              $max=4;
              $q3="select * from tbl_question";
              $result=$con->query($q3);
              $total=$result->num_rows;
              $pgs=ceil($total/$max);
              if(isset($_GET['pges']))
              {
                $start=($_GET['pges']-1)*$max;
              }

                $select_question="SELECT * FROM tbl_question LIMIT $start,$max";
                $select_result=$con->query($select_question);
                while ($data=$select_result->fetch_array()) {
                 $id=$data['id'];
                 $qid=$data['qid'];
                $select_username="SELECT * FROM users where id='$uid'"; 
                $result_username=$con->query($select_username);
                $data_username=$result_username->fetch_array();
                $username=$data_username['email'];

                  if ($uid==$id) {
                        echo "<h3> #".$username." Q.".$data['question']."<a href='forum.php?deletequestion=".$qid."'>  Delete</a></h3> ";
                        echo ' <div class="answer">
                             <form method="post" action="forum.php">
                                 <input type="hidden" name="qid" value="'.$qid.'">
                                <input id="input-answer" type="text" name="answer" required>
                                <input type="submit"  value="Repaly" name="submit_answer">
                              </form>
                           </div> 
                        ';
                    } else {
                        echo "<h3> #".$username." Q.".$data['question']."</h3>";
                  echo ' <div class="answer">
                             <form method="post" action="forum.php">
                                 <input type="hidden" name="qid" value="'.$qid.'">
                                <input id="input-answer" type="text" name="answer" required>
                                <input type="submit"  value="Repaly" name="submit_answer">
                              </form>
                           </div> 
                        ';
                    }
          
                $select_everything="SELECT users.id,users.email,tbl_answer.answer,tbl_answer.aid from tbl_answer 
                  join users on tbl_answer.id =users.id  
                  JOIN tbl_question on  tbl_answer.qid=tbl_question.qid 
                  where tbl_question.qid='$qid'";
                 
                $result_everything=$con->query($select_everything);
                while ( $data_everything=$result_everything->fetch_array()) {
                    $uid=$data_everything['id'];
                    $username=$data_everything['email'];
                    $answer=$data_everything['answer'];

                    if ($uid==$id) {
                      echo "<p><b> ".$username."</b> Replay.".$answer."<a href='forum.php?deleteanswer=".$data_everything['aid']."'>  Delete</a></p>";
                    } else {
                      echo "<p><b> ".$username."</b> Replay.".$answer."</p>";
                    }
                    
                }               
                }
                for($j=1;$j<=$pgs;$j++)
     {
       echo "<a href='forum.php?pges=".$j."'>$j</a> ";
     }

               ?>


            </div>

           <p style="font-size: 20px;">Gift and Accessories</p> 
          <style type="text/css">
    #box img{
      width: 100%;
      height: 250px;
    }
     #slider{
      width: 369px;
      height: 251px;
      margin: 20px auto;
      position: relative;
      border: 10px solid white;
      box-shadow: 0px 0px 5px 2px #ccc;
     }
    
     
        .prew{
          border-radius: 0px 10px 10px 0px;
        }

  </style>

  <div id="slider">
    <div id="box">
      <img src="a.jpg">
    </div>

    <!-- buttons for controls slider -->
    
  </div>



  <script type="text/javascript">

    var slider_content = document.getElementById('box');

    // contain images in an array
    var image = ['a','b', 'c', 'd','e'];

    var i = image.length;


    // function for next slide 

    function nextImage(){
      if (i<image.length) {
        i= i+1;
      }else{
        i = 1;
      }
        slider_content.innerHTML = "<img src="+image[i-1]+".jpg>";
    }


    // function for prew slide

    function prewImage(){

      if (i<image.length+1 && i>1) {
        i= i-1;
      }else{
        i = image.length;
      }
        slider_content.innerHTML = "<img src="+image[i-1]+".jpg>";

    }

  
  // script for auto image slider

  setInterval(nextImage , 2000);

  </script>








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