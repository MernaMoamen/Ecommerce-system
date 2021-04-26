<?php
include '../shared/nav.php';
include '../shared/config.php';
include '../shared/function.php';
echo $_SESSION['custID'];


?>
<h1><?php echo $data['customerID'] ?></h1>
<a class="btn btn-info" href="./addCustomer.php?edit=<?php echo $data['ID']; ?>">Update</a>
<?php
include '../shared/script.php';
?>