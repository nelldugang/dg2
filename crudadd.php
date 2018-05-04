<?php session_start();

if (isset($_SESSION['userName']) == null){
	header('location: register.php');
} else if ($_SESSION['userName'] != 'admin'){
	header('location: indexhope.php');
}


	require_once('dbconnect.php');
	$upload_dir = 'uploads/';

	if(isset($_POST['btnSave'])){
		$productName = $_POST['productName'];
		$productType = $_POST['productType'];
		$productDesc = $_POST['productDesc'];
		$size = $_POST['size'];
		$price = $_POST['price'];
		$productID = $_POST['productID'];

		$imgName = $_FILES['myfile']['name'];
		$imgTmp = $_FILES['myfile']['tmp_name'];
		$imgSize = $_FILES['myfile']['size'];

		if(empty($productName)){
			$errorMsg = 'Please input name';
		}elseif(empty($productType)){
			$errorMsg = 'Please input position';
		}elseif(empty($imgName)){
			$errorMsg = 'Please select photo';
		}else{
			//get image extension
			$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
			//allow extenstion
			$allowExt  = array('jpeg', 'jpg', 'png', 'gif');
			//random new name for photo
			$userPic = time().'_'.rand(1000,9999).'.'.$imgExt;
			//check a valid image
			if(in_array($imgExt, $allowExt)){
				//check image size less than 5MB
				if($imgSize < 5000000){
					move_uploaded_file($imgTmp ,$upload_dir.$userPic);
				}else{
					$errorMsg = 'Image too large';
				}
			}else{
				$errorMsg = 'Please select a valid image';
			}
		}

		//check upload file not error than insert data to database
		if(!isset($errorMsg)){
			$sql = "insert into products(productName, productType, price, productDesc, size, picture, productID)
					values('".$productName."', '".$productType."', '".$price."','".$productDesc."','".$size."','".$userPic."','".$productID."')";
			$result = mysqli_query($dbcon, $sql);
			if($result){
				$successMsg = 'New record added successfully';
				header('location:crudindex.php');
			}else{
				$errorMsg = 'Error '.mysqli_error($dbcon);
			}
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Uploadimage</title>
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap-theme.min.css">
</head>
<body>

<?php
require "partials/navbar.php";
?>

<div class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<h3 class="navbar-brand">Manage Products</h3>
		</div>
	</div>
</div>
<div class="container">
	<div class="page-header">
		<h3>Add New</h3>
		<br>
			<a class="btn btn-default" href="crudindex.php">Back</a>
	</div>

	<?php
		if(isset($errorMsg)){		
	?>
		<div class="alert alert-danger">
			<span class="glyphicon glyphicon-info">
				<strong><?php echo $errorMsg; ?></strong>
			</span>
		</div>
	<?php
		}
	?>

	<?php
		if(isset($successMsg)){		
	?>
		<div class="alert alert-success">
			<span class="glyphicon glyphicon-info">
				<strong><?php echo $successMsg; ?> - redirecting</strong>
			</span>
		</div>
	<?php
		}
	?>

	<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
		<div class="form-group">
			<label for="name" class="col-md-2">Product Name</label>
			<div class="col-md-10">
				<input type="text" name="productName" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="position" class="col-md-2">Product Type</label>
			<div class="col-md-2"><select class="form-control" value="productType" name="productType">
				<option value="snowboard">Snowboard</option>
				<option value="jackets">Jackets</option>
				<option value="Boots">Boots</option>
				<option value="gogglemask">Goggle/Mask</option>
				<option value="bindings">Bindings</option>
			</select>
			</div>
		</div>
		<div class="form-group">
			<label for="position" class="col-md-2">Product ID</label>
			<div class="col-md-2"><select class="form-control" value="productID" name="productID">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4/Mask</option>
				<option value="5">5</option>
			</select>
			</div>
		</div>
		<div class="form-group">
			<label for="position" class="col-md-2">Product Description</label>
			<div class="col-md-10">
				<input type="text" name="productDesc" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="position" class="col-md-2">Price</label>
			<div class="col-md-10">
				<input type="number" name="price" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="position" class="col-md-2">Dimensions</label>
			<div class="col-md-10">
				<input type="text" name="size" class="form-control">
			</div>
		</div>
		
		<div class="form-group">
			<label for="picture" class="col-md-2">Photo</label>
			<div class="col-md-10">
				<input type="file" name="myfile">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2"></label>
			<div class="col-md-10">
				<button type="submit" class="btn btn-success" name="btnSave">
					<span class="glyphicon glyphicon-save"></span>Save
				</button>
			</div>
		</div>
	</form>
</div>

</body>
</html>