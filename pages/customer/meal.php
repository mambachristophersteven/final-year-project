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
    <link rel="stylesheet" href="../..//styles/individualme.css">
    <title>Winkies - Customer</title>
</head>
<body>
    <div class="container">
        <div class="form">
            <form action="#">
                <div class="top">
                    <a href="./menucustomer.php">
                        <img src="../../assets/icons/whiteBack.svg" alt="back">
                    </a>
                    <img src="../../assets/icons/cart.svg" alt="back">
                </div>
                <div class="image-like-quantity">
                    <img src="<?php echo $image;?>" alt="">
                    <div class="buttons">
                        <img src="../../assets/icons/like.svg" alt="" id="like" class="like-button">
                        <img src="../../assets/icons/liked.svg" alt="" id="liked" class="like-button">
                    </div>
                    <div class="quantity">
                        <!-- <img src="../../assets/icons/remove.svg" alt="" id="reduce"> -->
                        <input type="number" name="quantity" id="quantity" min="1" placeholder="1">
                        <!-- <img src="../../assets/icons/add.svg" alt="" id="increase"> -->
                    </div>
                </div>
                <div class="meal-info">
                    <div class="name-and-price">
                        <p class="meal-name"><?php echo $name; ?></p>
                        <p class="meal-price">¢<span id="meal-price"><?php echo $price; ?></span>.00</p>
                    </div>
                    <div class="description">
                        <p class="description-heading">Description</p>
                        <p class="meal-description"><?php echo $description;?></p>
                    </div>
                    <div class="ingredients">
                        <p class="ingredient-heading">Ingredients</p>
                        <div class="ingredient-boxes">
                            <div class="ingredient-box">
                                <p><?php echo $ingredient1; ?></p>
                            </div>
                            <div class="ingredient-box">
                                <p><?php echo $ingredient2; ?></p>
                            </div>
                            <div class="ingredient-box">
                                <p><?php echo $ingredient3; ?></p>
                            </div>
                            <div class="ingredient-box">
                                <p><?php echo $ingredient4; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="total">
                    <p class="total-heading">Total amount</p>
                    <div class="totals">
                        <input type="number" id="total-amount" disabled>
                        <p class="user-total">¢<span id="user-total">0</span>.00</p>
                    </div>
                </div>
                <input type="submit" value="add to cart">
            </form>
        </div>       
    </div>

    <script src="../../interactivity/individualme.js"></script>
</body>
</html>