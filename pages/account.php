<DOCTYPE html>
<html>
  <?php
	include "../php/functions.php";
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
		pageHeader("Account");
	?>

    <main>
      <h2>Your Account Information</h2>
	  <?php 
		if (isset($_SESSION["currentUser"])) {
			echo "<p>Your username: " . $_SESSION["currentUser"] . "</p>";
		} else {
			echo "<p>You are not currently logged in.</p>";
		}
	  
	  
	  ?>
    </main>

    <footer>
	  <hr>
      <p>Andrew Ruff, Dottie Hildrich</p>
    </footer>
  </body>
</html>
