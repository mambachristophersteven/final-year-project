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

if(isset($_POST['submit'])){
    echo 'helloooo';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="52x52" href="../../assets/images/meta-logo-black.png">
    <link rel="stylesheet" href="../../styles/global.css">
    <link rel="stylesheet" href="../..//styles/addnewme.css">
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
        <p class="page">Add New Meal</p>
        <div class="box">
            <p class="box-heading">Enter Meal Details</p>
            <p id="error"></p>
            <form action="#" id="form">
                <div class="wrapper">
                    <label for="image">
                        <img src="../../assets//icons/image.svg" alt="" id="imageContainer">
                    </label>
                    <input type="file" name="image" id="image" accept="image/*" hidden >
                </div>
                <div class="input">
                    <input type="text" name="name" id="name" placeholder="enter name of meal">
                </div>
                <div class="input">
                    <input type="number" name="price" id="price" placeholder="enter price of meal" min="0">
                </div>
                <div class="input">
                    <textarea name="description" id="description" placeholder="enter description of meal"></textarea>
                </div>
                <div class="input">
                    <input type="text" name="category" id="category" placeholder="enter category of meal">
                </div>
                <p class="ingredient-text"> main ingredients</p>
                <div class="ingredients">
                    <input type="text" name="ingredient 1" id="ingredient1">
                    <input type="text" name="ingredient 2" id="ingredient2">
                    <input type="text" name="ingredient 3" id="ingredient3">
                    <input type="text" name="ingredient 4" id="ingredient4">
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
    <script src="../../interactivity/addmeal.js"></script>
    
</body>
</html>