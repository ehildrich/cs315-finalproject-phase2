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

  // From the tutorial but modified
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
		// If the user is logged in, use SQL so their cart persists indefinitely
		if (isset($_SESSION['currentUser'])) {
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
		}
		// If the user isn't logged in, use cookies instead
		else {
			$cookie_name = cookieizeString($product_name);
			// if the product is already in the cart
			if (isset($_COOKIE[$cookie_name])) {
				if ($_POST["updating"] == true) {
					if ($quantity == 0) {
						// Delete the cookie
						setcookie($cookie_name, "", time() - 3600, "/");
						unset($_COOKIE[$cookie_name]);
					}
					else if ($quantity != $_COOKIE[$product_name]) {
						// Update cookie with new quantity and make it last 30 days
						$quantity += $_COOKIE[$product_name];
						setcookie($cookie_name, strval($quantity), time() + (86400 * 30), "/");
						$_COOKIE[$cookie_name] = $quantity;
					}
				}
				else {
					$quantity += $_COOKIE[$product_name];
					setcookie($cookie_name, strval($quantity), time() + (86400 * 30), "/");
					$_COOKIE[$cookie_name] = $quantity;
				}
			}
			// if the product is not in the cart
			else {
				setcookie($cookie_name, strval($quantity), time() + (86400 * 30), "/");
				$_COOKIE[$cookie_name] = $quantity;
			}
			// Cookies corresponding to a product are named after a product and contain the quantity in the cart
		}
		// Prevent form resubmission...
		// header('location: cart.php');
		// exit;
	}
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
		pageHeader("Cart");
	?>

    <main>
      <h2>Items</h2>
	  <?php 
		$empty_flag = true;
		$discount = 1.0;
		$subtotal = 0.0;
		$total_quantity = 0;
		// If the user is logged in
		if(isset($_SESSION["currentUser"])) {
			$discount = 0.9;
			$get_cart = "SELECT product_name, quantity FROM shopping_cart WHERE username = '" . $_SESSION["currentUser"] . "'";
			//echo "<p>DEBUG: running query: " . $get_cart . "</p>";
			$cart = $link->query($get_cart);
			//echo "<p>DEBUG: mysqli error: " . strval(mysqli_error($link)) . "</p>";
			// echo "<p>DEBUG: products found: " . strval($cart) . "</p>";
			$empty_flag = true;
				while(($row = mysqli_fetch_assoc($cart)) != NULL) {
					$empty_flag = false;
					$query = mysqli_fetch_assoc($link->query("SELECT product_name, price, image_url, description FROM products WHERE product_name = '" . $row["product_name"] . "'"));
					$price = $query['price'] * $discount;
					$price_str = sprintf("%.2f", $price);
					$item_total = $price * $row['quantity'];
					$subtotal = $subtotal + $item_total;
					$total_quantity = $total_quantity + $row['quantity'];
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
		}
		else {
			// Get a list of products and check if any corresponding cookies are set.
			$get_inventory = "SELECT product_name, price, image_url, description FROM products";
			//echo "<p>DEBUG: running query: " . $get_cart . "</p>";
			$inventory = $link->query($get_inventory);
			while(($row = mysqli_fetch_assoc($inventory)) != NULL) {
				$cookie_name = cookieizeString($row["product_name"]);
				if (isset($_COOKIE[$cookie_name])) {
					$quantity = $_COOKIE[$cookie_name];
					$price_str = sprintf("%.2f", $row['price']);
					$item_total = $row['price'] * $_COOKIE[$cookie_name];
					$item_total_str = sprintf("%.2f", $item_total);
					$subtotal = $subtotal + $item_total;
					$total_quantity = $total_quantity + $row['quantity'];
					# Some of this is from the tutorial linked on the slides
					if ($quantity > 0) {
						$empty_flag = false;
						echo<<<EOT
						<div>
							<h4>{$row['product_name']}</h4>
							<figure class="storeFigure">
								<img src='/images/{$row['image_url']}'></img>
								<figcaption>$ {$price_str} × {$quantity} = <strong>$ {$item_total_str}</strong></figcaption>
							</figure>
							<form class="shopForm" action="cart.php" method="post">
								<input type="number" name="quantity" value="{$quantity}" min="0" placeholder="Quantity" required>
								<input type="hidden" name="product_name" value="{$row['product_name']}">
								<input type="hidden" name="updating" value="true">
								<input type="submit" value="Update">
							</form>

						</div>
						EOT;
					}
				}
			}
		}
		// Only show checkout button if cart isn't empty
		$item_total = round($item_total, 2);
		if ($empty_flag == false) {
			echo<<<EOT
				<form action="checkout.php" method="post">
					<div class="fs"
						<p>Number of Items: <strong>$quantity</strong></p>
						<p>Total: <strong>$ $item_total</strong></p>
					</div>
					<input type="hidden" name="checkout" value="true">
					<div class="sb" id="paymentMethods"></div>
					<input type="submit" class="rb" id="checkoutBtn" value="Checkout">
				</form>

			EOT;
		}
	  else {
		echo "<p>Your cart is currently empty. Why not check out the <a href='/pages/shop.php'>shop</a>?</p>";
	  }
	  ?>
	
	
   
   <!--This code generates the PayPal button and places it in the paymentMethods div above. -->
   <script src="//www.paypalobjects.com/api/checkout.js" ></script>
   <script type="text/javascript">
        window.onload = function(){

          var CREATE_PAYMENT_URL  = './paypal_ec_redirect.php';
		  // These default values seem to be required in order for the demo to function. 
          var formdata = {PAYMENTREQUEST_0_ITEMAMT: 10, PAYMENTREQUEST_0_SHIPPINGAMT : 5,PAYMENTREQUEST_0_TAXAMT: 2, PAYMENTREQUEST_0_AMT: 17, paymentType:'SALE', PAYMENTREQUEST_0_CURRENCYCODE: 'USD', currencyCodeType: 'USD'};
		  console.log(formdata);

            paypal.Button.render({

                env: 'sandbox',  // sandbox | production
                locale: 'en_US',
                style: {
                    size: 'small',   // tiny | small | medium
                    color: 'gold',	// gold | blue | silver
                    shape: 'pill',	// pill | rect
                    label: 'checkout' // checkout | credit
                },
                payment: function(resolve) {
                    jQuery.post(CREATE_PAYMENT_URL,formdata,function(data) {
                        console.log("Displaying data here: " + data);
                        resolve(data); // no data.token, b/c data.token is json format
                    });
                },

                onAuthorize: function(data, actions) {

                  var EXECUTE_PAYMENT_URL  = './paypal_ec_redirect.php';

                  jQuery.post(EXECUTE_PAYMENT_URL,
                  {payToken: data.paymentID, payerId: data.payerID},function(response) {
                  // if successful navigate to success page
                  // else
                  if (response === '10486') {
                     actions.restart();

                  }});
                 return actions.redirect();

                },

            }, '#paymentMethods');
		}
   </script>
	<?php include('footer.php') ?>

	
    </main>

    <footer>
	  <hr>
      <p>Andrew Ruff, Dottie Hildrich</p>
    </footer>
  </body>
</html>
