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

	<?php
		include "../php/functions.php";
		pageHeader("Shop");
	?>


    <section>
		<h2>Less Ubiquitous Coffee Beverages</h2>

		<p>There are, of course, too many coffee-based beverages to
		list here. However, we still want to showcase the diversity
		of coffee drinks, which does go beyond steamed milk, espresso,
		and syrup. This page lists some options that aren't present
		in large chain cafes like Starbucks, some of which use ingredients
		that aren't milk or syrup.
		</p>
    </section>

    <section>

		<h3> Less Common Drinks and Styles</h3>
		
		<h4>Vietnamese Coffee</h4>
		<p>Vietnam grows a lot of coffee, but most of it is the
		robusta species, which tends to have less prized flavors and
		more caffeine compared to the more premium Arabica species
		(which is what you'll find in the vast majority of bags
		from cafes and specialty roasters). Traditionally, Vietnamese
		coffee is roasted very dark, brewed using a kind of metal filter
		called a <em>phin</em>, and consumed with sweetened condensed
		milk added. I've actually tried this style of coffee (which
		is also popular in other Southeast Asian countries) and didn't
		really like it. However, if you love smokey dark roast flavors
		contrasted with potent sweetness, you should definitely give
		Vietnamese coffee a try.
		</p>
		
		<h4>Espresso Tonic</h4>
		<p>
		The espresso tonic is a recent creation that emerged from
		third-wave specialty cafes. It combines espresso with tonic
		water for a refreshing summertime drink (unlike many other
		beverages made with tonic water, the typical espresso tonic
		contains no alcohol). While tonic water and espresso are
		both bitter, fans say the twin bitternesses almost seem
		to cancel each other out, allowing the refreshing citrus flavors
		of the tonic water and the acidity of the espresso to work
		together for a <em>gestalt</em> impression.
		</p>

		<h4>Cortado/Gibraltar</h4>
		<p>The cortado and Gibraltar are similar drinks that use more
		typical ingredients: espresso and milk. Cortado means "cut" in
		Spanish, referring to the fact that the espresso is cut with
		steamed milk. The Gibraltar was developed by the Blue Bottle
		Coffee Company in San Francisco. Both drinks lie between a
		macchiato and a cappuccino in coffee:milk ratio. A cortado
		uses a 1:1 ratio of steamed milk to espresso, while a Gibraltar
		uses a ratio closer to 1:2, making it relatively stronger. That
		said, these drinks are quite similar, and cafes typically serve
		only one or the other, so the names and recipes are somewhat
		fluid and interchangeable.
		
    </section>

    <footer>
    <hr>
      <p>Andrew Ruff, Dottie Hildrich</p>
    </footer>
  </body>
</html>
