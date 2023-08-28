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
$email=$row['email'];
$date_joined=$row['date_joined'];

$sqlmeals = "SELECT * FROM `meals`";
$resultmeals = mysqli_query($con,$sqlmeals);
$numsmeals = mysqli_num_rows($resultmeals);
$rowmeals = mysqli_fetch_assoc($resultmeals);

$sqlmeals_on_menu = "SELECT * FROM `meals` WHERE on_menu = 'true'";
$resultmeals_on_menu = mysqli_query($con,$sqlmeals_on_menu);
$numsmeals_on_menu = mysqli_num_rows($resultmeals_on_menu);
$rowmeals_on_menu = mysqli_fetch_assoc($resultmeals_on_menu);

$id = $_GET['viewid'];

$sqlview= "SELECT * from `meals` WHERE id=$id";
$resultview=mysqli_query($con,$sqlview);
$rowview=mysqli_fetch_assoc($resultview);

$name=$rowview['name'];
$price=$rowview['price'];
$image=$rowview['image'];
$description=$rowview['description'];
$ingredient1=$rowview['ingredient1'];
$ingredient2=$rowview['ingredient2'];
$ingredient3=$rowview['ingredient3'];
$ingredient4=$rowview['ingredient4'];



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="52x52" href="../../assets/images/meta-logo-black.png">
    <link rel="stylesheet" href="../../styles/global.css">
    <link rel="stylesheet" href="../..//styles/individualmeal.css">
    <title>Winkies - Customer</title>
</head>
<body>
    <div class="container">
        <div class="top">
            <img src="../../assets/icons/whiteBack.svg" alt="back">
            <img src="../../assets/icons/cart.svg" alt="back">
        </div>
        <div class="image-like-quantity">
            <img src="<?php echo $image;?>" alt="">
            <div class="likes"></div>
        </div>
    </div>

    <script src="../../interactivity/meal.js"></script>
</body>
</html>