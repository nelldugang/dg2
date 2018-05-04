<?php
// initializ shopping cart class
include 'Cart.php';
$cart = new Cart;

if (isset($_SESSION['userName']) == null){
    echo '<script>alert("Sorry. Please Create an account first");</script>';
    header('location: register.php');

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Cart - PHP Shopping Cart Tutorial</title>
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
    .container{padding: 50px;}
    input[type="number"]{width: 20%;}
    </style>
    <script>
    function updateCartItem(obj,id){
        $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
            if(data == 'ok'){
                location.reload();
            }else{
                alert('Cart update failed, please try again.');
            }
        });
    }
    </script>
</head>
</head>
<body>
<?php
require "partials/navbar.php";
?>


<div class="container" style="font-family: 'Montserrat', sans-serif;">
    <div class="panel panel-default">
    <div class="panel-heading"><h1>Cart</h1></div>
    <table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>&nbsp;</th>
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
            <td><?php echo '₱'.$item["price"].' PHP'; ?></td>
            <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
            <td><?php echo '₱'.$item["subtotal"].' PHP'; ?></td>
            <td>
                <!--<a href="cartAction.php?action=updateCartItem&id=" class="btn btn-info"><i class="glyphicon glyphicon-refresh"></i></a>-->
                <a href="cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="5"><p>You don't have any items in your cart..</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td><a href="indexhope.php" class="btn btn-primary"><i class="glyphicon glyphicon-menu-left"></i>Back to Shop</a></td>
            <td colspan="2"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo '₱'.$cart->total().' PHP'; ?></strong></td>
            <td><a href="checkout.php" class="btn btn-success btn-block">Checkout <i class="glyphicon glyphicon-menu-right"></i></a></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
</div>
</div>
<br><br><br><br><br><br>
<?php
require "partials/footer.php";
?>
</body>
</html>