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
$customer_id=$row['id'];


$sqlmeals = "SELECT * FROM `meals`";
$resultmeals = mysqli_query($con,$sqlmeals);
$numsmeals = mysqli_num_rows($resultmeals);
$rowmeals = mysqli_fetch_assoc($resultmeals);

$sqlmeals_on_menu = "SELECT * FROM `meals` WHERE on_menu = 'true'";
$resultmeals_on_menu = mysqli_query($con,$sqlmeals_on_menu);
$numsmeals_on_menu = mysqli_num_rows($resultmeals_on_menu);
$rowmeals_on_menu = mysqli_fetch_assoc($resultmeals_on_menu);

$sqlcart ="SELECT * FROM `cart` WHERE customer_id = '$customer_id' AND status = 'cart'";
$resultcart = mysqli_query($con,$sqlcart);
$nummcart = mysqli_num_rows($resultcart);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="52x52" href="../../assets/images/meta-logo-black.png">
    <link rel="stylesheet" href="../../styles/global.css">
    <link rel="stylesheet" href="../..//styles/customer.css">
    <title>Winkies - Customer</title>
</head>
<body>
    <div class="container">
    <div class="top">
            <img src="../../assets/images/logo-light.svg" alt="logo">
            <img src="../../assets/avatars/9.svg" alt="" id="user-profile">
        </div>
        <div class="welcome">
            <p class="name">Hello, <?php echo $username; ?>.</p>
            <p class="motivation">Get down to ordering something, anything.</p>
        </div>
        <div class="search">
            <form action="#">
                <div class="input">
                    <input type="text" name="search" id="search" placeholder="search all meals">
                    <img src="../../assets/icons/search.svg" alt="">
                </div>
                <input type="submit" value="search" name="search" id="searchButton">
            </form>
        </div>
        <div class="user-profile" id="user-profile-box">
            <img src="../../assets/icons/close.svg" alt="" id="close">
            <div class="user-avatar">
                <p class="user">User Profile</p>
                <img src="../../assets/avatars/9.svg" alt="user avatar">
            </div>
            <div class="user-info">
                <div class="info">
                    <p class="info-title">username</p>
                    <p class="info-value"><?php echo $username;?></p>
                </div>
                <div class="info">
                    <p class="info-title">email</p>
                    <p class="info-value"><?php echo $email;?></p>
                </div>
                <div class="info">
                    <p class="info-title">date joined</p>
                    <p class="info-value"><?php echo $date_joined;?></p>
                </div>
            </div>
            <div class="user-buttons">
                <a href="#">
                    <button id="edit">edit profile info</button>
                </a>
                <a href="../../logout.php">
                    <button id="logout">logout</button>
                </a>
            </div>
        </div>
        <div class="best-selling-section">
            <div class="top-section">
                <p class="section-title">best selling today.</p>
                <p class="section-small">This is what people are buying the most today.</p>
            </div>
            <div class="meal-box">
                <a href="#">
                    <img src="../../assets/meals/9.svg" alt="meal-image" class="meal-image">
                </a>
                <p class="meal-name">The plate christopher</p>
                <p class="meal-price">¢45.00</p>
                <p class="meal-description">Originating from the tribe of Ubuntu, this meal is the taste of....</p>
                <div class="button-and-heart">
                    <a href="#">
                        <button class="order-button">order now</button>
                    </a>
                    <button class="like-button">
                        <img src="../../assets/icons/like.svg" alt="like button" id="like">
                    </button>
                    <button class="like-button">
                        <img src="../../assets/icons/liked.svg" alt="like button" id="liked">
                    </button>
                </div>
            </div>
        </div>
        <div class="recommended">
            <div class="top-section">
                <p class="section-title">Recommended</p>
                <p class="section-small">We recommend these meals for you. Try them</p>
            </div>
            <div class="meals">
                <div class="recommended-meal">
                    <div class="button-only">
                        <button id="rlike">
                            <img src="../../assets/icons//like.svg" alt="like-button">
                        </button>
                        <button id="rliked">
                            <img src="../../assets/icons//liked.svg" alt="like-button">
                        </button>
                    </div>
                    <a href="#">
                        <img src="../../assets/meals/11.svg" alt="meal-image">
                    </a>  
                    <div class="meal-info">
                        <p class="rmeal-name">Black Panther</p>
                        <p class="rmeal-price">¢18.00</p>
                        <p class="rmeal-description">Originating from the tribe of Ubuntu, this meal is the taste of....</p>
                    </div>               
                </div>
            </div>
        </div>
        <div class="menubar">
            <div class="menu-icons">
                <div class="icon" class="active-page">
                    <a href="./homecustomer.php"><img src="../../assets/icons/home.svg" alt="home"></a>
                    <img src="../../assets/icons/active.svg" alt="current page">
                </div>
                <div class="icon">
                    <a href="#"><img src="../../assets/icons/heart.svg" alt="favorites"></a>
                </div>
                <div class="icon">
                    <a href="./menucustomer.php"><img src="../../assets/icons/menu.svg" alt="menu"></a>
                </div>
                <div class="icon">
                    <a href="./cart.php"><img src="../../assets/icons/cart.svg" alt="cart"></a>
                    <p id="cart-count"><?php echo $nummcart;?></p>
                </div>
                <div class="icon">
                    <a href="#"><img src="../../assets/icons/notification.svg" alt="notification"></a>
                </div>
            </div>
        </div>

    </div>
    

    <script src="../../interactivity/customerhome.js"></script>
</body>
</html>