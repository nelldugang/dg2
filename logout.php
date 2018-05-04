<?php
session_start(); 
// if (isset($_SESSION['userName']) && $_SESSION['userName'] != "") {
// 	$_SESSION['userName'] = "";
// 	unset($_SESSION['userName']);
// 	session_destroy();
// 	header("location : register.php");
// } else {
// 	header("location : register.php");
// }

session_destroy(); 
header("location: register.php"); 
exit();
die(); 


?>