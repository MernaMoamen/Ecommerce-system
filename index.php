<?php
include './shared/nav.php';
include './shared/function.php';
include './shared/config.php';
if(isset($_SESSION['admin'])||(isset($_SESSION['employee']))||(isset($_SESSION['customer']))):
$select= " SELECT * FROM `products` ";
$s=mysqli_query($conn, $select);




?>


<h1 class="text-center text-info display-2">Mobile Store</h1>
<div class="container m-5" >
<?php foreach($s as $data){
?>
<div class="mt-5">
<div class="card mb-3" style="max-width: 740px; background-color:rgb(55, 55, 58);">
  <div class="row no-gutters">
    <div class="col-md-4 ">
      <img width="300px"  src="/projects/Ecommerce system/products/upload/<?php echo $data['image'] ?>" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body m-5">
        <h5 class="card-title text-white"><?php echo $data['name'] ?></h5>
        <p class="card-text text-white"><?php echo $data['price'] ?> EGP</p>
        <a class="btn btn-info" name="cart" href="/projects/Ecommerce system/orders/cart.php?cart=<?php echo $data['ID'] ?>">add to cart</a>
      </div>
    </div>
  </div>
</div>

<?php } ?>
</div>

<?php else : echo"<div class='alert alert-danger'>
                Please Login
               </div>";
    endif;?>
<?php

include './shared/script.php';


?>
