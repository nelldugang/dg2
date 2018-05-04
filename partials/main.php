<?php session_start(); ?>
	
<!DOCTYPE html>
<html ><!-- class="has-navbar-fixed-top" -->

<head lang="en">
	<title><?php display_title(); ?></title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">

	<!--   imports bulma   -->
	<link rel="stylesheet" type="text/css" href="bulma/bulma.css">

	<!--   imports custom stylesheets   -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!--   imports fontaweseome   -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>

	<!--   google fonts    -->
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

</head>
<body>

	<?php 
		require "partials/navbar.php";
	?>
		<nav class="level">
			<div class="level-item"></div>
			<div class="level-item notification is-info hide has-text-centered" id="notif"></div>
			<div class="level-item"></div>
		</nav>
	<?php
		display_content();
		require "partials/footer.php" 
	?>

	<!--   imports jQuery   -->
	<script src="js/jquery-3.2.1.min.js"></script>

	<!--   import custom javascript   -->
	<script type="text/javascript" src="js/script.js"></script>


</body>
</html>
