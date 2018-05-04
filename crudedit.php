<?php session_start();

if (isset($_SESSION['userName']) == null){
	header('location: register.php');
} else if ($_SESSION['userName'] != 'admin'){
	header('location: indexhope.php');
}



	require_once('dbconnect.php');
	$upload_dir = 'uploads/';

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql = "select * from products where id=".$id;
		$result = mysqli_query($dbcon, $sql);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
		}else{
			$errorMsg = 'Could not select a record';
		}
	}

	if(isset($_POST['btnUpdate'])){
		$productName = $_POST['productName'];
		$productType = $_POST['productType'];
		$productDesc = $_POST['productDesc'];
		$size = $_POST['size'];
		$price = $_POST['price'];

		$imgName = $_FILES['myfile']['name'];
		$imgTmp = $_FILES['myfile']['tmp_name'];
		$imgSize = $_FILES['myfile']['size'];

		if(empty($productName)){
			$errorMsg = 'Please input name';
		}elseif(empty($productType)){
			$errorMsg = 'Please input position';
		}

		//udate image if user select new image
		if($imgName){
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
					//delete old image
					echo exec('whoami');
					// chmod($upload_dir, 777);
					unlink($upload_dir.$row['picture']);
					// unlink($upload_dir);
					move_uploaded_file($imgTmp ,$upload_dir.$userPic);
				}else{
					$errorMsg = 'Image too large';
				}
			}else{
				$errorMsg = 'Please select a valid image';
			}
		}else{
			//if not select new image - use old image name
			$userPic = $row['picture'];
		}

		//check upload file not error than insert data to database
		if(!isset($errorMsg)){
			$sql = "update products
									set productName = '".$productName."',
										productType = '".$productType."',
										productDesc = '".$productDesc."',
										size = '".$size."',
										price = '".$price."',
										picture = '".$userPic."'
					where id=".$id;
			$result = mysqli_query($dbcon, $sql);
			if($result){
				$successMsg = 'New record updated successfully';
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

<div class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<h3 class="navbar-brand">PHP upload image</h3>
		</div>
	</div>
</div>
<div class="container">
	<div class="page-header">
		<h3>Add New
			<a class="btn btn-default" href="crudindex.php">
				<span class="glyphicon glyphicon-arrow-left"></span> &nbsp;Back
			</a>
		</h3>
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
				<input type="text" name="productName" class="form-control" value="<?php echo $row['productName']; ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="position" class="col-md-2">Product Type</label>
			<div class="col-md-2"><select class="form-control" value="<?php echo $row['productType'] ?>" name="productType">
				<option value="snowboard">Snowboard</option>
				<option value="jackets">Jackets</option>
				<option value="Boots">Boots</option>
				<option value="gogglemask">Goggle/Mask</option>
				<option value="bindings">Bindings</option>
			</select>
			</div>
		</div>
		<div class="form-group">
			<label for="position" class="col-md-2">Price</label>
			<div class="col-md-10">
				<input type="text" name="price" class="form-control" value="<?php echo $row['price'] ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="position" class="col-md-2">Product Description</label>
			<div class="col-md-10">
				<input type="text" name="productDesc" class="form-control" value="<?php echo $row['productDesc'] ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="position" class="col-md-2">Dimensions</label>
			<div class="col-md-10">
				<input type="text" name="size" class="form-control" value="<?php echo $row['size'] ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="picture" class="col-md-2">Photo</label>
			<div class="col-md-10">
				<img src="<?php echo $upload_dir.$row['picture'] ?>" width="200">
				<input type="file" name="myfile">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2"></label>
			<div class="col-md-10">
				<button type="submit" class="btn btn-success" name="btnUpdate">
					<span class="glyphicon glyphicon-save"></span>Update
				</button>
			</div>
		</div>
	</form>
</div>

</body>
</html>