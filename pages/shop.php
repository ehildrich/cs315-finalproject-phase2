<DOCTYPE html>
<html>
  <?php
	include "../php/functions.php";
	// Set a few variables to empty in the event they don't get set later
	$errorMessage = "";
	$results = "";
	$userSQL = "";
  
	// Connect to the database
	// This is the information about the mySQL database we will use to connect
	$dbUser = 'root';
	$dbPassword = 'root';
	$db = 'user_data';
	$host = 'localhost';
	$port = 8889;

	$link = mysqli_init();
	// success is set to true or false based on whether the connection was successful
	$success = mysqli_real_connect($link, $host, $dbUser, $dbPassword, $db, $port);
	
    session_start();
  ?>
  
  <head>
    <title>A Brief Introduction to Coffee</title>
	<link rel="stylesheet" href="../styles/main.css" />
	<link rel="stylesheet" href="../styles/mobile.css" media="screen and (max-width:480px)" />
	<link rel="stylesheet" href="../styles/desktop.css" media="screen and (min-width:481px)" />
	<script src="../scripts/menu.js"></script>
  </head>

  <body>
	<?php
		pageHeader("Shop");
	?>
	<main>
      <h2>Items</h2>
	  <?php 
	    $discount = 1.0;
		if (isset($_SESSION["currentUser"])) {
			$discount = 0.9;
		}
		$query = $link->query("SELECT product_name, price, image_url, description FROM products ORDER BY price DESC");

		while(($row = mysqli_fetch_assoc($query)) != NULL) {
		
			$price = $row['price'] * $discount;
			$price_str = sprintf("%.2f", $price);
			# Some of this is from the tutorial linked on the slides
			echo<<<EOT
			<div>
				<h3>{$row['product_name']}</h3>
				<figure class="storeFigure">
					<img src='/images/{$row['image_url']}'></img>
					<figcaption>{$row['description']} - <strong>$ {$price_str}</strong></figcaption>
				</figure>
				<form class="shopForm" action="cart.php" method="post">
					<input type="number" name="quantity" value="1" min="1" placeholder="Quantity" required>
					<input type="hidden" name="product_name" value="{$row['product_name']}">
					<input type="hidden" name="updating" value="false">
					<input type="submit" value="Add to Cart">
				</form>
			</div>
			EOT;
		}
	  ?>
    </main>

    <footer>
	  <hr>
      <p>Andrew Ruff, Dottie Hildrich</p>
    </footer>
  </body>
</html>
