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
    <link rel="stylesheet" href="../..//styles/customerhome.css">
    <title>Winkies - Customer</title>
</head>
<body>
    <div class="container">
    <div class="top">
            <img src="../../assets/images/logo-light.svg" alt="logo">
            <img src="../../assets/avatars/9.svg" alt="">
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
        <div class="best-selling-section">
            <div class="top-section">
                <p class="section-title">best selling today</p>
                <p class="section-small">This is what people are buying the most today</p>
            </div>
            <div class="meal-box">
                <a href="#">
                    <img src="../../assets/meals/9.svg" alt="meal-image" class="meal-image">
                </a>
                <p class="meal-name">The plate chritopher</p>
                <p class="meal-price">¢45.00</p>
                <p class="meal-description">Originating from the tribe of Ubuntu, this meal is the taste of....</p>
                <div class="button-and-heart">
                    <a href="#">
                        <button>order now</button>
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
            <div class="meals">
                <div class="recommended-meal">
                    <div class="button-only">
                        <button>
                            <img src="../../assets/icons//like.svg" alt="like-button">
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
                <div class="recommended-meal">
                    <div class="button-only">
                        <button>
                            <img src="../../assets/icons//like.svg" alt="like-button">
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
        </div>
        <div class="menubar">
            <div class="menu-icons">
                <div class="icon">
                    <a href="./homechef.php"><img src="../../assets/icons/home.svg" alt="home"></a>
                </div>
                <div class="icon">
                    <a href="#"><img src="../../assets/icons/heart.svg" alt="favorites"></a>
                </div>
                <div class="icon">
                    <a href="#"><img src="../../assets/icons/menu.svg" alt="menu"></a>
                </div>
                <div class="icon">
                    <a href="#"><img src="../../assets/icons/cart.svg" alt="cart"></a>
                </div>
                <div class="icon" class="active-page">
                    <a href="#"><img src="../../assets/icons/notification.svg" alt="notification"></a>
                    <img src="../../assets/icons/active.svg" alt="current page">
                </div>
            </div>
        </div>

    </div>
    
</body>
</html>