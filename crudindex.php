<?php session_start();

if (isset($_SESSION['userName']) == null){
	header('location: register.php');
} else if ($_SESSION['userName'] != 'admin'){
	header('location: indexhope.php');
}



	require_once('dbconnect.php');
	$upload_dir = 'uploads/';
	if(isset($_GET['delete'])){
		$id = $_GET['delete'];

		//select old photo name from database
		$sql = "select picture from products where id = ".$id;
		$result = mysqli_query($dbcon, $sql);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
			$photo = $row['picture'];
			unlink($upload_dir.$photo);
			//delete record from database
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
	<title>Uploadimage</title>
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap-theme.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<style type="text/css">
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
	<div class="page-header">
		<h3>Product list</h3>
			<div>
			<a class="btn btn-success" href="crudadd.php">
			Add New
			</a>
			</div>
		
	</div>
	<table class="table table-bordered table-responsive">
			<thead>
				<tr>
					<th>ID</th>
					<th>Product Name</th>
					<th>Product Type</th>
					<th>Price</th>
					<th>Product Description</th>
					<th>Dimensions</th>
					<th>Image</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$sql = "select * from products";
				$result = mysqli_query($dbcon, $sql);
				if(mysqli_num_rows($result)){
					while($row = mysqli_fetch_assoc($result)){
			?>
				<tr>
					<td><?php echo $row['id'] ?></td>
					<td><?php echo $row['productName'] ?></td>
					<td><?php echo $row['productType'] ?></td>
					<td><?php echo $row['price'] ?></td>
					<td><?php echo $row['productDesc'] ?></td>
					<td><?php echo $row['size'] ?></td>
					<td><img src="<?php echo $upload_dir.$row['picture'] ?>" height="100"></td>
					<td>
						<a class="btn btn-primary" href="crudedit.php?id=<?php echo $row['id'] ?>">
							<i class="glyphicon glyphicon-pencil"></i>
						</a>
						<a class="btn btn-danger" href="crudindex.php?delete=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
							<i class="glyphicon glyphicon-trash"></i>
							
						</a>
					</td>
				</tr>
			<?php
					}
				}
			?>
			</tbody>
	</table>
	<a class="btn btn-primary" href="admindashboard.php">Go back</a>
	<a class="btn btn-danger" onclick="topFunction()" id='myBtn' href="" style="float:right">Back to top</a>
</div>


<script type="text/javascript">
	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}


function topFunction() {
    document.body.scrollTop = 0;
   


</script>


</body>
</html>