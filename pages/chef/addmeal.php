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
    <link rel="stylesheet" href="../..//styles/addnewmeal.css">
    <title>Winkies - Chef Add New Meal</title>
</head>
<body>
    <div class="container">
        <div class="top">
            <img src="../../assets/images/logo-light.svg" alt="logo">
            <img src="../../assets/avatars/9.svg" alt="">
        </div>
        <div class="welcome">
            <p class="name">Hello, Chef <?php echo $username; ?>.</p>
            <p class="motivation">Add a new meal to the menu</p>
        </div>
        <p class="page">Customization</p>
        <div class="box">
            <p class="box-heading">Enter Meal Details</p>
            <p class="error"></p>
            <form action="#">
                <div class="wrapper">
                    <label for="image">
                        <img src="../../assets//icons/image.svg" alt="" id="imageContainer">
                    </label>
                    <input type="file" name="image" id="image" accept="image/*" hidden >
                </div>
                <div class="input">
                    <input type="text" name="meal-name" id="meal-name" placeholder="enter name of meal">
                </div>
                <div class="input">
                    <input type="number" name="meal-price" id="meal-price" placeholder="enter price of meal" min="0">
                </div>
                <div class="input">
                    <textarea name="description" id="description" placeholder="enter description of meal"></textarea>
                </div>
                <div class="input">
                    <input type="text" name="meal-name" id="meal-name" placeholder="enter name of meal">
                </div>
                <p class="ingredient-text">ingredients</p>
                <div class="ingredients">
                    <input type="text" name="ingredient 1" id="ingredient1">
                    <input type="text" name="ingredient 1" id="ingredient1">
                    <input type="text" name="ingredient 1" id="ingredient1">
                    <input type="text" name="ingredient 1" id="ingredient1">
                </div>
                <div class="input">
                    <input type="submit" value="Add Meal" name="submit">
                </div>
            </form>
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
                    <a href="./customization.php"><img src="../../assets/icons/settings.svg" alt="settings"></a>
                    <img src="../../assets/icons/active.svg" alt="current page">
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>