<?php

include '../../connection.php'; 
session_start();
if(!isset($_SESSION['username'])){
    header("location: ../index.php");
}

$customer_id = $_GET['removeid'];

$sql="DELETE FROM `cart` WHERE customer_id=$customer_id";
$result=mysqli_query($con,$sql);
if($result){
    //echo "deleted successfully";
    header("location: ./orderplaced.php");
    exit;
}

?>
