<?php

include '../../connection.php'; 
session_start();
if(!isset($_SESSION['username'])){
    header("location: ../index.php");
}

$username= $_SESSION['username'];
$sql= "SELECT * FROM `users` WHERE username= '$username'";
$result= mysqli_query($con,$sql);
$nums= mysqli_num_rows($result);
$row= mysqli_fetch_assoc($result);
$position=$row['role'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="52x52" href="../../assets/images/meta-logo-black.png">
    <link rel="stylesheet" href="../../styles/global.css">
    <link rel="stylesheet" href="../..//styles/chefhome.css">
    <title>Winkies - Chef</title>
</head>
<body>
    <div class="container">
        <p><?php  echo $username; ?></p>
        <div class="top">
            <img src="../../assets/images/logo-light.svg" alt="logo">
            <img src="../../assets/avatars/3.svg" alt="">
        </div>
        
    </div>
    
</body>
</html>