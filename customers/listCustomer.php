<?php
include '../shared/nav.php';
include '../shared/config.php';
include '../shared/function.php';

$select= " SELECT * FROM `customers` ";
$s=mysqli_query($conn,$select); 

if(isset($_GET['delete'])){

    $id = $_GET['delete'];
    $delete = "DELETE FROM `customers` WHERE customerID =$id";
   $d= mysqli_query($conn , $delete);
   

}

?>


<h1 class="text-center text-info display-2">Customers List</h1>
<div class="container col-6 mt-5">
    <table class="table table-dark table-hover">
     
    

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        <?php foreach($s as $data){
?>
        <tr>
            <td><?php echo $data['customerID'] ?></td>
            <td> <?php echo $data['name'] ?> </td>
            <td> <?php echo $data['email'] ?> </td>
            <td> <?php echo $data['password'] ?> </td>
           <td> <a  onclick=" return confirm('Are You Sure?')"
           class="btn btn-danger" href="./listCustomer.php?delete=<?php echo $data['customerID'];?>">Delete</a> 
            </td>
        </tr>
    <?php } ?>
    </table>
</div>


<?php

include '../shared/script.php';


?>
