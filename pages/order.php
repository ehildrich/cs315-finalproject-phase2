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

	$order_message = "<p>Order Unsuccessful!</p>";
	// If the user clicked the order button on the checkout page
	if ($_POST["order"] == true) {
		if (isset($_SESSION["currentUser"])) {
			// Clear the user's cart
			$remove_item = "DELETE FROM shopping_cart WHERE username = '" . $_SESSION["currentUser"] . "'";
			$link->query($remove_item);
		}
		else {
			$get_inventory = "SELECT product_name FROM products";
			$inventory = $link->query($get_inventory);
			while(($row = mysqli_fetch_assoc($inventory)) != NULL) {
				$cookie_name = cookieizeString($row["product_name"]);
				if (isset($_COOKIE[$cookie_name])) {
					setcookie($cookie_name, "", time() - 3600, "/");
					unset($_COOKIE[$cookie_name]);
				}
			}
		}
		$order_message = "<p>Order Successful!</p>";
	}
  ?>

<DOCTYPE html>
<html>
  <head>
    <title>A Brief Introduction to Coffee</title>
	<link rel="stylesheet" href="../styles/main.css" />
	<link rel="stylesheet" href="../styles/mobile.css" media="screen and (max-width:480px)" />
	<link rel="stylesheet" href="../styles/desktop.css" media="screen and (min-width:481px)" />
	<script src="../scripts/menu.js"></script>
  </head>

  <body>
	<?php
		pageHeader("Order Confirmation");
	?>
    <main>
      <h2>Order Status</h2>
	  <?php 
		echo $order_message;
	  ?>
    </main>

    <footer>
	  <hr>
      <p>Andrew Ruff, Dottie Hildrich</p>
    </footer>
  </body>
</html>
