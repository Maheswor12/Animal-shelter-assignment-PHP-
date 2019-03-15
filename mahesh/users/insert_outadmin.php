<div class="out_product1">
	<h2 class="outproduct">New Animals</h2>
	<table>
		<tr>
			<?php
			$latest_dogs = getLatestDog(5);
			$path = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
			$path .=$_SERVER["SERVER_NAME"]. dirname($_SERVER["PHP_SELF"]); 
			if ($latest_dogs && $latest_dogs > 0) {
				while($row = mysql_fetch_array($latest_dogs)) {
					?>
					<td class="latestproduct">
						<div class="latestoutproducts">
							<h3 Class="new"><?php echo $row['breed']; ?></h3>
							<div class="outimage">
								<img src="<?php echo 'http://localhost/animals/'."admin/dataimg/".$row['image']; ?>" height="165">
							</div>
							<h4 Class="product_Nameout"><?php echo $row['type']; ?></h4>
							<p><?php echo $row['size']; ?><br>
								<?php echo $row['weight']; ?><br>
								<?php echo $row['gender']; ?>
							</p>
							<p id = "priceoutin"><?php echo $row['amount']; ?></p>
							<a href="booking.php?id=<?php echo $row['id']; ?>">
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