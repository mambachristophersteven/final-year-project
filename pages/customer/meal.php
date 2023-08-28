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
    <link rel="stylesheet" href="../..//styles/individualmea.css">
    <title>Winkies - Customer</title>
</head>
<body>
    <div class="container">
        <div class="form">
            <form action="#">
                <div class="top">
                    <img src="../../assets/icons/whiteBack.svg" alt="back">
                    <img src="../../assets/icons/cart.svg" alt="back">
                </div>
                <div class="image-like-quantity">
                    <img src="<?php echo $image;?>" alt="">
                    <div class="buttons">
                        <button id="like" class="like-button">
                            <img src="../../assets/icons/like.svg" alt="" >
                        </button>
                        <button id="liked" class="like-button">
                            <img src="../../assets/icons/liked.svg" alt="">
                        </button>
                    </div>
                    <div class="quantity">
                        <button id="decrease">
                            <img src="../../assets/icons/remove.svg" alt="">
                        </button>
                        <input type="number" name="quantity" id="quantity">
                        <button id="increase">
                            <img src="../../assets/icons/add.svg" alt="">
                        </button>
                    </div>
                </div>
                <div class="meal-info">
                    <div class="name-and-price">
                        <p class="meal-name"><?php echo $name; ?></p>
                        <p class="meal-price"><?php echo $price; ?></p>
                    </div>
                    <div class="description">
                        <p class="description-heading">Description</p>
                        <p class="meal-description"><?php echo $description;?></p>
                    </div>
                    <div class="ingredients">
                        <p class="ingredient-heading">Description</p>
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
                    <input type="number" id="total-amount" value="70.00">
                </div>
                <input type="submit" value="add to cart">
            </form>
        </div>       
    </div>

    <script src="../../interactivity/meal.js"></script>
</body>
</html>