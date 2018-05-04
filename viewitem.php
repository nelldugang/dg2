<?php 

require 'dbconnect.php';

$id = $_GET['id'];
// $quantity = $_GET['qty'];
$quantity = 1;
$upload_dir = 'uploads/';

$sql = "SELECT * from products WHERE id = '$id'";

$result = mysqli_query($dbcon, $sql);
$row = mysqli_fetch_assoc($result);
extract($row);

$number = $row['price'];
setlocale(LC_MONETARY,"de_DE");


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
	@import url('https://fonts.googleapis.com/css?family=Fredoka+One|Montserrat');
	body {
		/*font-family: 'Montserrat', sans-serif;*/
		font-family: 'Fredoka One', cursive;
	}
	.desc {
		font-family: 'Montserrat', sans-serif;
	}
	.sizebox {
	height: 30px;
    width: 30px;
    border: 1px solid #000;
    background-color: white;
    color: #262626;
    font-size: 14px;
    text-align: center;
    vertical-align: middle;
    line-height: 14px;
    display: inline-block;
    float: left;
    margin-right: 10px;
    margin-top: 5px;
    margin-bottom: 5px;
    }
	</style>
    
</head>
<body>
<?php
require "partials/navbar.php";
?>

<section class="section" style="padding:50px">
	<div class="container">
		<div class="columns">
			<div class="col-md-6" style="height:512px; width:400px;">
				
					<img class="" style="height:100%;width:100%" src="<?php echo $upload_dir.$row['picture']; ?>">
				
			</div>
			<div class="col-md-6" style="padding-top: 50px;">
				<h1><?php echo $row['productName']; ?></h1>
				<h3><?php echo $row['productType']; ?></h3>
				<p class="desc"><?php echo $row['productDesc']; ?></p>
				
				
				
				<!-- item qty -->
					<nav class="level">
						<div class="level-left">
							<div class="level-item">
							</div>
							<p>Size:</p>
							<button class="sizebox">XS</button>
							<button class="sizebox">S</button>
							<button class="sizebox">M</button>
							<button class="sizebox">L</button>
							<button class="sizebox">XL</button><br><br>
							<h4><?php echo '₱ '.$row['price']; ?></h4>
							</div>
					</nav>
				<!-- /item qty -->

					<div class="field">
						<p class="control">
							<input type="number" name="itemId" class="input hide" value="<?php echo $id ?>">
						</p>
						<p class="control">
							<a class="btn btn-success addcart" href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>"><span class='icon'>
                        <i class='fas fa-shopping-cart font-color'></i>
                    			</span>ADD TO CART</a>		
						</p>		
					</div>
			</div>
		</div>
	</div>
</section>


<?php
require "partials/footer.php";
?>
</body>
</html>