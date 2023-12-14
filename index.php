<DOCTYPE html>
<html>
  <?php
	include "php/functions.php";
	session_start();
  ?>
  
  <head>
    <title>A Brief Introduction to Coffee</title>
	<link rel="stylesheet" href="styles/main.css" />
	<link rel="stylesheet" href="styles/mobile.css" media="screen and (max-width:480px)" />
	<link rel="stylesheet" href="styles/desktop.css" media="screen and (min-width:481px)" />
	<script src="scripts/menu.js"></script>
  </head>

  <body>
	<?php
		pageHeader("Home");
	?>

    <main>
      <p>Welcome to my introduction to coffee website! This is the index, which
      explains what each page is about.</p>
      <ul>
		<li>
			Log in <a href="./pages/login.php">here</a>!
		</li>
        <li>
			The <a href="./pages/about.php">about</a> page is the introduction to the
			very basics of coffee: what it is and how it's made.
		</li>
        <li>
			The <a href="./pages/content.php">tasting</a> page explains what flavors
			can be present in coffee and how to discover and describe them. It also
			covers how the flavor can be affected by different variables: primarily
			roast level, brewing parameters, and origin (briefly, as origin is the 
			focus of the <a href="./pages/location.php">origins</a> page.)
		</li>
        <li>
			The <a href="./pages/location.php">origins</a> page describes the flavor
			profiles of various origins for coffee and at least briefly addresses all
			significant coffee-growing regions on Earth.</li>
		<li>
			Click <a href="./pages/survey.php">here</a> to take the coffee survey!
		</li>
		<li>
			The <a href="./pages/drinks.php">beverages</a> list describes
			some of the
			most common coffee-based beverages.
		</li>
		<li>
			The <a href="./pages/drinks.php">more beverages</a> list describes
			less common coffee-based beverages.
		</li>
		<li>
			The <a href="./pages/blog.php">blog index</a> page contains a table
			of all the blog posts.
		</li>

    </main>

    <footer>
    <hr>
      <p>Andrew Ruff, Dottie Hildrich</p>
    </footer>
  </body>
</html>
