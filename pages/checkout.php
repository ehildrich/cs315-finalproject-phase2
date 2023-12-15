<DOCTYPE html>
<html>
  <?php
	include "../php/functions.php";
	error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    session_start();
	// Set a few variables to empty in the event they don't get set later
	$errorMessage = "";
	$results = "";
	$userSQL = "";
	$addressErr = "";
	$cityErr = "";
	$stateErr = "";
	$zipErr = "";
	$cardErr = "";
	$cvvErr = "";
	$expirationErr = "";
  
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
	
  // From the tutorial
  ?>
  
  <head>
    <title>A Brief Introduction to Coffee</title>
	<link rel="stylesheet" href="../styles/main.css" />
	<link rel="stylesheet" href="../styles/mobile.css" media="screen and (max-width:480px)" />
	<link rel="stylesheet" href="../styles/desktop.css" media="screen and (min-width:481px)" />
	<script src="../scripts/menu.js"></script>
	<script src="../scripts/checkout.js"></script>
  </head>

  <body>
	<?php
		pageHeader("Checkout");
	?>

    <main>
      <h2>Order Summary</h2>
	  <?php 
		
		$order_message = "";
		// If the user clicked the order button
		if (isset($_POST["order"])) {
			// Grab all form entries from the request
			$address = normalizeString($_POST["address"]);
			$city = normalizeString($_POST["city"]);
			$state = normalizeString($_POST["state"]);
			$zip = $_POST["zip"];
			$creditCard = $_POST["number"];
			$cvv = $_POST["cvv"];
			$expiration = normalizeString($_POST["expiration"]);
			$error = false;
			
			if (validateString($address) != "") {
				$addressErr = "You must provide an address.";
				$error = true;
			}
			
			if (validateString($city) != "") {
				$cityErr = "You must provide a city.";
				$error = true;
			} 
			
			if (validateString($state) != "") {
				$stateErr = "You must provide a state.";
				$error = true;
			} else if (ctype_alpha($state) == false) {
				$stateErr = "State must not be a number."; 
				$error = true;
			} else if (strlen($state) != 2) {
				$stateErr = "State must be 2 characters long.";
				$error = true;
			} 
			
			if (validateString($zip) != "") {
				$zipErr = "You must provide a zip code.";
				$error = true;
			} else if (is_numeric($zip) == false) {
				$zipErr = "Zip code must be a number."; 
				$error = true;
			} else if (strlen($zip) != 5) {
				$zipErr = "Zip code must be 5 characters long.";
				$error = true;
			}
			
			if (validateString($creditCard) != "") {
				$cardErr = "You must provide a credit card.";
				$error = true;
			} else if (is_numeric($creditCard) == false) {
				$cardErr = "Credit card must be a number."; 
				$error = true;
			} else if (strlen($creditCard) != 16) {
				$cardErr = "Credit card number must be 16 digits long.";
				$error = true;
			}
			
			if (validateString($cvv) != "") {
				$cvvErr = "You must provide a CVV number.";
				$error = true;
			} else if (is_numeric($cvv) == false) {
				$cvvErr = "CVV must be a number."; 
				$error = true;
			} else if (strlen($cvv) != 3) {
				$cvvErr = "CVV number must be 3 digits long.";
				$error = true;
			}
			
			if (validateString($expiration) != "") {
				$expirationErr = "You must provide an expiration date.";
				$expiration = true;
			} else if (strlen($expiration) != 5) {
				$cvvErr = "Expiration date must be in the form of XX/XX.";
				$error = true;
			}
			
			
			if ($error == false) {
				$order_message = "<h1>Order Unsuccessful!</h1>";
				if (isset($_SESSION["currentUser"])) {
					// Clear the user's cart
					$remove_item = "DELETE FROM shopping_cart WHERE username = '" . $_SESSION["currentUser"] . "'";
					$link->query($remove_item);
					$order_message = "<h1>Order Successful!</h1>";
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
					$order_message = "<h1>Order Successful!</h1>";
				}
			} else {
				$order_message = "<h2>There were errors in the submission. Please check your entries and try again.</h2>";
			}
		}
		
		
		$items_string = "<h4>Items</h4>";
 		 // If the user initiated checkout from the cart
  		if (isset($_POST["checkout"])) {
			$shipping_cost = 5.0;
			$subtotal = 0.0;
			// SQL version
			$discount = 1.0;
			if (isset($_SESSION["currentUser"])) {
				$discount = 0.9;
				$get_cart = "SELECT product_name, quantity FROM shopping_cart WHERE username = '" . $_SESSION["currentUser"] . "'";
				//echo "<p>DEBUG: running query: " . $get_cart . "</p>";
				$cart = $link->query($get_cart);
				//echo "<p>DEBUG: mysqli error: " . strval(mysqli_error($link)) . "</p>";
				// echo "<p>DEBUG: products found: " . strval($cart) . "</p>";

				while(($row = mysqli_fetch_assoc($cart)) != NULL) {
					$query = mysqli_fetch_assoc($link->query("SELECT product_name, price, image_url, description FROM products WHERE product_name = '" . $row["product_name"] . "'"));
					$price = $query['price'] * $discount;
					$price_str = sprintf("%.2f", $price);
					$item_total = $price * $row['quantity'];
					$subtotal += $item_total;
					$item_total_str = sprintf("%.2f", $item_total);
					# Some of this is from the tutorial linked on the slides
					$items_string = $items_string . "<p>{$row['product_name']}: 
						<strong>$ {$price_str} × {$row['quantity']} = $ {$item_total_str}</strong></p>";
				}
			}
			// Cookies version
			else {
				$get_inventory = "SELECT product_name, price, image_url, description FROM products";
				//echo "<p>DEBUG: running query: " . $get_cart . "</p>";
				$inventory = $link->query($get_inventory);
				while(($row= mysqli_fetch_assoc($inventory)) != NULL) {
					$cookie_name = cookieizeString($row["product_name"]);
					// Short-circuit evaluation means this is fine.
					if (isset($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name] > 0) {
						$quantity = $_COOKIE[$cookie_name];
						$query = mysqli_fetch_assoc($link->query("SELECT product_name, price, image_url, description FROM products WHERE product_name = '" . $row["product_name"] . "'"));
						$price_str = sprintf("%.2f", $query['price']);
						$item_total = $query['price'] * $quantity;
						$subtotal += $item_total;
						$item_total_str = sprintf("%.2f", $item_total);
						# Some of this is from the tutorial linked on the slides
						$items_string = $items_string . "<p>{$row['product_name']}: 
							<strong>$ {$price_str} × {$quantity} = $ {$item_total_str}</strong></p>";
					}
				}
			}
			$total = $subtotal + $shipping_cost;
			$tax = 0.1 * $total;
			$total += $tax;

			$subtotal_string = sprintf("%.2f", $subtotal);
			$ship_string = sprintf("%.2f", $shipping_cost);
			$tax_string = sprintf("%.2f", $tax);
			$total_string = sprintf("%.2f", $total);
		}
		?>
			
		<form id="checkoutForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
			<?php 
				if (isset($_POST["checkout"])){
					echo<<<EOT
					<div class="para">
						{$items_string}
					</div>
					
					<div class="rec">
						<strong>Subtotal:</strong> $ {$subtotal_string}
						<p>+</p>
						<strong>Shipping:</strong> $ {$ship_string}
						<p>+</p>
						<strong>Tax:</strong> $ {$tax_string}
						<hr></hr>
						<strong>Total: $ {$total_string}</strong>
						<hr></hr>
					</div>
					EOT;
				} else if (isset($_POST["order"])) {
					echo<<<EOT
					<div class="para">
						{$order_message}
					</div>
					EOT; 
				}
			 ?>
			
			<div class="fs">
			<fieldset>
				<legend>Address and Payment Information</legend>
				<label for="address">Street Address</label>
				<input type="text" name="address" id="address"/>
				<section class="validation" id="addressValidationDiv" >
					<p></p>
					<?php echo $addressErr ?>
				</section>
				
				<label for="city">City</label>
				<input type="text" name="city" id="city"/>
				<section class="validation" id="cityValidationDiv" >
					<p></p>
					<?php echo $cityErr ?>
				</section>
				
				<label for="state">State</label>
				<input type="text" maxlength="2" name="state" id="state"/>
				<section class="validation" id="stateValidationDiv" >
					<p></p>
					<?php echo $stateErr ?>
				</section>
				
				<label for="zip">ZIP</label>
				<input type="text" maxlength="5" name="zip" id="zip"/>
				<section class="validation" id="zipValidationDiv" >
					<p></p>
					<?php echo $zipErr ?>
				</section>
				
				<p>We currently only ship to the United States.</p>
				
				<label for="number">Credit Card Number</label>
				<input type="text" maxlength="16" name="number" id="number"/>
				<section class="validation" id="numberValidationDiv" >
					<p></p>
					<?php echo $cardErr ?>
				</section>
				
				<label for="cvv">3 Wacky Numbers on the Back</label>
				<input type="text" maxlength="3" name="cvv" id="cvv"/>
				<section class="validation" id="cvvValidationDiv" >
					<p></p>
					<?php echo $cvvErr ?>
				</section>
				
				<label for="expiration">Expiration Date</label>
				<input type="text" maxlength="5" name="expiration" id="expiration"/>
				<section class="validation" id="expirationValidationDiv" >
					<p></p>
					<?php echo $expirationErr ?>
				</section>
				
				<p>We currently only accept payment by credit card.</p>
				
			</fieldset>
			</div>
			
			<input type="hidden" name="order" value="true">
			<input type="reset" id="resetBtn" class="rb" value="Reset">
			<input type="button" id="checkoutBtn" class="sb" value="Order">
		</form>
    </main>

    <footer>
	  <hr>
      <p>Andrew Ruff, Dottie Hildrich</p>
    </footer>
  </body>
</html>
