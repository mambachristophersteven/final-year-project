<?php

include '../../connection.php'; 
session_start();
if(!isset($_SESSION['username'])){
    header("location: ../index.php");
}

$currentDateTime = date('Y-m-d h:i:s'); 
$currentTime = date('h:i:s'); 


$customer_id = $_GET['removeid'];

//$sqlupdate = "UPDATE `cart` SET order_time = '$currentDateTime' WHERE customer_id=$customer_id";

$sql="UPDATE `cart` SET order_time = '$currentDateTime' WHERE customer_id=$customer_id";
$result=mysqli_query($con,$sql);
if($result){
    //echo "deleted successfully";
    header("location: ./orderplaced.php");
    exit;
}

?>
