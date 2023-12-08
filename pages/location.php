<DOCTYPE html>
<html>
  <?php
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
    <header>
      <hgroup>
        <h1>A Brief Introduction to Coffee</h1>
        <p><strong>Origin Atlas</strong></p>
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

    <article>
      <section>
		  <h2>Coffee Growing Regions</h2>
		  <p>Origin (where a coffee was grown) is an impactful factor in coffee,
		  for lighter roasts nearly as significant it is in wine, both
		  because of the influence of climate, elevation, and soil on the beans and
		  because of the influence of local methods (e.g. smallholding vs large
		  estates, prevalence of washed or natural process, varieties grown, etc.).
		  This page briefly describes coffee-growing regions, divided by continent.</p>
      </section>

      <section class="location-card">
		  <h3>Africa</h3>
		  <p>Most African coffee comes from East Africa, including Ethiopia, where
		  the coffee plant originated. The famous Geisha variety also originated
		  in Ethiopia, and is known for delicate floral flavors. Light roasts are
		  common for coffees from this region, with Ethiopia having fermented fruity
		  or delicate flowery coffees. Yemen, just across the Strait of Aden, is
		  often grouped with these countries, but does not grow coffee on a large
		  enough scale to make it easily available worldwide. Kenyan and other East
		  African coffees often have red fruit or black fruit flavors, and sometimes
		  a certain unplaceable savory flavor as well. Africa is a very popular
		  region among enthusiasts for its propensity for producing coffee with
		  complex and novel flavors.</p>
      </section>

      <section class="location-card">
		  <h3>South  and Central America</h3>
		  <p>South America produces a good deal of specialty coffee but also a
		  large amount of commodity coffee destined to be roasted so dark that
		  its origin is indiscernible. There's nothing wrong with that, but of
		  course enthusiasts are not interested in such coffees. The region
		  is quite large and produces a great variety of quality and flavors,
		  so I won't try to summarize it here. Even where I do give a summary,
		  keep in mind that I am almost certainly ignoring a variety of interesting
		  coffees from each region, because it's impossible to summarize all
		  of what can be found in any country in one sentence.</p>
      </section>

      <section class="location-card">
		  <h3>Asia</h3>
		  <p>Coffee is grown in South and Southeast Asia, including India,
		  Indonesia, and Papua New Guinea. Generally, Southeast Asian
		  coffees have earthy and woody flavors and are usually roasted dark.
		  Java and other Indonesian islands are known for this flavor profile.
		  Indian coffees can have a more spicy flavor profile, though I've
		  never seen an Indian single-origin coffee on the market (apparently, the
		  best beans are consumed locally, which makes sense--I'd do that too!).
		  Commodity growing quite common throughout the region, but the specialty
		  market is developing, so there will likely be exciting developments out
		  of this region in the future.</p>
      </section>

    </article>

    <footer>
    <hr>
      <p>Andrew Ruff, Dottie Hildrich</p>
    </footer>
  </body>
</html>
