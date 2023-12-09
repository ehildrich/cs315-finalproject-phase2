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
		<h2>Starbucks Blonde Roast Review</h2>

		<p>My university's on-campus Starbucks recently added Starbucks'
		blonde roast to their lineup, bringing them to two bean options.
		I prefer lighter roasts, and Starbucks' standard roast is quite
		dark, so I decided to try the blonde roast in the form of an iced
		Americano (no additives besides the ice) and see if I preferred it.
		</p>
		<p>While I've only had the chance to try it once (a potential problem
		when the drinks are made by humans who will inevitably do things a
		little differently every time), the drink definitely fell flat for
		me. Overall, it was still noticeably bitter, with chocolate notes,
		and minimal acidity. The biggest difference I noticed between their
		blonde and standard roasts is that the blonde tasted noticeably
		weaker. It was almost like they just used less of the same beans.
		This is not what roasting lighter is supposed to do. While some
		coffee drinkers and many large-scale roasters talk about roast level
		in terms of strength, light-roast coffee can be just as potent as
		dark-roast coffee, just with a different flavor profile. The blonde
		roast almost seems to live in the world those strength scales imagine,
		where more roasted=more strong. It actually  wasn't terrible, but I
		see no reason to choose it over the standard roast. I make sure never
		to have high expectations for coffee from restaurants or large chain
		cafes like Starbucks, so I wasn't too disappointed, but I was hoping
		to at least like it a little better than their default roast.
		</p>

		<p>There are some factors that could have contributed to this problem.
		Natural variation in drinks prepared by humans means that what I was
		served could have just been a fluke, or at least a sample from the low
		end of what Starbucks typically produces. It's also likely that, since
		the beans are less popular, they were older, meaning that they had more
		time to lose flavor to the air compared to the more popular standard
		option. Finally, it's possible that the inherently-greater natural
		variation in the flavor of lighter roasts was a problem. One of the
		reasons Starbucks roasts dark is that they have a global reach and
		huge scale. Smaller businesses can buy enough beans from 1 farm or
		location to supply a handful of stores, but large chains have no such
		luxury. They have to supply a consistent product over multiple
		continents while sourcing their coffee from many different places.
		Dark roasts mostly get their flavor from the roast, while lighter roasts
		preserve more of the beans' character. This means that it is impossible
		to standardize a lighter roast at scale as effectively as a dark one.
		As a result, I may have gotten beans from a particular lot that fell
		relatively far away from Starbucks' desired flavor profile.
		</p>

		<p>Overall, while I'm glad I tried the blonde roast, and I may sample
		it a few more times, it's dull in comparison to its darker-roasted
		sibling, which at least has some character.
		</p>
    </section>

    <footer>
    <hr>
    <p>Andrew Ruff, Dottie Hildrich</p>
    </footer>
  </body>
</html>
