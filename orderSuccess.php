<?php session_start();
if(!isset($_REQUEST['id'])){
    header("Location: indexhope.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Success - PHP Shopping Cart Tutorial</title>
    <meta charset="utf-8">
     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat|Fredoka+One');
   
    body {
        
      font-family: 'Fredoka One', cursive;
      /*font-family: 'Montserrat', sans-serif;*/

    }
    .container{width: 100%;padding: 50px;}
    
    </style>
</head>
</head>
<body>
<?php
require "partials/navbar.php";
?>

<div class="container" style="font-family: 'Montserrat', sans-serif;">
    <h1>Order Status</h1>
    <p style="color: #34a853;font-size: 18px;">Your order has submitted successfully. Order ID is #<?php echo $_GET['id']; ?></p>
</div>    

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
require "partials/footer.php";
?>
   
</div>
</body>
</html>