<?php session_start();

if (isset($_SESSION['userName']) == null){
	header('location: register.php');
} else if ($_SESSION['userName'] != 'admin'){
	header('location: indexhope.php');
}



?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<style type="text/css">
		body {
			font-family: 'Montserrat', sans-serif;
		}
	</style>
</head>
<body>
<?php
require "partials/navbar.php";
?>

<div class="container">

<div class="">
  <h1>Hello admin!</h1>
  <p><a class="btn btn-primary btn-lg" href="crudindex.php" role="button">Manage Orders</a> <a class="btn btn-primary btn-lg" href="orders.php" role="button">Check Customer Orders</a></p>
</div>
</div>



</body>
</html>