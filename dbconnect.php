<?php
 $dbcon = mysqli_connect("localhost","root", "", "fuck"); 
mysqli_set_charset($dbcon, 'utf8');
if (mysqli_connect_errno()){
	echo "Connection Fail" . mysqli_connect_error();
}
?>