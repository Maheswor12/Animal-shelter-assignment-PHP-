
<div class="animallist_container">
	<div class="animallist_box">

		<table border="2">
			<tr>
				<td id="animal_lost" colspan="9" style="text-align: center;"><b>Donation List</b></td>
			</tr>
			<tr>
				<td>SN.</td>
				<td><b>Username</b></td>
				<td><b>Email</b></td>
				<td><b>Currency</b></td>
				<td><b>Amount</b></td>
			</tr>

			<?php require_once '../connection.php'; 
			$sql = "SELECT * FROM donation ORDER BY id desc";
			$result = mysqli_query($con,$sql);

			if ($result) {
				$path = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
				$path .=$_SERVER["SERVER_NAME"]. dirname($_SERVER["PHP_SELF"]); 
					    // output data of each row
				$i=1;
				while($row = mysqli_fetch_array($result)) {
					$student_id = $row['id'];

					?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $row['username']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['currency']; ?></td>
						<td><?php echo $row['amount']; ?></td>
					</tr>
					<?php
					$i++; 
					    } //end iof while
					} //end of if 
					?>
				</table>
			</div>
		</div>
		<br>
		<?php 
		$qry1 = "Select SUM(amount) AS sum from donation";
		$data1 = $con->query($qry1);
 		while ($query1 = $data1->fetch_assoc() ) {
			echo "<b style='text-align: center; color: white; background:  #1aff1a;font-style: sans-serif; font-size: 20px;text-align: center;'' >Total donation is:</b>".$sum=$query1["sum"]."<br>";

		}

		?>
