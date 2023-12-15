<DOCTYPE html>
<html>
  <?php
	// Start session, include functions file
	session_start();
	include "../php/functions.php";
	
	// Set a few variables to empty in the event they don't get set later
	$errorMessage = "";
	$results = "";
	$userSQL = "";
  
	// If the user tried to login
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Get the username and password from the request
		$username = normalizeString($_POST["username"]);
		$password = normalizeString($_POST["password"]);
		
		// Check for errors, if one exists then display it in the validationDiv
		$userErr = validateString($username);
		$passErr = validateString($password);
		if ($userErr != "") {
			$errorMessage = "You must provide a username.";
		} else if ($passErr != "") {
			$errorMessage = "You must provide a password.";
		} 
		
		// If no errors, attempt to connect to the database
		if ($errorMessage == "") {
			// This is the information about the mySQL database we will use to connect
			$dbUser = 'root';
			$dbPassword = 'root';
			$db = 'user_data';
			$host = 'localhost';
			$port = 8889;

			$link = mysqli_init();
			// success is set to true or false based on whether the connection was successful
			$success = mysqli_real_connect($link, $host, $dbUser, $dbPassword, $db, $port);
			
			// If the connection succeeded, set up a SQL statement to see if the username and password
			// match up with one in the database. 
			if ($success) {
				$userSQL = "SELECT * FROM users WHERE username = '" . $username . "' AND password = '" . $password . "'";
				// Execute query
				$results = $link->query($userSQL);
				
				// If there were any results, then a match was found and the user can log in with those credentials
				if ($results->num_rows != 0) {
					$_SESSION["currentUser"] = $username;
				} else {
					// Otherwise display an error message
					$errorMessage = "No such user exists. Please ensure your username and password were spelled correctly and try again.";
				}
			} else {
				// Display error message if connection was not successful. 
				$errorMessage = "There was an error connecting to the database. Please try again.";
			}
		}
	} 
  ?>

  <head>
    <title>Coffee Login</title>
	<link rel="stylesheet" href="../styles/main.css" />
	<link rel="stylesheet" href="../styles/mobile.css" media="screen and (max-width:480px)" />
	<link rel="stylesheet" href="../styles/desktop.css" media="screen and (min-width:481px)" />
	<script src="../scripts/login.js"></script>
	<script src="../scripts/menu.js"></script>
  </head>

  <body>
	<?php
		pageHeader("Login");
	?>
    
	<main>
		<form id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
			<section class="l">
				<h2>Login to the Coffee Website</h2>
			</section>
			
			<section class="para">
				<p>Enter your username and password to log into the site!</p>
				<p>New to the site? Click <a href="newuser.php">here</a> to create a new account!</p>
			</section>
		
			<section class="fs">
				<fieldset>
					<legend>Login</legend>
					
					<label for="username">Username</label>
					<input type="text" name="username" id="username" />
					<label for="password">Password</label>
					<input type="password" name="password" id="password" />
					
					</br>
					</br>
					
					<section class="validation" id="validationDiv">
						<p><?php 
								// Any PHP error message will appear here each time the page loads. 
								if ($errorMessage != "") {
									echo $errorMessage;
								}
							?>
						</p>
					</section>
				</fieldset>
			</section>
			
			<section class="sb">
				<button type="button" id="loginBtn">Submit</button>
			</section>
			
			<section class="rb">
				<button type="reset" id="resetBtn">Reset</button>
			</section>
		</form>
	</main>
	
    <footer>
      <hr>
      <p>Andrew Ruff, Dottie Hildrich</p>
    </footer>
  </body>
</html>
