<DOCTYPE html>
<html>
  <?php
	session_start();
  ?>
  
  <head>
    <title>A Brief Introduction to Coffee</title>
	<link rel="stylesheet" href="../../styles/main.css" />
	<link rel="stylesheet" href="../../styles/mobile.css" media="screen and (max-width:480px)" />
	<link rel="stylesheet" href="../../styles/desktop.css" media="screen and (min-width:481px)" />
	<script src="../../scripts/menu.js"></script>
  </head>

  <body>
    <header>
      <hgroup>
        <h1>A Brief Introduction to Coffee</h1>
        <p><strong>General Introduction</strong></p>
        <p>
			<?php
				if (isset($_SESSION["currentUser"])) {
					echo "Welcome, " . $_SESSION["currentUser"];
				}
			?>
		</p>
      </hgroup>
      <nav>
        <ul>
			<li><a href="../../index.php">Home</a></li>
			<li><a href="../about.php">Introduction</a></li>
			<li><a href="../content.php">Tasting</a></li>
			<li><a href="../location.php">Origins</a></li>
			<li><a href="../survey.php">Survey</a></li>
			<li><a href="../drinks.php">Beverages</a></li>
			<li><a href="../drinks2.php">More Beverages</a></li>
			<li><a href="../blog.php">Blog</a>
				<div id="dropDown">&#8650;
					<ul id="dropDownContent" class="close" >
						<li><a href="./blonde.php">Blonde</a></li>
						<li><a href="./oddly.php">Dukamo</a></li>
					</ul>
				</div>
			</li>
			<?php
				if (isset($_SESSION["currentUser"])) {
					echo "<li><a href='../account.php'>Account</a></li>";
				} else {
					echo "<li><a href='../login.php'>Login</a></li>";
				}
			?>
		</ul>
      </nav>
    </header>

    <section>
		<h2>Oddly Correct Ethiopia Dukamo Natural Review</h2>
		<p>It actually tastes like blueberries. That's pretty cool.
		</p>

    </section>

    <footer>
    <hr>
    <p>Andrew Ruff, Dottie Hildrich</p>
    </footer>
  </body>
</html>
