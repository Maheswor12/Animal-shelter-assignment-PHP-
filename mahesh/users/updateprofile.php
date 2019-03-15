
	<?php 
	$allStudent = listprofile();
	?>
	<div class="animallist_container">
		<div class="animallist_box">
			<table border="2">
				<tr>
					<td id="animal_lost" colspan="9" style="text-align: center;">Animal List</td>
				</tr>
				<tr>
					<td>#</td>
					<td>customer_name</td>
					<td>email</td>
					<td>postal</td>
					<td>contact</td>
					<td>birthdate</td>
					<td>gender</td>
					<td>Action</td>
				</tr>
				<?php
				if ($allStudent> 0) {
					    // output data of each row
					$i=1;
					while($row = mysql_fetch_array($allStudent)) {
						$student_id = $row['id'];

						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $row['customer_name']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['postal']; ?></td>
							<td><?php echo $row['weight']; ?></td>
							<td><?php echo $row['contact']; ?></td>
							<td><?php echo $row['birthdate']; ?></td>
							<td><?php echo $row['gender']; ?></td>
		
								<td> <a href="profileedit.php?id=<?php echo $student_id; ?>"onclick="return confirm('Are you sure you want to edit this item?');">Edit</a></td> 
							</tr>
							<?php
							$i++; 
					    } //end iof while
					} //end of if 
					?>
				</table>
		</div>
		</div>
	</body>
	</html>