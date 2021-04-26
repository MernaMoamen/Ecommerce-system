<?php
include '../shared/nav.php';
include '../shared/config.php';
include '../shared/function.php';

if (isset($_POST['login'])){
    $userName=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $role= $_POST['role'];
    if ($role=="admin"){
    $select= "SELECT * FROM `admin` WHERE name= '$userName' and password = '$password'";
    $s = mysqli_query($conn ,$select);
    $row = mysqli_num_rows($s);
    if($row > 0){
        $_SESSION['admin']=$userName;
        echo $_SESSION['admin'];
        header("location: ../employees/listEmployee.php");
    }else{
        echo"<div class='alert alert-danger'>
        not admin
        </div>";
    }
    } elseif ($role=="employee"){
        $select= "SELECT * FROM `employees` WHERE name= '$userName' and email='$email' and password = '$password'";
        $s = mysqli_query($conn ,$select);
        $row = mysqli_num_rows($s);
        if($row > 0){
            $_SESSION['employee']=$userName;
            echo $_SESSION['employee'];
            header("location: ../products/listProduct.php");
        }else{
            echo"<div class='alert alert-danger'>
            not employee
            </div>";
        }
        } 
        elseif ($role=="customer"){
            $select= "SELECT * FROM `customers` WHERE name= '$userName' and email='$email'  and password = '$password'";
            $s = mysqli_query($conn ,$select);
            $row = mysqli_num_rows($s);
            if($row > 0){
                $_SESSION['customer']=$userName;
                echo $_SESSION['customer'];
        
                header("location: ../index.php");
            }else{
                echo"<div class='alert alert-danger'>
                please signup or change role
                </div>";
            }
            } 
}

?>

<h1 class="text-center text-info display-2">Login</h1>
<div class="container col-5 mt-5">

<form method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">User Name</label>
    <input type="text"  name="name" class="form-control" placeholder="User Name" >
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="text"  name="email" class="form-control" placeholder="Email" >
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" placeholder="Password" >
  </div>

<div class="form-group mt-3"><label for="exampleInputPassword1">Role </label>
<select name="role" id="">
    <option value="employee"> Employee </option>
    <option value="admin"> Admin </option>
    <option value="customer"> Customer </option>
</select>
</div>
<button type="submit" name="login" class="btn btn-primary btn-block">Submit</button>
 <a href="../customers/addCustomer.php" class="btn btn-info btn-block">Signup</a>
</form>
</div>
<?php
include '../shared/script.php';
?>