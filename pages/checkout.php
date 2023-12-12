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

  // From the tutorial
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
		pageHeader("Checkout");
	?>

    <main>
      <h2>Order Summary</h2>
	  <?php 

 		 // If the user initiated checkout from the cart
  		if ($_POST["checkout"] == true) {
			$get_cart = "SELECT product_name, quantity FROM shopping_cart WHERE username = '" . $_SESSION["currentUser"] . "'";
			echo "<p>DEBUG: running query: " . $get_cart . "</p>";
			$cart = $link->query($get_cart);
			echo "<p>DEBUG: mysqli error: " . strval(mysqli_error($link)) . "</p>";
			// echo "<p>DEBUG: products found: " . strval($cart) . "</p>";
			$shipping_cost = 5.0;
			$subtotal = 0.0;

			while(($row = mysqli_fetch_assoc($cart)) != NULL) {
				$query = mysqli_fetch_assoc($link->query("SELECT product_name, price, image_url, description FROM products WHERE product_name = '" . $row["product_name"] . "'"));
				$price_str = sprintf("%.2f", $query['price']);
				$item_total = $query['price'] * $row['quantity'];
				$subtotal += $item_total;
				$item_total_str = sprintf("%.2f", $item_total);
				# Some of this is from the tutorial linked on the slides
				echo<<<EOT
				<div>
					<p>{$row['product_name']}
					<strong>$ {$price_str} × {$row['quantity']} = $ {$item_total_str}</strong>
					</p>
				</div>
				EOT;
			}
			$total = $subtotal + $shipping_cost;
			$tax = 0.1 * $total;
			$total += $tax;

			$subtotal_string = sprintf("%.2f", $subtotal);
			$ship_string = sprintf("%.2f", $shipping_cost);
			$tax_string = sprintf("%.2f", $tax);
			$total_string = sprintf("%.2f", $total);

			echo<<<EOT
			<strong>Subtotal:</strong> $ {$subtotal_string}
			<p>+</p>
			<strong>Shipping:</strong> $ {$ship_string}
			<p>+</p>
			<strong>Tax:</strong> $ {$tax_string}
			<hr></hr>
			<strong>Total:</strong> $ {$total_string}
			<hr></hr>
			<form action="order.php" method="post">
				<fieldset>
					<legend>Address</legend>
					<label for="address">Street Address</label>
					<input type="text" id="address"/>
					<label for="city">City</label>
					<input type="text" id="city"/>
					<label for="state">State</label>
					<input type="text" id="state"/>
					<label for="zip">ZIP</label>
					<input type="text" id="zip"/>
					<p>We currently only ship to the United States.</p>
					
					<section id="validationDiv" >
						<p></p>
					</section>
				</fieldset>
				<fieldset>
					<legend>Payment Information</legend>
					<label for="number">Credit Card Number</label>
					<input type="text" id="number"/>
					<label for="cvv">3 Wacky Numbers on the Back</label>
					<input type="text" id="cvv"/>
					<label for="expiration">Expiration Date</label>
					<input type="text" id="expiration"/>
					<p>We currently only accept payment by credit card</p>
					
					<section id="validationDiv" >
						<p></p>
					</section>
				</fieldset>
				<input type="hidden" name="order" value="true">
				<input type="submit" value="Order">
			</form>
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
