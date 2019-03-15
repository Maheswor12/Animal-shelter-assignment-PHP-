<?php
// creating database
function setpage(){
 $con = new mysqli("localhost","root","");
 $q1 = "create database dwassignment";
 $con->query($q1);
 mysqli_select_db($con,'dwassignment');


$q2="CREATE TABLE IF NOT EXISTS `animals` (
`id` int(100) NOT NULL,
  `type` varchar(200) NOT NULL,
  `breed` varchar(200) NOT NULL,
  `size` varchar(200) NOT NULL,
  `weight` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `image` text NOT NULL,
  `booking` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1";
$con->query($q2 );




$q3="CREATE TABLE IF NOT EXISTS `counter` (
`id` int(10) NOT NULL,
  `counter` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1";
$con->query($q3 );




$q4="CREATE TABLE IF NOT EXISTS `donation` (
`id` int(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `currency` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1";
$con->query($q4 );





$q5="CREATE TABLE IF NOT EXISTS `registration` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `pet` varchar(50) NOT NULL,
  `p_add` varchar(50) NOT NULL,
  `p_code` varchar(20) NOT NULL,
  `TYPE` enum('admin','general') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1";
$con->query($q5 );




$q6="CREATE TABLE IF NOT EXISTS `tbl_answer` (
`aid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `answer` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1";
$con->query($q6 );






$q7="CREATE TABLE IF NOT EXISTS `tbl_question` (
`qid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1";

$con->query($q7 );





$q8 = "CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `postal` varchar(256) NOT NULL,
  `contact_num` varchar(256) NOT NULL,
  `dob` varchar(256) NOT NULL,
  `gender` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `user_type` int(11) NOT NULL,
  `last_logged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reg_date` varchar(222) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1";
$con->query($q8 );




$q9 = "ALTER TABLE `animals`
 ADD PRIMARY KEY (`id`)";
$con->query($q9 );

$q10 = "ALTER TABLE `counter`
 ADD PRIMARY KEY (`id`)";
$con->query($q10 );

$q11 = "ALTER TABLE `donation`
 ADD PRIMARY KEY (`id`)";
$con->query($q11 );

$q12 = "ALTER TABLE `registration`
 ADD PRIMARY KEY (`id`)";
$con->query($q12 );

$q13="ALTER TABLE `tbl_answer`
 ADD PRIMARY KEY (`aid`), ADD KEY `qid` (`qid`), ADD KEY `id` (`id`)";
$con->query($q13 );

$q14 = "ALTER TABLE `tbl_question`
 ADD PRIMARY KEY (`qid`), ADD KEY `id` (`id`)";
$con->query($q14 );

$q15 = "ALTER TABLE `users`
 ADD PRIMARY KEY (`id`)";
$con->query($q15 );



$q16="ALTER TABLE `animals`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2";
$con->query($q16);


$q17 = "ALTER TABLE `counter`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2";
$con->query($q17 );

$q19 = "ALTER TABLE `donation`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34";
$con->query($q19 );

$q20 = "ALTER TABLE `registration`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24";
$con->query($q20 );

$q21 = "ALTER TABLE `tbl_answer`
MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8";
$con->query($q21 );

$q22 = "ALTER TABLE `tbl_question`
MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7";
$con->query($q22 );

$q23 = "ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61";
$con->query($q23 );


$q24="INSERT INTO `counter` (`id`, `counter`) VALUES
(2, 1)";
$con->query($q24);


$q25="INSERT INTO `users` (`id`, `email`, `postal`, `contact_num`, `dob`, `gender`, `name`, `username`, `password`, `user_type`, `last_logged`, `reg_date`) VALUES
(61, 'ram@gmail.com', 'ktm', '12332134', '2003/11/16', 'male', 'ram', 'ram', '202cb962ac59075b964b07152d234b70', 1, '2018-04-23 09:27:18', '2018-04-23')";
$con->query($q25);


}
?>