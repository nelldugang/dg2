<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
	
	
<!-- 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
	<link rel="stylesheet" type="text/css" href="bootstrap/style/register.css">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<style type="text/css">
	.drop2 {
			  left: 50%;
			  right: auto;
			  text-align: center;
			  transform: translate(-50%, -40%);
			  width: 300px !important;
			  height: 250px !important;

			}
	</style>
</head>
<body>

<div class="container-fluid" style="background-color:#4682B4">
	<div class="row">
		<div class="col-md-5 wave"> 
			<img class="img-left" src="assets/img/check1.jpg">
		</div>
		<div class="col-md-2 form wave2" style="border: 3px solid white;">			
			<img class="img-left" style="height: auto; padding-top:20px; padding-left: 50px; padding-right:50px" src="assets/img/icons/s.png">
		<!-- 	<p style="font-size: 12px;">SELECT REGION:</p>
			<a href="#"><p>PHILIPPINES <img style="height:10px; margin-bottom: 3px" src="assets/img/icons/ph.svg"></p></a>
			<a href="#"><p>UZBEKISTAN <img style="height:10px; margin-bottom: 3px" src="assets/img/icons/uz.svg"></p></a>
			<a href="#"><p>TURKMENISTAN <img style="height:10px; margin-bottom: 3px" src="assets/img/icons/tm.svg"></p></a>-->
			<br><br><br><br><br><br><br><br>




		<li class="dropdown">
          <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" style="font-size: 15px;">REGISTER</a>
          <ul class="dropdown-menu drop1">
           
			<form class="" action="reguser.php" method="POST" id="">
			<h4>Personal Information</h4>
			<label>Full Name : <input class="form-control" required type="name" required name="fullName" id="regFirstName"></label>
			<label>Username : <input class="form-control" type="text" required name="userName" id="regUserName"></label>
			<label>Password : <input class="form-control" type="password" required name="password" id="regPassword"></label>
			<label>Confirm Password : <input class="form-control" type="password" name="confpassword" id="confPassword"></label>
			<label>Email : <input class="form-control" type="email" required name="email" id="email"></label>
			<label>Phone : <input class="form-control" type="text" name="phone" id="phone"></label>
			<label>Address : <input class="form-control" type="text" name="address" id="regAddress"></label><br>
			<input class="btn btn-primary" type="submit" name="submit" id="regSubBtn">
			</form>
          </ul>
        </li>
			
			<div><?php
			require "reguser.php";
			?></div>

		<li class="dropdown">
          <a href="#" data-toggle="dropdown" role="button"  aria-expanded="false" style="font-size: 15px;">LOG IN</a>
          <ul class="dropdown-menu drop2">

			<h4>LOG IN ACCOUNT</h4>
			asdd
			<form class="" action="authenticate.php" method="POST">
			
			<label>Username:<input class="form-control" type="name" required name="userlog"></label><br>
			<label>Password: <input class="form-control" type="password" name="passlog"></label><br>
			<input class="btn btn-primary" type="submit" name="submit1" id="userSubBtn">
			</form>
			
			</ul>
        </li>
			<div><?php
			require "authenticate.php";
			?></div>
			<p style="font-size: 15px;"><a href="indexhope.php">VISIT AS GUEST</a></p>
			<br><br><br><br><br><br><br><br><br>
		<div class="footer">
			<p class="follow">Follow us at</p>
			<br>
			<a href=""><img class="icons" src="assets/img/icons/fblogo.png"></a>
			<a href=""><img class="icons" src="assets/img/icons/googleplus.png"></a>
			<a href=""><img class="icons" src="assets/img/icons/ig.png"></a>
			<a href=""><img class="icons" src="assets/img/icons/youtube.png"></a>
			<a href=""><img class="icons" src="assets/img/icons/twitter.png"></a>
			<br><br><br>

			<p style="font-size: 10px">Most of the images used are not mine. This website is for educational purposes only. Credits to the owner of the images.</p>
			<a style="font-size: 10px" href="">SuperDry</a>
			<a style="font-size: 10px" href="">Burton</a>
			<a style="font-size: 10px" href="">Getwallpapers</a>
		</div>
		
			

	</div>	
		<div class="col-md-5"> 
			<img class="img-right" src="assets/img/check2.jpg">
		</div>

</div>
</div>


<script>
$(document).ready(function(){
    $(".dropdown-toggle").dropdown();
});
</script>
 	
</body>
</html>


