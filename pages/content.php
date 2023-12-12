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
		<h2>Tasting Coffee</h2>
		<p>Coffee is a complex beverage capable of surprising even longtime
		enthusiasts with novel and interesting flavors. I'll first outline
		the primary tastes of coffee and then the flavors. (And yes, there
		is a difference.)</p>
    </section>

    <section>
		<h3>Tastes of Coffee</h3>
		<p>Most people were taught about the 5 tastes in primary school. If
		you need a refresher, they are: sweetness, sourness (or acidity),
		bitterness, saltiness, and umami (savoriness). Some group heat
		(spiciness) among these, but it is really the sensation of heat,
		not a taste that evokes heat. Most humans can detect each of
		these flavors with their tongues, even if their nose is clogged
		or otherwise disabled, though the idea that particular flavors
		can only be tasted using particular regions of the tongue is a
		myth. These 5 tastes come from the tongue, while flavors are
		detected with the nose. You can test this by pinching your nose
		and drinking or eating something flavorful--its flavors will be
		very muted.</p>

		<p>Coffee tends to be dominated by 2 flavors: bitterness and
		acidity. Acidity is sourness, like a green apple (which gets
		its sour taste from malic acid) or a lemon (which gets its
		sour taste from citric acid). Generally, the lighter the
		roast, the more acidic the coffee will be. In coffee, bitterness is
		acidity's frenemy. It's characteristic of darker roasts, and is
		present in arugula and dark chocolate. Most people associate bitterness
		with coffee much more than acidity, because most coffee is a darker roast,
		and the darker the roast, the more bitter the coffee. When acidity and
		bitterness are in balance, they almost seem to cancel each other out,
		producing a very enjoyable cup of coffee. Many coffee drinkers find they
		prefer a particular balance of bitterness and acidity, with some favoring
		darker roasts, more bitterness, and less acidity, some a balanced medium
		roast, and some a more acidic light roast.</p>

		<figure>
			<picture>
				<source width="100%" media="(min-width:481px)" srcset="../images/roast_spectrum.jpg">
				<img width="100%" alt="..." srcset="../images/roast_spectrum-SM.jpg">
			</picture>
			<figcaption>Coffee roasted at 3 different levels,
		  by Wikimedia Commons user Alorin.</figcaption>
		</figure>

		<p>Sweetness is the third most common flavor in coffee. Of course, it can
		be added by adding a sweetener, but I'm discussing only the flavor of
		beans and water here. Drinkers of specialty coffee (coffee of higher
		quality than that found at a Starbucks or from large grocery-store brands)
		often prize a quality called sweetness that exists in the shadow of acidity.
		Many high-quality lighter-roast coffees will leave a surprising sweet
		taste lingering on the tongue, though it is clearly distinct from added
		sweetener.</p>

		<p>Generally, salt and umami tastes are not present in coffee. If
		saltiness is present, it is generally considered a mistake or a sign of
		particularly poor quality.</p>
    </section>

    <section>
		<h3>Flavors of Coffee</h3>
		<p>Coffee can have a huge variety of flavors, from the fruit to chocolate
		to spice to burnt rubber (hopefully you never encounter the latter). These
		flavors are categorized in the SCA Flavor Wheel, pictured below. This
		diagram does a wonderful job of illustrating what flavors can be found in
		coffee, and I won't reiterate everything it says. However, I will touch on
		where particular flavors are commonly found.

		<figure>
			<picture>
				<source width="100%" media="(min-width:481px)" srcset="../images/flavor_wheel.jpg">
				<img width="100%" alt="..." srcset="../images/flavor_wheel-SM.jpg">
			</picture>
			<figcaption>The SCA Flavor Wheel
		  by the Specialty Coffee Association of America.</figcaption>
		</figure>

		In general, the flavors in the "other" category are indicative of some
		problem: poor quality, incorrect storage, very stale coffee, or some
		equipment failure (e.g. a dirty espresso machine). The green/vegetative
		flavors are characteristic of under-roasted coffee. The sour flavors
		are ways of distinguishing different types of acidity (acetic acid
		is vinegar-like, butyric is present in Hershey's chocolate, citric in
		citrus fruits, and malic in sour apples). As mentioned, these are
		characteristic of lightly-roasted coffee. Moving along the wheel
		counterclockwise, the flavors are characteristic of darker and darker-
		roasted coffee. The fruity flavors are typically present in light roasts,
		berry flavors being common in natural process coffee (coffee that was dried
		with the cherry's flesh left on rather than having the cherry's flesh washed
		off). The floral notes are pronounced in the famous Geisha variety in light
		roasts, while sweetness can be present in light and medium roasts.
		Dried fruit flavors or "jam-like" fruit flavors are also common in medium
		roasts. The nutty/cocoa and spice flavors are common in medium and dark
		roast coffee, and the roasted flavors are present in dark roast coffee.</p>
    </section>

    <footer>
    <hr>
      <p>Andrew Ruff, Dottie Hildrich</p>
    </footer>
  </body>
</html>
