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

$sqlorder ="SELECT id, customer_id, order_time, COUNT(customer_id) AS HowMany FROM `cart` GROUP BY customer_id, order_time";
$resultorder= mysqli_query($con,$sqlorder);
$roworder= mysqli_fetch_assoc($resultorder);
$numOfOrders= mysqli_num_rows($resultorder)-1;
$numofOrders = $roworder['HowMany'];
if($resultorder){
    while($roworder = mysqli_fetch_assoc($resultorder)){
        //echo $roworder['id'].'<br> <br>';
        //echo $roworder['HowMany'].'<br>';
        //echo 'hello';
    }
}

// $sqlorder ="SELECT id, customer_id, order_time, SUM(meal_price) AS HowMany FROM `cart` GROUP BY customer_id, order_time";
//                     $resultorder= mysqli_query($con,$sqlorder);
//                     $roworder= mysqli_fetch_assoc($resultorder);
//                     $number = 0;
//                     if($resultorder){
//                         while($roworder = mysqli_fetch_assoc($resultorder)){
//                             $number++;
//                             $time = $roworder['order_time'];
//                             echo "
//                                 <tr>
//                                     <td><p class='order-number'>order #$number</p></td>
//                                     <td><p class='order-arrival'>$time</p></td>
//                                     <td><button>view</button></td>
//                                 </tr>
//                             ";
//                         }
                        
                        
//                     }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="52x52" href="../../assets/images/meta-logo-black.png">
    <link rel="stylesheet" href="../../styles/global.css">
    <link rel="stylesheet" href="../../styles/ordersche.css">
    <title>Winkies - Chef</title>
</head>
<body>
    <div class="container">
        <div class="top">
            <img src="../../assets/images/logo-light.svg" alt="logo">
            <img src="../../assets/avatars/9.svg" alt="">
        </div>
        <div class="welcome">
            <p class="name">Hello, Chef <?php echo $username; ?>.</p>
            <p class="motivation">Let’s get to business, shall we?</p>
        </div>
        <p class="page">Overview</p>
        <div class="boxes">
            <div class="box">
                <div class="up">
                    <p class="number"><?php echo $numOfOrders?></p>
                    <img src="../../assets/icons/new.svg" alt="current">
                </div>
                <div class="middle">
                    <p class="box-name">Current meals</p>
                </div>
                <div class="down">
                    <p class="summary">Total number of food meals we have in our menu currently.</p>
                </div>
            </div>
        </div>
        <div class="new-Orders">
            <div class="heading">
                <p class="section-title">New orders list</p>
                <p class="section-info">Total number of orders received and awaiting processing.</p>
            </div>
            <table>
                <?php
                    
                
                ?>
                
            </table>
        </div>
        <div class="menubar">
            <div class="menu-icons">
                <div class="icon">
                    <a href="./homechef.php"><img src="../../assets/icons/home.svg" alt="home"></a>
                </div>
                <div class="icon" class="active-page">
                    <a href="./orderschef.php"><img src="../../assets/icons/new.svg" alt="orders"></a>
                    <img src="../../assets/icons/active.svg" alt="current page">
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
                <div class="icon">
                    <a href="./customization.php"><img src="../../assets/icons/settings.svg" alt="settings"></a>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>