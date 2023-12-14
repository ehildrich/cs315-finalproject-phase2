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
		pageHeader("About");
	?>

    
    <article>
      <p>To many, coffee is just a caffeine fix or a morning ritual. But
      increasingly, it is being recognized as a complex beverage worthy of
      care and appreciation, akin to fine wine or craft beer at its best.
      The purpose of this website is to introduce readers to the complexities
      of coffee from the very basics to reasonable familiarity.</p>
      <p>Coffee is a drink produced by using water to extract substances
      like caffeine and flavor molecules from the roasted coffee bean
      (the seed of any of several plants in the genus <em>Coffea</em> most often
      <em>C. arabica</em> or somewhat less commonly <em>C. canephora</em>. Espresso is
      a type of coffee made by extracting flavors with hot water at high
      pressures.</p>
	  
	  <figure>
		  <picture>
			<source width="100%" media="(min-width:481px)" srcset="../images/Coffee_berries_1.jpg">
			<img width="100%" alt="..." srcset="../images/Coffee_berries_1-SM.jpg">
		  </picture>
	  </figure>
	  
      <p>Coffee originates with coffee plants, which bear small fruits
      called coffee cherries. The fruit's flesh is removed from the bean by
      any of several methods, most commonly by washing it off with water.
      The beans are left to dry and then sold to roasters. Roasters roast
      the coffee by exposing it to heat while keeping the beans moving to
      avoid scorching. This makes the flavor compounds in coffee easier to
      extract by evaporating water, chemically altering compounds, and
      thermally expanding the bean, making the coffee more porous. It also
      creates new flavor compounds entirely by chemically altering the bean,
      for example, via the Maillard reaction. Generally, darker-roasted beans
      (which appear darker and are roasted for longer) have flavor profiles
      dominated by the flavors of roasting--the smoke, chocolate, and caramel
      notes, as well as the bitter flavor produced by these reactions.
      Lighter-roasted beans, roasted for less time, have a stronger acidity
      and greater presence of origin characteristics, which vary based on
      where the coffee was grown. Most coffee drinkers find they prefer a
      particular range of roast levels.</p>
      <p>Coffee reaches its final destination either pre-ground or as whole
      beans. Whole beans, ground freshly before brewing, produce a superior
      end product because exposure to oxygen breaks down the flavor compounds
      in roasted coffee. Ground coffee has a much greater surface area than
      whole-bean coffee, meaning its flavors break down in 24-48 hours,
      whereas whole-bean coffee's flavor is preserved for 1-2 months. Whole-
      bean coffee is ground fresh, ideally in a burr grinder, which ensures
      a more consistent grind size (as opposed to a wide range of sizes,
      which would cause some pieces to be underextracted and some to be
      overextracted). It can then be brewed by various methods, most of
      which are summarized below.</p>
	  
      <figure>
		<picture>
			<source width="100%" media="(min-width:481px)" srcset="../images/burr_grinder.webp">
			<img width="100%" alt="..." srcset="../images/burr_grinder-SM.jpg">
		</picture>
        <figcaption>Image from 1zpresso</figcaption>
      </figure>
	  
      <h3>Filter Brewing</h3>
      <p>Filter brewing methods are quite simple. A paper, cloth, or metal
      mesh filter is placed in a holder, with ground coffee placed at the
      bottom of the filter. Hot water is then poured over the grounds, either
      by hand or automatically.</p>
	  
      <figure>
		<picture>
			<source width="100%" media="(min-width:481px)" srcset="../images/v60.jpg">
			<img width="100%" alt="..." srcset="../images/v60-SM.jpg">
		</picture>
		<figcaption>A photograph of a Hario V60 on a mug by Olgierd Rudak</figcaption>
      </figure>
	  
      <h3>French Press Brewing</h3>
      <p>A French press, or <em>cafetière</em>, consists of a jug and a
      plunger with a filter. Grounds and water are left to mingle in the jug
      for several minutes, and then the plunger is pressed down to filter the
      grounds out of the brewed coffee, leaving them on the bottom.</p>
	  
      <figure>
		<picture>
			<source width="100%" media="(min-width:481px)" srcset="../images/french_press.jpg">
			<img width="100%" alt="..." srcset="../images/french_press-SM.jpg">
		</picture>
		<figcaption>A photograph of a French Press in use
       by Wikimedia Commons user Frettie</figcaption>
      </figure>
	  
      <h3>Espresso</h3>
      <p>Espresso is a complex brewing method invented in the late 19th
      century in Italy. The espresso brewing method produces a small 
      amount of very concentrated coffee (also called espresso), 
      using a specialized machine capable of forcing water through a 
      small, cylindrical puck of ground coffee at pressure. Espresso is
      often used to make coffee-based beverages, because its concentrated
      flavor can influence an entire drink.</p> 
	  
      <figure>
		<picture>
			<source width="100%" media="(min-width:481px)" srcset="../images/espresso_machine.jpg">
			<img width="100%" alt="..." srcset="../images/espresso_machine-SM.jpg">
		</picture>
		<figcaption>A photograph of an espresso being brewed
       by Wikimedia Commons user Arria Belli</figcaption>
      </figure>
      
    </article>

    <footer>
      <hr>
      <p>Andrew Ruff, Dottie Hildrich</p>
    </footer>
  </body>
</html>
