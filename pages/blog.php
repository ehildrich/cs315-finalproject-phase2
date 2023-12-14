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
		pageHeader("Blog");
	?>

 		<h2>Blog Posts</h2>
		<table>
		<thead>
			<tr>
				<th>Review</th>
				<th>Score</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><a href="posts/blonde.php">Starbucks Blonde Roast</a></td>
				<td>5/10</td>
			</tr>
			<tr>
				<td><a href="posts/oddly.php">Oddly Correct Ethiopia Dukamo Natural</a></td>
				<td>8/10</td>
			</tr>
		</tbody>
		</table>

    <footer>
    <hr>
    <p>Andrew Ruff, Dottie Hildrich</p>
    </footer>
  </body>
</html>
