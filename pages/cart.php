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
  // If the user clicked the add to cart button on the product page we can check for the form data
  if (isset($_POST['product_name'], $_POST['quantity']) && is_string($_POST['product_name']) && is_numeric($_POST['quantity'])) {
    // Set the post variables so we easily identify them, also make sure they are integer
    $product_name = normalizeString($_POST['product_name']);
    $quantity = (int)$_POST['quantity'];
    // Prepare the SQL statement, we basically are checking if the product exists in our database
    $find_product = "SELECT * FROM products WHERE product_name = '" . $product_name . "'";
    $product = $link->query($find_product);
    // Fetch the product from the database and return the result as an Array
    $product_entry = mysqli_fetch_assoc($product);
    // Check if the product exists (array is not empty)
    if (isset($product_entry)) {
		// Check for an existing quantity we need to increase
		$check_cart = "SELECT * FROM shopping_cart WHERE username = '" . $_SESSION["currentUser"] . "'";
		$query = $link->query($check_cart);
		$updated_flag = false;
		while ($item = mysqli_fetch_assoc($query)) {
			if($item["product_name"] == $product_name) {
				$updated_flag = true;
				if ($_POST["updating"] == true) {
					if ($quantity == 0) {
						$remove_item = "DELETE FROM shopping_cart WHERE username = '" . $_SESSION["currentUser"] . "' AND product_name = '" . $product_name . "'";
						// echo "<p>DEBUG: running query: " . $remove_item . "</p>";
						$link->query($remove_item);
					}
					else if ($quantity != $item["quantity"]) {
						$change_quantity = "UPDATE shopping_cart SET quantity='" . $quantity . "' WHERE product_name = '" . $product_name . "'";
						$link->query($change_quantity);
					}
				}
				else {
					$quantity += $item["quantity"];
					$change_quantity = "UPDATE shopping_cart SET quantity='" . $quantity . "' WHERE product_name = '" . $product_name . "'";
					$link->query($change_quantity);
				}
			}
		}
		// If it wasn't in the cart already, add it
		if ($updated_flag == false) {
			$add_product = "INSERT INTO shopping_cart (product_name, quantity, username) VALUES ('" . $product_name . "', '" . $quantity . "', '" . $_SESSION["currentUser"] . "')";
			// Execute query
			$link->query($add_product);
		}
		// Prevent form resubmission...
		// header('location: cart.php');
		// exit;
	}
  }
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
		pageHeader("Cart");
	?>

    <main>
      <h2>Items</h2>
	  <?php 
	  	$get_cart = "SELECT product_name, quantity FROM shopping_cart WHERE username = '" . $_SESSION["currentUser"] . "'";
		//echo "<p>DEBUG: running query: " . $get_cart . "</p>";
		$cart = $link->query($get_cart);
		//echo "<p>DEBUG: mysqli error: " . strval(mysqli_error($link)) . "</p>";
		// echo "<p>DEBUG: products found: " . strval($cart) . "</p>";
		$empty_flag = true;
		while(($row = mysqli_fetch_assoc($cart)) != NULL) {
			$empty_flag = false;
			$query = mysqli_fetch_assoc($link->query("SELECT product_name, price, image_url, description FROM products WHERE product_name = '" . $row["product_name"] . "'"));
			$price_str = sprintf("%.2f", $query['price']);
			$item_total = $query['price'] * $row['quantity'];
			$item_total_str = sprintf("%.2f", $item_total);
			# Some of this is from the tutorial linked on the slides
			echo<<<EOT
			<div>
				<h4>{$row['product_name']}</h4>
				<figure class="storeFigure">
					<img src='/images/{$query['image_url']}'></img>
					<figcaption>$ {$price_str} × {$row['quantity']} = <strong>$ {$item_total_str}</strong></figcaption>
				</figure>
				<form class="shopForm" action="cart.php" method="post">
					<input type="number" name="quantity" value="{$row['quantity']}" min="0" placeholder="Quantity" required>
					<input type="hidden" name="product_name" value="{$row['product_name']}">
					<input type="hidden" name="updating" value="true">
					<input type="submit" value="Update">
				</form>

			</div>
			EOT;
		}
		// Only show checkout button if cart isn't empty
		if ($empty_flag == false) {
			echo<<<EOT
				<form action="checkout.php" method="post">
					<input type="hidden" name="checkout" value="true">
					<input type="submit" class="rb" id="checkoutBtn" value="Checkout">
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
