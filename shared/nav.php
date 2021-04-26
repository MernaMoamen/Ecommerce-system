<?php
session_start();
if(isset($_GET['logout'])){
  session_unset();
  session_destroy();
  header("location:/projects/Ecommerce system/admin/login.php");
}

?>

<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    </head>
    <body>
 
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/projects/Ecommerce system/index.php">Mobile Store</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php if(isset($_SESSION['admin'])):?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Employees
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/projects/Ecommerce system/employees/addEmployee.php">Add Employees</a>
          <a class="dropdown-item" href="/projects/Ecommerce system/employees/listEmployee.php">List Employees</a>
         
</div>
      </li>
       <?php endif;
       if(isset($_SESSION['admin'])||(isset($_SESSION['employee']))):?>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Products
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/projects/Ecommerce system/products/addProduct.php">Add Products</a>
          <a class="dropdown-item" href="/projects/Ecommerce system/products/listProduct.php">List Products</a>
          <li class="nav-item active">
        <a class="nav-link" href="/projects/Ecommerce system/customers/listCustomer.php">Customers List </a>
      </li>      
          <li class="nav-item active">
        <a class="nav-link" href="/projects/Ecommerce system/orders/listOrder.php">Orders list <span class="sr-only">(current)</span></a>
      </li>
       
</div>
      </li>
<?php endif;
 if(isset($_SESSION['customer'])):?>
<li class="nav-item active">
        <a class="nav-link" href="/projects/Ecommerce system/orders/cart.php"><img width="25" src="https://s.w.org/images/core/emoji/13.0.1/svg/1f6d2.svg"> Cart</a> </li>
<?php endif; ?>
<div>
  <li>
  <?php if(isset($_SESSION['admin'])||(isset($_SESSION['employee']))||(isset($_SESSION['customer']))):?>
       <ul class=" mr-auto">
    <form class="form-inline my-2 my-lg-0">
     <form action=""> 
     <button name="logout" class="btn btn-outline-danger my-2 my-sm-0 ">Logout</button>
     </form>
     <?php else : ?>
        <a  href="/projects/Ecommerce system/admin/login.php"  class="btn btn-outline-info my-2 my-sm-0">Login</a>
        <?php endif ; ?>

    </form>
        </ul>
 </li>
  
    </div>
      </li>
</nav>
