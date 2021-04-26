<?php
include '../shared/nav.php';
include '../shared/config.php';


if(isset($_POST['add'])){
    $name=$_POST['name'];
    $details=$_POST['details'];
    $price=$_POST['price'];


    $image_name= $_FILES['image']['name'];
    $image_type= $_FILES['image']['type'];
    $image_tmp= $_FILES['image']['tmp_name'];
    $location = "upload/";
    if(move_uploaded_file( $image_tmp, $location . $image_name)){
      echo"image uploaded";
    }else{
      echo"upload failed";
    }
    
    $insert=" INSERT INTO `products` values (null ,'$name','$details',$price , '$image_name') ";
     
    $i=mysqli_query($conn,$insert);
    header("location:./listProduct.php");
    }

    //Edit part
$name ="";
$price="";
$details="";
$image_name="";
$update=true;
if(isset($_GET['edit'])){
    $update=false;
    $id=$_GET['edit'];
    $select= " SELECT * From `products` where ID =$id";
$s = mysqli_query($conn , $select);
$row = mysqli_fetch_assoc($s);
$name= $row['name'];
$details=$row['details'];
$price= $row['price'];
$image_name= $row['image'];
}


if(isset($_POST['add'])){
    $name = $_POST['name'];
    $details =$_POST['details'];
    $price = $_POST['price'];
    $image_name= $_FILES['image']['name'];
    $image_type= $_FILES['image']['type'];
    $image_tmp= $_FILES['image']['tmp_name'];
    $location = "upload/";
    move_uploaded_file( $image_tmp, $location . $image_name);
    
    $update ="UPDATE `products`SET name ='$name', details='$details',price =$price ,image='$image_name' WHERE ID=$id";
    
    $i = mysqli_query($conn ,$update);
    header("location:./listProduct.php");
    }

    ?>
    
   <div class="container col-6 mt-5">
    <h1 class="text-center text-info display-2">Add Product </h1>
    
    <form method="POST" enctype="multipart/form-data">

      <div class="form-group">
        <label for="exampleInputEmail1">Product Name</label>
        <input type="text" value="<?php echo $name ?>" class="form-control" name="name" placeholder="Product Name">
        
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Product Details</label>
        <input type="text" value="<?php echo $details ?>" class="form-control" name="details" placeholder="Product Details">
        
      </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Product Price</label>
        <input type="number" value="<?php echo $price ?>" class="form-control" name="price" placeholder="Product Price">
        
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Product Image</label>
        <input type="file" class="form-control" name="image">
        
      </div>
        
      <?php if($update):?>
    <button type="submit" name="add" class="btn btn-primary btn-block">Add Product</button>
  <?php else : ?>
  
  <button type="submit" name="update" class="btn btn-primary btn-block">Update Data</button>
  <?php endif ?>
      
    </form>
    </div>

<?php

include '../shared/script.php';


?>
