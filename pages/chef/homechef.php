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
    <link rel="stylesheet" href="../..//styles/chefho.css">
    <title>Winkies - Chef</title>
</head>
<body>
    <div class="container">
        <div class="top">
            <img src="../../assets/images/logo-light.svg" alt="logo">
            <img src="../../assets/avatars/9.svg" alt="">
        </div>
        <div class="welcome">
            <p class="name">Hello, Chef <?php echo $username; ?>.</p>
            <p class="motivation">Let’s get to business, shall we?</p>
        </div>
        <p class="page">Overview</p>
        <div class="boxes">
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
            </div>
        </div>
        <div class="new-Orders">
            <div class="heading">
                <p class="section-title">New orders list</p>
                <p class="section-info">Total number of orders received and awaiting processing.</p>
            </div>
            <table>
                <tr>
                    <td><img src="../../assets/avatars/3.svg" alt="customer-avatar"></td>
                    <td><p class="order-number">order #1</p></td>
                    <td><p class="order-arrival">2:34pm</p></td>
                    <td><button>view</button></td>
                </tr>
            </table>
            <a href="#">Show all</a>
        </div>
        <div class="most-Ordered">
            <div class="heading">
                <p class="section-title">most ordered list</p>
                <p class="section-info">Keep track of which meals the customers are going in for!</p>
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
            <a href="#">Show all</a>
        </div>
        <div class="menubar">
            <div class="menu-icons">
                <div class="icon" class="active-page">
                    <a href="#"><img src="../../assets/icons/home.svg" alt="home"></a>
                    <img src="../../assets/icons/active.svg" alt="current page">
                </div>
                <div class="icon">
                    <a href="#"><img src="../../assets/icons/new.svg" alt="orders"></a>
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
                    <a href="#"><img src="../../assets/icons/settings.svg" alt="settings"></a>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>