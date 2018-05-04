<?php

// include database configuration file
include 'dbconnect.php';

// initializ shopping cart class
include 'Cart.php';
$cart = new Cart;


if (isset($_SESSION['userName']) == null){
    echo '<script>alert("Sorry. Please Create an account first");</script>';
    header('location: register.php');

}

// redirect to home if cart is empty
if($cart->total_items() <= 0){
    header("Location: indexhope.php");
}


$userid = $_SESSION['accountID'];
$sql = $dbcon->query("SELECT * FROM customers WHERE id = $userid");
// $custRow = mysqli_fetch_assoc($ql);
$custRow = $sql->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checkout - PHP Shopping Cart Tutorial</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    
    <style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat|Fredoka+One');
   
    body {
        
      /*font-family: 'Fredoka One', cursive;*/
      font-family: 'Montserrat', sans-serif;

    }
    .container{width: 100%;padding: 50px;}
    .table{width: 65%;float: left;}
    .shipAddr{width: 30%;float: left;margin-left: 30px;}
    .footBtn{width: 95%;float: left;}
    .orderBtn {float: right;}
    </style>
</head>
<body>
<?php
require "partials/navbar.php";
?>    
<div class="container" style="font-family: 'Montserrat', sans-serif;padding-bottom: 0;">
    <div class="panel panel-default">
    <div class="panel-heading"><h1>Order Preview</h1></div>
    <table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["productName"]; ?></td>
            <td><?php echo '$'.$item["price"].' USD'; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo '$'.$item["subtotal"].' USD'; ?></td>
            <td colspan="1"></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>No items in your cart......</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            
            <td colspan="3"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td><strong>Total: <?php echo '$'.$cart->total().' USD'; ?></strong></td>
            <?php } ?>
            <td><a href="cartAction.php?action=placeOrder" class="btn btn-danger orderBtn">Place Order <i class="glyphicon glyphicon-menu-right"></i></a></td>
        </tr>
    </tfoot>
    </table>
    </div>
</div>

<div class="container" style="padding-top: 0px;">
    
       <h2>Shipping Details</h2>
        
        <p><?php echo $custRow['fullName']; ?></p>
        <p><?php echo $custRow['email']; ?></p>
        <p><?php echo $custRow['phone']; ?></p>
        <p><?php echo $custRow['address']; ?></p>
        
    

    <div class="footBtn">
        <a href="indexhope.php" class="btn btn-primary"><i class="glyphicon glyphicon-menu-left"></i>Go Back to Store</a>
        
    </div>
</div>

<br>
<?php
require "partials/footer.php";
?>

</body>
</html>