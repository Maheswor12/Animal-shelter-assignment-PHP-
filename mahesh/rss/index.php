<?xml version = "1.0" ?>
<?php
header("Content-type: text/xml");
$conn = new mysqli("localhost","root","","dwassignment");
$query = "select * from animals";
$res = $conn->query($query);

echo "<animals>";
while($data = $res->fetch_array())
{
?>
   <animal>
       <animal_type><?php echo $data['type']; ?></animal_type>
   		 <animal_breed><?php echo  $data['breed']; ?></animal_breed>
   		  <animal_size><?php echo  $data['size']; ?></animal_size>
   		  <animal_weight><?php echo  $data['weight']; ?></animal_weight>
   		  <animal_gender><?php echo  $data['gender']; ?></animal_gender>
   		    <animal_amount><?php echo  $data['amount']; ?></animal_amount>
   		     <animal_amount><?php echo  $data['image']; ?></animal_amount>

   </animal>
<?php 

}
   echo "</animals>";
?>
