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

$sqlmeals = "SELECT * FROM `meals`";
$resultmeals = mysqli_query($con,$sqlmeals);
$numsmeals = mysqli_num_rows($resultmeals);
$rowmeals = mysqli_fetch_assoc($resultmeals);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winkies-Admin</title>
    <link rel="stylesheet" href="../../styles/global.css">
    <link rel="stylesheet" href="../../styles/adminhomepage.css">
</head>
<body>
<div class="container">
        <div class="top">
            <img src="../../assets/images/logo-light.svg" alt="logo">
            <img src="../../assets/avatars/9.svg" alt="">
        </div>
        <div class="welcome">
            <p class="name">Hello, Admin <?php echo $username; ?>.</p>
            <p class="motivation">Check and know what ever is happening.</p>
        </div>
        <p class="page">Overview</p>
        <div class="boxes">
            <div class="box">
                <div class="up">
                    <p class="number"><?php echo $numsmeals; ?></p>
                    <img src="../../assets/icons/current.svg" alt="current">
                </div>
                <div class="middle">
                    <p class="box-name">Current meals</p>
                </div>
                <div class="down">
                    <p class="summary">Total number of food meals we have in our menu currently.</p>
                </div>
            </div>
            <div class="box">
                <div class="up">
                    <p class="number">0</p>
                    <img src="../../assets/icons/newOrdersBlack.svg" alt="current">
                </div>
                <div class="middle">
                    <p class="box-name">New Orders</p>
                </div>
                <div class="down">
                    <p class="summary">Total number of food meals we have in our menu currently.</p>
                </div>
            </div>
            <!-- <div class="box">
                <div class="up">
                    <p class="number">120</p>
                    <img src="../../assets/icons/current.svg" alt="current">
                </div>
                <div class="middle">
                    <p class="box-name">Current meals</p>
                </div>
                <div class="down">
                    <p class="summary">Total number of food meals we have in our menu currently.</p>
                </div>
            </div>
            <div class="box">
                <div class="up">
                    <p class="number">120</p>
                    <img src="../../assets/icons/current.svg" alt="current">
                </div>
                <div class="middle">
                    <p class="box-name">Current meals</p>
                </div>
                <div class="down">
                    <p class="summary">Total number of food meals we have in our menu currently.</p>
                </div>
            </div> -->
        </div>
        <div class="new-Orders">
            <div class="heading">
                <p class="section-title">New orders list</p>
                <p class="section-info">Total number of orders received and awaiting processing.</p>
            </div>
            <table>
                <thead>
                    <th>no.</th>
                    <th>image</th>
                    <th>name</th>
                    <th>price</th>
                    <th>orders</th>
                </thead>
                <tr>
                    <td><p class="meal-ranking">1</p></td>
                    <td><img src="../../assets/meals/1.svg" alt="meal-image"></td>
                    <td><p class="meal-name">Sweet Sweet benji</p></td>
                    <td><p class="meal-price">¢95.00</p></td>
                    <td><p class="meal-orders">33</p></td>
                </tr>
                <tr>
                    <td><p class="meal-ranking">1</p></td>
                    <td><img src="../../assets/meals/1.svg" alt="meal-image"></td>
                    <td><p class="meal-name">Sweet Sweet benji</p></td>
                    <td><p class="meal-price">¢95.00</p></td>
                    <td><p class="meal-orders">33</p></td>
                </tr>
            </table>
        </div>
        <div class="menubar">
            <div class="menu-icons">
                <div class="icon" class="active-page">
                    <a href="./homechef.php"><img src="../../assets/icons/home.svg" alt="home"></a>
                    <img src="../../assets/icons/active.svg" alt="current page">
                </div>
                <div class="icon">
                    <a href="./orderschef.php"><img src="../../assets/icons/new.svg" alt="orders"></a>
                </div>
                <div class="icon">
                    <a href="#"><img src="../../assets/icons/pending.svg" alt="pending orders"></a>
                </div>
                <div class="icon">
                    <a href="#"><img src="../../assets/icons/meals.svg" alt="meals"></a>
                </div>
                <div class="icon">
                    <a href="#"><img src="../../assets/icons/checkmark-done.svg" alt="completed"></a>
                </div>
                <div class="icon">
                    <a href="./customization.php"><img src="../../assets/icons/settings.svg" alt="settings"></a>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>