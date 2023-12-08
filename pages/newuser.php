<DOCTYPE html>
<html>
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
		</ul>
      </nav>
    </header>
    
	<main>
		<form>
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
					<input type="text" id="username" />
					<label for="password">Password</label>
					<input type="password" id="password" />
					
					</br>
					</br>
					
					<section id="validationDiv">
						<p></p>
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
