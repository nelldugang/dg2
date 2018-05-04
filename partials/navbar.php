<?php
require "authenticate.php";


if (isset($_SESSION['userName'])) {
	$username = $_SESSION['userName'];

	// find username firstName
	$sql = "SELECT * FROM customers WHERE
		 userName = '$username'";
	$result = mysqli_query($dbcon, $sql);
	$dbarray = mysqli_fetch_assoc($result);
	$firstName = $dbarray['fullName'];
	$id = $dbarray['accountID'];
	$type = $dbarray['accountType'];


}
else {
	$firstName = 'Guest';

}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="capstone1.css">
	<meta name="viewport" content="width=device-width, initial-scale-1.0">
	<style type="text/css">
	@import url('https://fonts.googleapis.com/css?family=Montserrat|Fredoka+One|Anton|Catamaran:900');
		nav.navbar-inverse>li>a {
		 padding-top: 25px;
		 padding-bottom: 25px;
		}

		.navAdmin {
			/*text-decoration: inherit!important;*/
			color: grey!important;

		}

		.navbar {
			font-size: 17px;
			min-height:30px;
			
		}

			.navbar-brand {
			  padding: 0 15px;
			  height: 60px;
			  line-height: 60px;
			}

			.navbar-toggle {
			  /* (80px - button height 34px) / 2 = 23px */
			  margin-top: 23px;
			  padding: 9px 10px !important;
			}

			@media (min-width: 600px) {
			  .navbar-nav > li > a {
			    /* (80px - line-height of 27px) / 2 = 26.5px */
			    padding-top: 20.5px;
			    padding-bottom: 20.5px;
			    line-height: 20px;
			  }
			}

		.container-fluid {
     padding:0 !important;;
		}
		



	</style>


</head>
<body>
<nav class="navbar navbar-inverse" style="font-family:'Anton', sans-serif;position: relative:margin-bottom:0!important;border-radius: 0;">
<!--   <div class="container-fluid"> -->
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button><div>
      <a class="navbar-brand" href="indexhope.php"><img src="assets/img/icons/s.png" style="width:auto;/*position: absolute*/;left: 30%;
    	margin-left: 1px !important;
    display: block;height:60px;padding:2px"></a></div>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="indexhope.php#stophere">SHOP</a></li>
        <li><a href="indexhope.php#footer">CONTACT US</a></li>
        
        
      </ul>
      
      <ul class="nav navbar-nav" style="float:right">
      		
      	<li><?php  //account username
			if ($firstName == 'Guest'){
				echo "<a class='navbar-item navAdmin'>
					<span class='icon'>
						<i class='fas fa-user font-color'></i>
					</span>
					$firstName 
				</a>";
			}

			elseif ($firstName == 'admin'){
				echo "<a class='navbar-item navAdmin'>
					<span class='icon'>
						<i class='fas fa-user font-color'></i>
					</span>
					Admin </a>
				";
			} else {
				echo "<a class='navbar-item' href='profile.php?id=$id'>
					<span class='icon'>
						<i class='fas fa-user font-color'></i>
					</span>
					$firstName
				</a>";
			}
			?></li>
			<li><?php //check if admin/
			if (isset($_SESSION['accountType']) && ($_SESSION['accountType']) == 1) {
				echo "<a href='admindashboard.php' class='navbar-item'>
					Dashboard
 				</a>";	
			}
			else {
				echo "<a class='navbar-item' href='viewCart.php'>
					<span class='icon'>
						<i class='fas fa-shopping-cart font-color'></i>
					</span>
					<span>CART

					
					</span></a>";
			}
			?></li>
  			<li><?php 
			if (isset($_SESSION['userName'])) {
				echo "<a href='logout.php' class='navbar-item'>
					LOGOUT
 				</a>";	
			}
			else {
				echo "<a href='register.php' id='showLogin' class='navbar-item'>
					LOGIN/REGISTER
				</a>";
			}
			?></li>
      	
        
	
      </ul>
    </div><!-- /.navbar-collapse -->
 <!--  </div>/.container-fluid -->
</nav>





    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>	

