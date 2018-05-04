<?php
session_start();
require "dbconnect.php";

/*form values */


if (isset($_POST['submit'])){
$fullname = mysqli_real_escape_string($dbcon, $_POST['fullName']);
$username = mysqli_real_escape_string($dbcon, $_POST['userName']);
$password = mysqli_real_escape_string($dbcon, $_POST['password']);
$password2 = mysqli_real_escape_string($dbcon, $_POST['confpassword']);
$email = mysqli_real_escape_string($dbcon, $_POST['email']);
$phone = mysqli_real_escape_string($dbcon, $_POST['phone']);
$address = mysqli_real_escape_string($dbcon, $_POST['address']);

$checkuser = "SELECT * FROM customers where userName ='$username'";
$result = mysqli_query($dbcon, $checkuser);



	if (mysqli_num_rows($result) > 0) {
			
	echo "User name is already used, please enter a different username.";
	// header("Location: userexist.php");
	} else if ($password != $password2){
	echo "passwords did not match.";
	} else {


	// $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
	$sql = "INSERT INTO customers(fullName, userName, password, email, phone, address, accountType) VALUES ('$fullname', '$username', '$password', '$email', '$phone','$address', '2')";
	mysqli_query($dbcon, $sql);

	$_SESSION['accountID'] = mysqli_insert_id($dbcon); /*get user Id*/

// $sql2 = "INSERT INTO accounts(userName, password, type, accountId) VALUES ('$username' , '$password', '2', $id)";
// mysqli_query($dbcon, $sql2);

// $id = mysqli_insert_id($dbcon); /*get accountId*/
$_SESSION['userName'] = $username;
$_SESSION['type'] = '2';



header('location: indexhope.php');

}

}





?>