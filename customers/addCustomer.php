<?php
include '../shared/nav.php';
include '../shared/config.php';


if(isset($_POST['signup'])){
$name=$_POST['name'];
$pass=$_POST['password'];

$insert=" INSERT INTO `customers` values (null ,'$name', 'email','$pass') ";
 
$i=mysqli_query($conn,$insert);
}

//Edit part
$name ="";
$update=true;
if(isset($_GET['edit'])){
    $update=false;
    $id=$_GET['edit'];
    $select= " SELECT * From `customers` where ID =$id";
$s = mysqli_query($conn , $select);
$row = mysqli_fetch_assoc($s);
$name= $row['name'];
$email= $row['email'];
$pass= $row['password'];
}


if(isset($_POST['update'])){
    $name = $_POST['name'];
    $pass= $_POST['password'];
    
    $update ="UPDATE `customers`SET name ='$name' and email='$email' and password='$pass' WHERE ID=$id";
    
    $i = mysqli_query($conn ,$update);
    }
?>
<div class="container col-6 mt-5">
<h2 class="text-center text-info display-2">signup</h2>

<form method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">User Name</label>
    <input type="text" value="<?php echo $name ?> " class="form-control" name="name" placeholder="User Name">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="number" value="<?php echo $pass ?>" class="form-control" name="password" placeholder="Password">
  </div>
  <?php if($update):?>
    <button type="submit" name="signup" class="btn btn-primary btn-block">Signup</button>
  <?php else : ?>
    <button type="submit" name="update" class="btn btn-primary btn-block">Update Data</button>
  
  <?php endif ?>
</form>
</div>
<?php

include '../shared/script.php';


?>
