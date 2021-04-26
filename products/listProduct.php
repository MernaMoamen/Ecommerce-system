<?php
include '../shared/nav.php';
include '../shared/config.php';

$select= " SELECT * FROM `products` ";
$s=mysqli_query($conn,$select); 

if(isset($_GET['delete'])){

    $id = $_GET['delete'];
    $delete = "DELETE FROM `products` WHERE ID =$id";
   $d= mysqli_query($conn , $delete);
}

?>


<h1 class="text-center text-info display-2">Products List</h1>
<div class="container col-6">
    <table class="table table-dark table-hover">
     
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Details</th>
            <th>Price</th>
            <th>Image</th>
            <th>Action </th>
        </tr>
        <?php foreach($s as $data){
?>

        <tr>
            <td><?php echo $data['ID'] ?></td>
            <td> <?php echo $data['name'] ?> </td>
            <td><?php echo $data['details'] ?></td>
            <td><?php echo $data['price'] ?></td>
            <td><img width="40" src="upload/<?php echo $data['image'] ?>" alt="..."></td>
            <td> <a  onclick=" return confirm('Are You Sure?')"
           class="btn btn-danger" href="./listProduct.php?delete=<?php echo $data['ID'];?>">Delete</a> </td>
          <td> <a class="btn btn-info" href="./addProduct.php?edit=<?php echo $data['ID']; ?>">Update</a> </td>
        </tr>
    <?php } ?>
    </table>
</div>
<?php

include '../shared/script.php';


?>
