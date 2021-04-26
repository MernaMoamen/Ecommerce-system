<?php
include '../shared/nav.php';
include '../shared/config.php';
include '../shared/function.php';
$select= "SELECT orders.ordID, products.ID, products.name, products.price, products.image from `products`,`orders` where products.ID = orders.prodID";
$s=mysqli_query($conn,$select);

if(isset($_GET['delete'])){

    $id = $_GET['delete'];
    $delete = "DELETE FROM `orders` WHERE ordID =$id";
   $d= mysqli_query($conn , $delete);
}




?>

<h1 class="text-center text-info display-2">Orders</h1>
<div class="container col-6">
    <table class="table table-dark table-hover">
     
        <tr>
            <th>Order ID</th>
            <th>Product ID</th>
            <th>Product name</th>
            <th>Price</th>
            <th>Image</th>
            
        </tr>
        <?php foreach($s as $data){
?>

        <tr>
            <td><?php echo $data['ordID'] ?></td>
            <td><?php echo $data['ID'] ?></td>
            <td> <?php echo $data['name'] ?> </td>
            <td><?php echo $data['price'] ?></td>
            <td><img width="40" src="/projects/Ecommerce system/products/upload/<?php echo $data['image'] ?>" alt="..."></td>
            
            <td> <a  onclick=" return confirm('Are You Sure?')"
           class="btn btn-danger" href="./listOrder.php?delete=<?php echo $data['ordID'];?>">Delete</a> 
        </tr>
    <?php } ?>
    </table>
</div>
<?php

include '../shared/script.php';

?>