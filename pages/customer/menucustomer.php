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


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="52x52" href="../../assets/images/meta-logo-black.png">
    <link rel="stylesheet" href="../../styles/global.css">
    <link rel="stylesheet" href="../..//styles/menucustomer.css">
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
        <div class="categories-section">
            <div class="categories-top">
                <p class="categories-heading">Categories</p>
                <img src="../../assets/icons/categories.svg" alt="">
            </div>
            <div class="category-images">
                <div class="category-image current-category" class="current-category">
                    <button>
                        <img src="../../assets/categories/all.svg" alt="category-image">
                    </button>
                    <img src="../../assets/categories/current.svg" alt="current">
                </div>
                <div class="category-image">
                    <button>
                        <img src="../../assets/categories/breakfast.svg" alt="category-image">
                    </button>
                    <img src="../../assets/categories/current.svg" alt="current">
                </div>
                <div class="category-image">
                    <button>
                        <img src="../../assets/categories/dinner.svg" alt="category-image">
                    </button>
                    <img src="../../assets/categories/current.svg" alt="current">
                </div>
                <div class="category-image">
                    <button>
                        <img src="../../assets/categories/pizza.svg" alt="category-image">
                    </button>
                    <img src="../../assets/categories/current.svg" alt="current">
                </div>
                <div class="category-image">
                    <button>
                        <img src="../../assets/categories/steaks.svg" alt="category-image">
                    </button>
                    <img src="../../assets/categories/current.svg" alt="current">
                </div>
            </div>
        </div>
        <div class="list-section">
            <div class="section-top">
                <p class="section-heading">All Foods</p>
                <p class="section-small">Explore all our meals and quisines</p>
            </div>
            <div class="meals">
                <div class='meal'>
                    <a href="#">
                        <img src='../../assets/meals/5.svg' alt='meal_image' class='meal-image'>
                    </a>
                    <p class='meal-name'>Karl mucho</p>
                    <p class='meal-price'>¢67.00</p>
                    <p class='meal-desc'>Originating from the tribe of Ubuntu, this meal is the taste of....</p>
                    <div class='buttons'>
                        <button class="like-button">
                            <img src="../../assets/icons/like.svg" alt="like button" id="like">
                        </button>
                        <button class="like-button">
                            <img src="../../assets/icons/liked.svg" alt="like button" id="liked">
                        </button>
                    </div>
                </div>
                <div class='meal'>
                    <img src='../../assets/meals/4.svg' alt='meal_image' class='meal-image'>
                    <p class='meal-name'>Karl mucho</p>
                    <p class='meal-price'>¢67.00</p>
                    <p class='meal-desc'>Originating from the tribe of Ubuntu, this meal is the taste of....</p>
                    <div class='buttons'>
                        <button class="like-button">
                            <img src="../../assets/icons/like.svg" alt="like button" id="like">
                        </button>
                        <button class="like-button">
                            <img src="../../assets/icons/liked.svg" alt="like button" id="liked">
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="menubar">
            <div class="menu-icons">
                <div class="icon">
                    <a href="./homecustomer.php"><img src="../../assets/icons/home.svg" alt="home"></a>
                </div>
                <div class="icon">
                    <a href="#"><img src="../../assets/icons/heart.svg" alt="favorites"></a>
                </div>
                <div class="icon" class="active-page">
                    <a href="./menucustomer.php"><img src="../../assets/icons/menu.svg" alt="menu"></a>
                    <img src="../../assets/icons/active.svg" alt="current page">
                </div>
                <div class="icon">
                    <a href="#"><img src="../../assets/icons/cart.svg" alt="cart"></a>
                </div>
                <div class="icon">
                    <a href="#"><img src="../../assets/icons/notification.svg" alt="notification"></a>
                </div>
            </div>
        </div>

    </div>
    

    <script src="../../interactivity/menucustomer.js"></script>
</body>
</html>