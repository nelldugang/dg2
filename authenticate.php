<?php

require "dbconnect.php";

if (isset($_POST['submit1'])){
$username = htmlspecialchars($_POST['userlog']);
$password = htmlspecialchars($_POST['passlog']);


$sql = "SELECT * FROM customers WHERE userName = '$username' AND password = '$password'";
$result = mysqli_query($dbcon, $sql);
$_SESSION['userName'] = $username;
	

//verify username/password

	if(mysqli_num_rows($result) > 0){
	$dbarray = mysqli_fetch_assoc($result);
	$_SESSION['userName'] = $dbarray['userName'];
	$_SESSION['accountType'] = $dbarray['accountType'];
	$_SESSION['accountID'] = $dbarray['id'];

	header('location: indexhope.php');

	
		if($_SESSION['userName'] == 'admin') {
			header("location: admindashboard.php");

		}	
	
	}

	else {
	echo "incorrect username/password";
	}

	

}

?>


