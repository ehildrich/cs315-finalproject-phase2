<?php 
	function normalizeString($string) {
		$newString = trim($string);
		$newString = stripslashes($newString);
		$newString = htmlspecialchars($newString);
		return $newString;
	}

	function validateString($string) {
		if ($string == "") {
			return "empty";
		}
	}


	function pageHeader($title) {
	if (isset($_SESSION["currentUser"])) {
		$navbar_end = "<li><a href='/pages/cart.php'>Cart</a></li>\n<li><a href='/pages/account.php'>Account</a></li>";
	} else {
		$navbar_end = "<li><a href='/pages/login.php'>Login</a></li>";
	}
	$user_welcome = "";
	if (isset($_SESSION["currentUser"])) {
		$user_welcome = "Welcome, " . $_SESSION["currentUser"];
	}
	echo<<<EOT
	<header>
	<hgroup>
	<h1>A Brief Introduction to Coffee</h1>
	<p><strong>{$title}</strong></p>
	<p>
		{$user_welcome}
	</p>
	</hgroup>
		<nav>
		<ul>
			<li><a href="/index.php">Home</a></li>
			<li><a href="/pages/about.php">Introduction</a></li>
			<li><a href="/pages/content.php">Tasting</a></li>
			<li><a href="/pages/location.php">Origins</a></li>
			<li><a href="/pages/survey.php">Survey</a></li>
			<li><a href="/pages/drinks.php">Beverages</a></li>
			<li><a href="/pages/drinks2.php">More Beverages</a></li>
			<li><a href="/pages/blog.php">Blog</a>
				<div id="dropDown">&#8650;
					<ul id="dropDownContent" class="close" >
						<li><a href="/pages/posts/blonde.php">Blonde</a></li>
						<li><a href="/pages/posts/oddly.php">Dukamo</a></li>
					</ul>
				</div>
			</li>
			<li><a href="/pages/shop.php">Shop</a></li>
			{$navbar_end}
	</ul>
	</nav>
	</header>
	EOT;
	}




?>
