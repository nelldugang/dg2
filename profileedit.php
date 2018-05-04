<?php session_start();
require "dbconnect.php";


	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql = "select * from customers where id=".$id;
		$result = mysqli_query($dbcon, $sql);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
		}else{
			$errorMsg = 'Could not select a record';
		}
	}

	if(isset($_POST['btnUpdate'])){
		$username = $_POST['userName'];
		$password = $_POST['password'];
		$fullname = $_POST['fullName'];
		$fullname = $_POST['fullName'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];

		if(empty($username)){
			$errorMsg = 'Please input name';
		}elseif(empty($fullname)){
			$errorMsg = 'Please input fullName';
		}

		if(!isset($errorMsg)){
			$sql = "update customers
									set userName = '".$username."',
										fullName = '".$fullname."',
										password = '".$password."',
										email = '".$email."',
										address = '".$address."',
										phone = '".$phone."'
					where id=".$id;
			$result = mysqli_query($dbcon, $sql);
			if($result){
				$successMsg = 'New record updated successfully';
				header('location:profile.php');
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
	<style type="text/css">
      @import url('https://fonts.googleapis.com/css?family=Montserrat|Fredoka+One');
   
    body {
        
      /*font-family: 'Fredoka One', cursive;*/
      font-family: 'Montserrat', sans-serif;

    }
    </style>

</head>
<body>

<?php
require "partials/navbar.php";
?>

<div class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<h3 class="navbar-brand">Update Profile	</h3>
		</div>
	</div>
</div>
<div class="container">
	
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

	<form action="" method="post" class="form-horizontal">
		<div class="form-group">
			<label for="userName" class="col-md-2">User ID</label>
			<div class="col-md-10">
				<input type="text" name="userName" class="form-control" value="<?php echo $row['userName']; ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="userName" class="col-md-2">Change Password</label>
			<div class="col-md-10">
				<input type="password" name="password" class="form-control" value="<?php echo $row['password']; ?>">
			</div>
		</div>

		<div class="form-group">
			<label for="position" class="col-md-2">Full Name</label>
			<div class="col-md-10">
				<input type="text" name="fullName" class="form-control" value="<?php echo $row['fullName'] ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="position" class="col-md-2">Email</label>
			<div class="col-md-10">
				<input type="text" name="email" class="form-control" value="<?php echo $row['email'] ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="position" class="col-md-2">Address</label>
			<div class="col-md-10">
				<input type="text" name="address" class="form-control" value="<?php echo $row['address'] ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="userName" class="col-md-2">Phone</label>
			<div class="col-md-10">
				<input type="text" name="phone" class="form-control" value="<?php echo $row['phone']; ?>">
			</div>
		</div>
<!-- 		<div class="form-group">
			<label for="picture" class="col-md-2">Photo</label>
			<div class="col-md-10">
				<img src="<?php echo $upload_dir.$row['picture'] ?>" width="200">
				<input type="file" name="myfile">
			</div>
		</div> -->
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