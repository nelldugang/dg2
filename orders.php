<?php session_start();
require "dbconnect.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
      @import url('https://fonts.googleapis.com/css?family=Montserrat|Fredoka+One|Paytone+One');
   
    body {
        
     font-family: 'Montserrat', sans-serif;

    }
    </style>

</head>
<body>
<?php
require "partials/navbar.php";
?>

<div class="container">
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><h2>Customer's Orders</h2></div>

  <!-- Table -->
  <table class="table">
   				<tr>
					<th>ID</th>
					<th>Customer Name</th>
					<th>Product Ordered</th>
					<th>Product Type</th>
					<!-- <th>Quantity</th> -->
					<th>Price</th>
					<th>Date ordered</th>
					<th>Shipped to</th>
				</tr>
			
 <?php

$sql = "SELECT c.id, c.address, c.fullName, p.price, oi.quantity, p.productType, p.productName, p.picture, o.created
		FROM customers c LEFT OUTER JOIN orders o ON c.id = o.customer_id LEFT OUTER JOIN order_items oi
		ON o.id=oi.order_id LEFT OUTER JOIN products p ON oi.product_id = p.id ORDER BY o.created DESC";
		$result = mysqli_query($dbcon, $sql);
		
		while($row = mysqli_fetch_assoc($result)){

?>

<tr>
	<td><?php echo $row['id'] ?></td>
	<td><?php echo $row['fullName'] ?></td>
	<td><?php echo $row['productName'] ?></td>
	<td><?php echo $row['productType'] ?></td>
	<!-- <td><?php echo $row['quantity'] ?></td> -->
	<td><?php echo $row['price'] ?></td>
	
	<td><?php echo $row['created'] ?></td>
	<td><?php echo $row['address'] ?></td>
</tr>	




  <!-- Table -->




<?php } ?>	

 </table>		

 
</div>

<a class="btn btn-primary" href="admindashboard.php">Go back</a>

</div>



</body>
</html>