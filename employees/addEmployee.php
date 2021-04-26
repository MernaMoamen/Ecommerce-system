<?php
include '../shared/nav.php';
include '../shared/config.php';


if(isset($_POST['send'])){
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];

$insert=" INSERT INTO `employees` values (null ,'$name','$email','$password') ";
 
$i=mysqli_query($conn,$insert);
header("location: listEmployee.php");
}


//Edit part
$name ="";
$email="";
$password="";
$update=true;
if(isset($_GET['edit'])){
    $update=false;
    $id=$_GET['edit'];
    $select= " SELECT * From `employees` where ID =$id";
$s = mysqli_query($conn , $select);
$row = mysqli_fetch_assoc($s);
$name= $row['name'];
$email=$row['email'];
$password=$row['password'];
}


if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email=$_POST['email'];
   $password=$_POST['password'];
    $update ="UPDATE `employees`SET name ='$name' and email='$email' and password='$password'  WHERE ID=$id";
    
    $i = mysqli_query($conn ,$update);
    header("location: listEmployee.php");
    }
?>

<div class="container col-6 mt-5">
<h2 class="text-center text-info display-2">Add Employee</h2>

<form method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Employee Name</label>
    <input type="text" value="<?php echo $name ?>" class="form-control" name="name" placeholder="Employee Name">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Employee Email</label>
    <input type="text" value="<?php echo $email ?>" class="form-control" name="email" placeholder="Employee Email">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Employee Password</label>
    <input type="text" value="<?php echo $password ?>" class="form-control" name="password" placeholder="Employee Password">
    
  </div>
  
  <?php if($update):?>
    <button type="submit" name="send" class="btn btn-primary btn-block">Send Data</button>
  <?php else : ?>
  
  <button type="submit" name="update" class="btn btn-primary btn-block">Update Data</button>
  <?php endif ?>
</form>
</div>
<?php

include '../shared/script.php';


?>
 