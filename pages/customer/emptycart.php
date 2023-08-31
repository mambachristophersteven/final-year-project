<?php

include '../../connection.php'; 
session_start();
if(!isset($_SESSION['username'])){
    header("location: ../index.php");
}

$customer_id = $_GET['removeid'];

$currentDateTime = date('h:i:s'); 


$sql="UPDATE `cart` SET order_time = '$currentDateTime' WHERE customer_id=$customer_id AND order_time IS NULL";
$result=mysqli_query($con,$sql);
if($result){
    //echo "deleted successfully";
    $sqlremove="UPDATE `cart` SET status = 'ordered' WHERE customer_id=$customer_id";
    $resultremove=mysqli_query($con,$sqlremove);
    if($resultremove){
        //echo "deleted successfully";
        header("location: ./orderplaced.php");
        exit;
    }
    
}

?>


