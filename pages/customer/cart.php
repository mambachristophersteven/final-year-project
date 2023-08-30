<?php

include '../../connection.php'; 
session_start();
if(!isset($_SESSION['username'])){
    header("location: ../index.php");
}

$currentDate = date('Y-m-d'); 
$currentTime = date('h:i:s'); 

$currentDateTime = date('Y-m-d h:i:s'); 

//echo $currentDateTime;

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


$sqltotal = "SELECT SUM(cash_amount) from `cart`";
$resulttotal = mysqli_query($con,$sqltotal);
$sumcart = mysqli_fetch_assoc($resulttotal);

$sum = '¢'.$sumcart['SUM(cash_amount)'].'.00';
//echo $sum;

// $rowtotal = mysqli_num_rows($resulttotal);
// $net_total = $rowtotal;



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="52x52" href="../../assets/images/meta-logo-black.png">
    <link rel="stylesheet" href="../../styles/global.css">
    <link rel="stylesheet" href="../..//styles/shopping.css">
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
                <div class="meals">
                    <?php 
                        include '../../connection.php';
                        $sqlshow = "SELECT * FROM `cart` WHERE customer_id = '$customer_id' ORDER BY id DESC";
                        $resultshow = mysqli_query($con,$sqlshow);
                        //$numshow = mysqli_num_rows($resultshow);
                        if($resultshow){
                            while($rowshow = mysqli_fetch_assoc($resultshow)){
                                $meal_name = $rowshow['meal_name'];
                                $id = $rowshow['id'];
                                $meal_price = '¢'.$rowshow['meal_price'].'.00';
                                $cash_amount = '¢'.$rowshow['cash_amount'].'.00';
                                $meal_quantity = $rowshow['quantity'];
                                $meal_image = $rowshow['meal_image'];
        
                                echo "
                                <div class='meal'>
                                    <img src='$meal_image' alt='menu'>
                                    <p class='meal-name'>$meal_name</p>
                                    <p class='meal-price'>$meal_price</p>
                                    <input type='number' name='quantity' id='quantity' min='1' value='$meal_quantity' disabled>
                                    <div class='total-close'>
                                        <button id='view'  onclick=\"location.href = 'removeorder.php?removeid=".$id."'\">
                                            <img src='../../assets/icons/close.svg' alt='' id='close'>
                                        </button>
                                        <p class='meal-total' id='meal-total'>$cash_amount</p>
                                    </div>                                   
                                </div>
                                ";
        
                            }
                        
                        }             
                    ?>
                </div>
                    <div class="totals">
                    <div class="total-meal-amount">
                        <p class="amount-text">Total amount</p>
                        <p class="amount-figure"><?php echo $sum;?></p>
                    </div>
                    <!-- <div class="vat">
                        <p class="vat-text">vat</p>
                        <p class="vat-figure">¢12.00</p>
                    </div> -->
                    <div class="net">
                        <p class="net-text">net amount</p>
                        <p class="net-figure"><?php echo $sum;?></p>
                    </div>
                    <div class="button">
                        <button onclick="location.href = 'emptycart.php?removeid=<?php echo $customer_id; ?>'">Place Order</button>
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