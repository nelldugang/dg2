<?php session_start();
require "dbconnect.php";
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    //select old photo name from database
    $sql = "select picture from products where id = ".$id;
    $result = mysqli_query($dbcon, $sql);
    if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      $sql = "delete from products where id=".$id;
      if(mysqli_query($dbcon, $sql)){
        header('location: crudindex.php');
      }
    }
  }





?>
 

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <style type="text/css">
      @import url('https://fonts.googleapis.com/css?family=Montserrat|Fredoka+One|Paytone+One');
   
    body {
       font-family: 'Fredoka One', cursive;
       /*font-family: 'Montserrat', sans-serif;*/
    }

    .this {
      font-family: 'Montserrat', sans-serif;
    }
    </style>

</head>
<body>
<?php
require 'partials/navbar.php';
?>

<?php
    if (isset($_SESSION['userName'])) {
        $username = $_SESSION['userName'];

        // find username firstName
        $sql = "SELECT * FROM customers WHERE
           userName = '$username'";
        $result = mysqli_query($dbcon, $sql);
        $row = mysqli_fetch_assoc($result);
?>     

<div class="container"></div>
<div class="row"></div>
  <div class="col-md-5 this">
          <form>
          <h1>Customer Profile</h1>
            <label>User Name : </label>
            <h2> <?php echo $row['userName']; ?></h2>
            <h4>Full Name : </h4>
            <h2> <?php echo $row['fullName']; ?></h2>
            <h4>Email : </h4>
            <h2> <?php echo $row['email']; ?></h2>
            <h4>Phone Number : </h4>
            <h2> <?php echo $row['phone']; ?></h2>
            <h4>Address : </h4>
            <h2> <?php echo $row['address']; ?></h2>
            <a class="btn btn-primary" href="profileedit.php?id=<?php echo $row['id'] ?>">Edit</a>
          </form>      
  </div>
 

   <?php } ?>

<div class="col-md-7 this">

     <table class="table">
          <h1>Your Orders</h1>
          <tr>
          <th>Customer Name</th>
          <th>Product Type</th>
          <th>Product Ordered</th>
          <th>Price</th>
          <th>Date ordered</th>
          <th>Shipped to</th>
        </tr>

<?php
     if (isset($_SESSION['userName'])) {
        $username = $_SESSION['userName'];

        $sql = "SELECT c.id, c.address, c.fullName, p.price, p.productType, oi.quantity, p.productName, p.picture, o.created
        FROM customers c LEFT OUTER JOIN orders o ON c.id = o.customer_id LEFT OUTER JOIN order_items oi
        ON o.id=oi.order_id LEFT OUTER JOIN products p ON oi.product_id = p.id WHERE userName = '$username' ORDER BY o.created DESC";
        $result = mysqli_query($dbcon, $sql);
        while($row = mysqli_fetch_assoc($result)){

?>
   
   <tr>
      <td><?php echo $row['fullName'] ?></td>
      <td><?php echo $row['productName'] ?></td>
      <td><?php echo $row['productType'] ?></td>
      <td><?php echo $row['price'] ?></td>
      <td><?php echo $row['created'] ?></td>
      <td><?php echo $row['address'] ?></td>
      <td><a class="btn btn-danger" href="profile.php?delete=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
              <i class="glyphicon glyphicon-trash"></i></td>
  </tr> 
  
<?php } ?>  
</table>


<?php } ?>
  </div>          
</div>
</div>

<?php
// require "partials/footer.php";
?>


  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

</body>

</html>