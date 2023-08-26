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

$sqlmeals_on_menu = "SELECT * FROM `meals` WHERE on_menu = 'true'";
$resultmeals_on_menu = mysqli_query($con,$sqlmeals_on_menu);
$numsmeals_on_menu = mysqli_num_rows($resultmeals_on_menu);
$rowmeals = mysqli_fetch_assoc($resultmeals);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="52x52" href="../../assets/images/meta-logo-black.png">
    <link rel="stylesheet" href="../../styles/global.css">
    <link rel="stylesheet" href="../..//styles/customization.css">
    <title>Winkies - Chef Customization</title>
</head>
<body>
    <div class="container">
        <div class="top">
            <img src="../../assets/images/logo-light.svg" alt="logo">
            <img src="../../assets/avatars/9.svg" alt="">
        </div>
        <div class="welcome">
            <p class="name">Hello, Chef <?php echo $username; ?>.</p>
            <p class="motivation">Customize the restaurant as you please.</p>
        </div>
        <p class="page">Customization</p>
        <div class="boxes">
            <div class="box" id="current">
                <div class="up">
                    <p class="number">560</p>
                    <img src="../../assets/icons/allMeals.svg" alt="current">
                </div>
                <div class="middle">
                    <p class="box-name">All meals</p>
                </div>
                <div class="down">
                    <p class="summary">Total number of food meals we have in our menu..</p>
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
        <div class="button-div">
            <a href="./addmeal.php" class="button">
                <button>Add New Meal</button>
            </a>
        </div>
        <div class="menu-list-div">
            <p class="section-heading">All Meals List</p>
            <div class="search">
                <form action="#">
                    <div class="input">
                        <input type="text" name="search" id="search" placeholder="search all meals">
                        <img src="../../assets/icons/search.svg" alt="">
                    </div>
                    <input type="submit" value="search" name="search" id="searchButton">
                </form>
            </div>
            <div class="meals">
                <div class="meal">
                    <p>meal box here</p>
                </div>
            </div>
        </div>

        <div class="menubar">
            <div class="menu-icons">
                <div class="icon">
                    <a href="./homechef.php"><img src="../../assets/icons/home.svg" alt="home"></a>
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
                <div class="icon" class="active-page">
                    <a href="#"><img src="../../assets/icons/settings.svg" alt="settings"></a>
                    <img src="../../assets/icons/active.svg" alt="current page">
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>