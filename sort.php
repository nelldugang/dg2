<?php 
session_start();

$category = $_GET['sort'];

if ($category == 'all') {
	$_SESSION['sort'] = 0;
}
else if ($category == 'snowboard') {
	$_SESSION['sort'] = 1;	
}
else if ($category == 'jacket') {
	$_SESSION['sort'] = 2;
}
else if ($category == 'gogglemask') {
	$_SESSION['sort'] = 3;
}
else if ($category == 'boots') {
	$_SESSION['sort'] = 4;
}
else if ($category == 'binding') {
	$_SESSION['sort'] = 5;
}

header('location: indexhope.php');

?>
