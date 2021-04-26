<?php
include '../shared/nav.php';
include '../shared/config.php';
include '../shared/function.php';

$name="";
$price="";
$details="";
$select= "SELECT products.ID, products.name,products.details, products.price, products.image from `products`,`orders` where products.ID = orders.prodID";
$s=mysqli_query($conn,$select);

if(isset($_GET['cart'])){
  $id=$_GET['cart'];
  $insert="INSERT inTO `orders` values (null,$id) ";
 $i=mysqli_query($conn,$insert);
}

if(isset($_GET['delete'])){

    $id = $_GET['delete'];
    $delete = "DELETE FROM `orders` WHERE prodID =$id";
   $d= mysqli_query($conn , $delete);
}

?>


<div class="mt-5">
<?php foreach($s as $data){
?>
<div class="card mb-3" style="max-width: 740px; background-color:rgb(55, 55, 58);">
  <div class="row no-gutters">
    <div class="col-md-4 ">
      <img width="300px" src="/projects/Ecommerce system/products/upload/<?php echo $data['image'] ?>" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body m-5">
        <h5 class="card-title text-white"><?php echo $data['name'] ?></h5>
        <p class="card-text text-white"><?php echo $data['details'] ?></p>
        <p class="card-text text-white"><?php echo $data['price'] ?> EGP</p>
        
        <a class="btn btn-danger" name="cart" href="/projects/Ecommerce system/orders/cart.php?delete=<?php echo $data['ID'] ?>">Remove</a>
      </div>
    </div>
  </div>
</div>

<?php } ?>
</div>


<?php

include '../shared/script.php';

?>
