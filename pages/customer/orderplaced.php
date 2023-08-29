<?php

include '../../connection.php'; 
session_start();
if(!isset($_SESSION['username'])){
    header("location: ../index.php");
}

$currentDate = date('Y-m-d'); 

$username= $_SESSION['username'];
$sql= "SELECT * FROM `users` WHERE username= '$username'";
$result= mysqli_query($con,$sql);
$nums= mysqli_num_rows($result);
$row= mysqli_fetch_assoc($result);
$email=$row['email'];
$date_joined=$row['date_joined'];
$customer_id=$row['id'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="52x52" href="../../assets/images/meta-logo-black.png">
    <link rel="stylesheet" href="../../styles/global.css">
    <link rel="stylesheet" href="../../styles/signed.css">
    <title>Winkies - Customer</title>
</head>
<body>
    <div class="container">
        <div class="top">
            <img src="../../assets/images/logo-light.png" alt="logo">
        </div>
        <div class="message">
            <img src="../../assets/icons/checkmark.svg" alt="check">
            <p class="signed">Order Placed!</p>
        </div>
        <div class="button-div">
            <a href="./menucustomer.php" class="button">
                <button>Continue</button>
            </a>
        </div>
        
    </div>
</html>