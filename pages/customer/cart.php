<?php

include '../../connection.php'; 
session_start();
if(!isset($_SESSION['username'])){
    header("location: ../index.php");
}

$currentDate = date('Y-m-d'); 

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


$sqlview= "SELECT * from `meals`";
$resultview=mysqli_query($con,$sqlview);
$rowview=mysqli_fetch_assoc($resultview);

$id=$rowview['id'];
$name=$rowview['name'];
$price=$rowview['price'];
$image=$rowview['image'];
$description=$rowview['description'];
$ingredient1=$rowview['ingredient1'];
$ingredient2=$rowview['ingredient2'];
$ingredient3=$rowview['ingredient3'];
$ingredient4=$rowview['ingredient4'];

$sqlcart ="SELECT * FROM `cart` WHERE customer_id = '$customer_id'";
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
    <link rel="stylesheet" href="../..//styles/shoppingcar.css">
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
        <p class="page-title">Orders</p>
        <div class="cart">
            <form action="#" method="post" enctype="multipart/form-data" id="form">
                <div class="meals">
                    <?php 
                        include '../../connection.php';
                        $sqlshow = "SELECT * FROM `meals` ORDER BY id ASC";
                        $resultshow = mysqli_query($con,$sqlshow);
                        $numshow = mysqli_num_rows($resultshow);
                        if($resultshow){
                            while($rowshow = mysqli_fetch_assoc($resultshow)){
                                $meal_name = $rowshow['name'];
                                $id = $rowshow['id'];
                                $meal_price = '¢'.$rowshow['price'].'.00';
                                $meal_description = $rowshow['description'];
                                $meal_category = $rowshow['category'];
                                $meal_image = $rowshow['image'];
        
                                echo "
                                <div class='meal'>
                                    <a href='./meal.php?viewid=$id'>
                                        <img src='$meal_image' alt='meal_image' class='meal-image'>
                                    </a>
                                    <p class='meal-name'>$meal_name</p>
                                    <p class='meal-price'>$meal_price</p>
                                    <p class='meal-desc'>$meal_description</p>
                                    <div class='buttons'>
                                        <button class='like-button'>
                                            <img src='../../assets/icons/like.svg' alt='like button' id='like'>
                                        </button>
                                        <button class='like-button'>
                                            <img src='../../assets/icons/liked.svg' alt='like button' id='liked'>
                                        </button>
                                    </div>
                                </div>
                                ";
        
                            }
                        
                        }
                    
                    ?>
                </div>
            </form>
        </div>
        <div class="menubar">
            <div class="menu-icons">
                <div class="icon">
                    <a href="./homecustomer.php"><img src="../../assets/icons/home.svg" alt="home"></a>
                </div>
                <div class="icon">
                    <a href="#"><img src="../../assets/icons/heart.svg" alt="favorites"></a>
                </div>
                <div class="icon">
                    <a href="./menucustomer.php"><img src="../../assets/icons/menu.svg" alt="menu"></a>
                </div>
                <div class="icon" class="active-page">
                    <a href="./cart.php"><img src="../../assets/icons/cart.svg" alt="cart"></a>
                    <img src="../../assets/icons/active.svg" alt="current page">
                    <p id="cart-count"><?php echo $nummcart;?></p>
                </div>
                <div class="icon">
                    <a href="#"><img src="../../assets/icons/notification.svg" alt="notification"></a>
                </div>
            </div>
        </div>
    </div>
    

    <script src="../../interactivity/shoppingcart.js"></script>
</body>
</html>