<?php

include '../../connection.php'; 
session_start();
if(!isset($_SESSION['username'])){
    header("location: ../index.php");
}

$id = $_GET['removeid'];
$sql="DELETE FROM `cart` WHERE id=$id";
$result=mysqli_query($con,$sql);
if($result){
    //echo "deleted successfully";
    header("location: ./cart.php");
    exit;
}


?>

