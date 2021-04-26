<?php

function testMessage($condition , $mess){

if($condition){
echo"<div class='alert alert-primary' >
$mess
</div>";
} else{
echo "<div class='alert alert-danger' >
$mess
</div>";
}
}


function auth(){
    if($_SESSION['admin']){
    }else{
        header("location: /Ecommerce system/admin/login.php");
    }
}
function empauth(){
    if($_SESSION['employee']){
    }else{
        header("location: /Ecommerce system/admin/login.php");
    }
}

?>