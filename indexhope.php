<?php
session_start();

 $dbcon = mysqli_connect("localhost","root", "", "bwala"); 
mysqli_set_charset($dbcon, 'utf8');
if (mysqli_connect_errno()){
    echo "Connection Fail" . mysqli_connect_error();
}

function display_title(){
    echo "Shop";
}

function display_content() {
    if (isset($_SESSION['userName'])) {
        $username = $_SESSION['userName'];
    } else {
        $username = 'Guest';
    }
}

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
                header('location:crudindex.php');
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <title>PHP Shopping Cart Tutorial</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <link rel="stylesheet" href="bootstrap/style/indexhope.css">
        <!-- font-family: 'Catamaran', sans-serif; -->
        <style type="text/css">
            .carousel .item img{
    margin: 0 auto; /* Align slide image horizontally center */
}
        </style>

</head>
<body>
<?php
require ('partials/navbar.php');
?>
<div class="container-fluid" style="margin-top:-20px;">
    <div class="row" style="text-align: center">
        <img src="assets/img/banner5.jpg" style="width:100%;position: relative">
        
        	<h1 class="titleimg" style="font-weight: 900;font-size: 3vw">SHOP TILL</H1> 
        <h1 class="titleimg2" style="font-weight: 900;font-size: 3vw">YOU DROP</H1>

        <a style="font-weight: 900" type="button" class="button drop" <?php echo "<a href='sort.php?sort=all#stophere'>" ?>SHOP NOW</a>
        

        
    </div>
</div> 



<div id="stophere">
</div>  


        <div class="container" style="padding-bottom: 0;">
        <div class="row desc" style="text-align: center;background-color: #fff;">
        <div class="col-sm-2 underline" style="padding:5px; font-size: 13px;">
        <?php echo "<a href='sort.php?sort=all#stophere'>" ?>VIEW ALL</a>
        </div>

        <div class="col-sm-2 underline" style="padding:5px; font-size: 13px;">
        <?php echo "<a onclick='underLine(this)' href='sort.php?sort=snowboard#stophere'>" ?>SNOWBOARD</a>
        </div>

        <div class="col-sm-2 underline" style="padding:5px; font-size: 13px;">
        <?php echo "<a href='sort.php?sort=jacket#stophere'>" ?>JACKET</a>
        </div> 
        <div class="col-sm-2 underline" style="padding:5px; font-size: 13px;">
        <?php echo "<a href='sort.php?sort=gogglemask#stophere'>" ?>GOGGLE/MASK</a>
        </div> 
        <div class="col-sm-2 underline" style="padding:5px; font-size: 13px;">
        <?php echo "<a href='sort.php?sort=boots#stophere'>" ?>BOOTS</a>
        </div> 
        <div class="col-sm-2 underline" style="padding:5px; font-size: 13px;">
        <?php echo "<a href='sort.php?sort=binding#stophere'>" ?>BINDINGS</a>
        </div> 
        </div>
    </div>




<div class="container">
<?php 
if ((isset($_SESSION['sort'])) && ($_SESSION['sort'] != 0)) {
    $category = $_SESSION['sort'];

    $sql = "SELECT * from products WHERE productID = $category";
}
else {
    $sql = "SELECT * from products";
}
$result = mysqli_query($dbcon, $sql);
?>
<?php
while ($row = mysqli_fetch_assoc($result)) {
        $productType = $row['productType'];
        $id = $row['id'];
?>


 <div class="col-md-3 col-lg-3" style="font-family: 'Fredoka One', cursive;">
    <div class="thumbnail product" style="text-align: center">
        <div class="caption" style="text-align: center">
        <a <?php echo "href='viewitem.php?id=$id'>" ?>

          <img class="prodimage" style="height:224px; width:175px;" src="<?php echo $upload_dir.$row['picture']; ?>"></a>
          <!-- original height:224px; width:175; -->
          <a class="button1 btn btn-success" href="cartAction.php?action=addToCart&id=<?php echo $row['id']; ?>"><span class='icon'>
                        <i class='fas fa-shopping-cart font-color'></i>
                    </span>ADD TO CART</a>
          <a class="button2 btn btn-primary" data-toggle="modal" data-target="#<?php echo $row["id"]; ?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> QUICKVIEW</a>
        </div>

         
    </div>
        <div class="caption">
            <h3 style="text-align: center; padding-top: 0"><?php echo $row['productName'] ?></h3>
            <p style="text-align: center;">₱<?php echo $row['price'] ?></p>
          </div>
  </div>

<!-- Button trigger modal -->

<!-- Modal -->
<div id="<?php echo $row["id"]; ?>" class="modal fade" tabindex="" role="dialog" aria-labelledby="">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        
      </div>
      <div class="modal-body" style="padding-top: 0; padding-bottom: 30px">

        <div class="row">
                        <div class="col-sm-6 prodimage">
                            
                            <img class="" src="<?php echo $upload_dir.$row['picture'] ?>" height="400">
                        
                        </div>
                        <div class="col-sm-6">
                             <div class="tab-content" >
                                <div class="active"><br>
                                    <h2 style="margin-top: 0"><?php echo $row['productName'] ?></h2>
                                    <p class="desc" style="font-size: 13px"><?php echo $row['productDesc'] ?></p>
                                    <p style="font-size: 13px"><?php echo $row['size'] ?></p>

                                    <h3>₱<?php echo $row['price'] ?></h3>
                                    <a class="btn btn-success addcart" href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>"><span class='icon'>
                        <i class='fas fa-shopping-cart font-color'></i>
                    </span>ADD TO CART</a>
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
                   
<?php } ?>
</div>
</div>
</div>
<div class="container-fluid" style="background-color: #e5e5e5;margin: auto;font-family: 'Montserrat', sans-serif;">
        <br><br>
        <div class="" style="text-align: center">
        <h1>Picture This</h1>
        <p style="">Our stuff looks a lot better</p><p>on you than on the shelves.</p><p>Share Yours with us to be featured right here.</p>
        </div>
    
    <div class="row" >
        <div class="col-md-3" style="text-align: center">
            <img src="assets/img/gal1.png" width="350">
        </div>
        <div class="col-md-3" style="text-align: center">
            <img src="assets/img/gal2.jpg" width="350">
        </div>
        <div class="col-md-3" style="text-align: center">
            <img src="assets/img/gal3.jpg" width="350">
        </div>
        <div class="col-md-3" style="text-align: center">
            <img src="assets/img/gal5.jpg" width="350">
        </div>
    </div>
  
  <!--   <div class="row" >
        <div class="col-md-3" style="text-align: center">
            <img src="assets/img/gal5.jpg" width="350">
        </div>
        <div class="col-md-3" style="text-align: center">
            <img src="assets/img/gal6.jpg" width="350">
        </div>
        <div class="col-md-3" style="text-align: center">
            <img src="assets/img/gal7.jpg" width="350">
        </div>
        <div class="col-md-3" style="text-align: center">
            <img src="assets/img/gal8.jpg" width="350">
        </div>
    </div> -->
    <br><br><br>    
</div>


<br><br><br>
<div>

<div class="container-fluid"><a href="#" class="btn btn-danger" style="float:right"><!-- <span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span> -->Back to top</a></div>  
<?php require "partials/footer.php"; ?>
</div>
</script>
</body>
</html>