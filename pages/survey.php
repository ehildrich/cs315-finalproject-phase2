<DOCTYPE html>
<html>
  <?php
	session_start();
  ?>
  
  <head>
    <title>Coffee Survey</title>
	<link rel="stylesheet" href="../styles/main.css" />
	<link rel="stylesheet" href="../styles/mobile.css" media="screen and (max-width:480px)" />
	<link rel="stylesheet" href="../styles/desktop.css" media="screen and (min-width:481px)" />
	<script src="../scripts/form.js"></script>
	<script src="../scripts/menu.js"></script>
  </head>

  <body>
    <header>
      <hgroup>
        <h1>A Brief Introduction to Coffee</h1>
        <p><strong>Coffee Survey</strong></p>
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
				<h2>The Coffee Survey</h2>
			</section>
			
			<section class="para">
				<p>Take this short survey to let everyone know your coffee opinions!</p>
			</section>
			
			<section class="rec">
				<h2>Most Recent Submission</h2>
				<p id="recentInputs" class="rec"></p>
			</section>
		
			<section class="fs">
				<fieldset>
					<legend>Survey</legend>
					<label for="number">How many cups of coffee do you drink in an average week?</label>
					<input type="text" id="number" />
					
					</br>
					
					<label for="flavor">What is your favorite flavor of coffee?</label>
					<select type="select" id="flavor">
						<option value=""></option>
						<option value="roast">Roasted</option>
						<option value="spice">Spicy</option>
						<option value="nutty">Nutty</option>
						<option value="sweet">Sweet</option>
						<option value="floral">Floral</option>
						<option value="fruit">Fruity</option>
						<option value="sour">Fermented</option>
						<option value="veg">Vegetative</option>
						<option value="other">Other</option>
					</select>
					
					</br>
					
					<label for="continent">Which continent produces your favorite coffee?</label>
					<input type="radio" name="continent" class="continentRadio" value="africa">Africa</br>
					<input type="radio" name="continent" class="continentRadio" value="southCentralAmerica">South/Central America</br>
					<input type="radio" name="continent" class="continentRadio" value="asia">Asia
					
					</br>
					</br>
					
					<section id="validationDiv" >
						<p></p>
					</section>
				</fieldset>
			</section>
			
			<section class="sb">
				<button type="button" id="submitBtn">Submit</button>
			</section>
			
			<section class="rb">
				<button type="reset" id="resetBtn">Reset</button>
			</section>
	</main>
	
    <footer>
      <hr>
      <p>Andrew Ruff, Dottie Hildrich</p>
    </footer>
  </body>
</html>
