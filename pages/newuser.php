<DOCTYPE html>
<html>
  <?php
	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
	include "../php/functions.php";
	
	$errorMessage = "";
	$results = "";
	$userSQL = "";
  
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = normalizeString($_POST["username"]);
		$password = normalizeString($_POST["password"]);
		
		$userErr = validateString($username);
		$passErr = validateString($password);
		if ($userErr != "") {
			$errorMessage = "You must provide a username.";
		} else if ($passErr != "") {
			$errorMessage = "You must provide a password.";
		} 
		
		if ($errorMessage == "") {
			$dbUser = 'root';
			$dbPassword = 'root';
			$db = 'user_data';
			$host = 'localhost';
			$port = 8889;

			$link = mysqli_init();
			$success = mysqli_real_connect($link, $host, $dbUser, $dbPassword, $db, $port);
			
			if ($success) {
				$userSQL = "SELECT * FROM users WHERE username = '" . $username . "'";
				$results = $link->query($userSQL);
				
				if ($results->num_rows != 0) {
					$errorMessage = "The entered username is taken. Please enter a new username.";
				} else {
					$newUser = "INSERT INTO users (username, password) VALUES ('" . $username . "', '" . $password . "')";
					$link->query($newUser);
					$_SESSION["currentUser"] = $username;
				}
			}
		}
		
	} else {
		$username = "";
		$password = "";
	}
  ?>
  
  <head>
    <title>Create Account</title>
	<link rel="stylesheet" href="../styles/main.css" />
	<link rel="stylesheet" href="../styles/mobile.css" media="screen and (max-width:480px)" />
	<link rel="stylesheet" href="../styles/desktop.css" media="screen and (min-width:481px)" />
	<script src="../scripts/login.js"></script>
	<script src="../scripts/menu.js"></script>
  </head>

  <body>
    <header>
      <hgroup>
        <h1>A Brief Introduction to Coffee</h1>
        <p><strong>New User</strong></p>
      </hgroup>
      <nav>
        <ul>
			<li><a href="../index.php">Home</a></li>
			<li><a href="./about.php">Introduction</a></li>
			<li><a href="./content.php">Tasting</a></li>
			<li><a href="./location.php">Origins</a></li>
			<li><a href="./survey.php">Survey</a></li>
			<li><a href="./drinks.php">Beverages</a></li>
			<li><a href="./drinks2.php">More Beverages</a></li>
			<li><a href="./blog.php">Blog</a>
				<div id="dropDown">&#8650;
					<ul id="dropDownContent" class="close" >
						<li><a href="./posts/blonde.php">Blonde</a></li>
						<li><a href="./posts/oddly.php">Dukamo</a></li>
					</ul>
				</div>
			</li>
			<?php
				if (isset($_SESSION["currentUser"])) {
					echo "<li><a href='./account.php'>Account</a></li>";
				} else {
					echo "<li><a href='./login.php'>Login</a></li>";
				}
			?>
		</ul>
      </nav>
    </header>
    
	<main>
		<form id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
			<section class="l">
				<h2>New User</h2>
			</section>
			
			<section class="para">
				<p>Enter a username and password to create your new account!</p>
			</section>
		
			<section class="fs">
				<fieldset>
					<legend>Create an Account</legend>
					<label for="username">Username</label>
					<input type="text" name="username" id="username" />
					<label for="password">Password</label>
					<input type="password" name="password" id="password" />
					
					</br>
					</br>
					
					<section id="validationDiv">
						<p>
							<?php 
								if ($errorMessage != "") {
									echo $errorMessage;
								}
								if ($results != "") {
									foreach ($results as $row) {
										echo "username: " . $row["username"] . ", password: " . $row["password"];
									}
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
