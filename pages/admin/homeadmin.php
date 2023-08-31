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

$sqlorder ="SELECT id, customer_id, order_time, COUNT(customer_id) AS HowMany FROM `cart` GROUP BY customer_id, order_time";
$resultorder= mysqli_query($con,$sqlorder);
$roworder= mysqli_fetch_assoc($resultorder);
$numOfOrders= mysqli_num_rows($resultorder)-1;


$sqlchef= "SELECT * FROM `users` WHERE role= 'Chef'";
$resultchef= mysqli_query($con,$sqlchef);
$numschef= mysqli_num_rows($resultchef);
$row= mysqli_fetch_assoc($resultchef);

$sqlcustomer= "SELECT * FROM `users` WHERE role= 'Customer'";
$resultcustomer= mysqli_query($con,$sqlcustomer);
$numscustomer= mysqli_num_rows($resultcustomer);
$row= mysqli_fetch_assoc($resultcustomer);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winkies-Admin</title>
    <link rel="icon" type="image/png" sizes="52x52" href="../../assets/images/meta-logo-black.png">
    <link rel="stylesheet" href="../../styles/global.css">
    <link rel="stylesheet" href="../../styles/adminhomepage.css">
</head>
<body>
<div class="container">
        <div class="top">
            <img src="../../assets/images/logo-light.svg" alt="logo">
            <img src="../../assets/avatars/9.svg" alt="">
        </div>
        <div class="welcome">
            <p class="name">Hello, Admin <?php echo $username; ?>.</p>
            <p class="motivation">Check and know what ever is happening.</p>
        </div>
        <p class="page">Overview</p>
        <div class="boxes">
            <div class="box">
                <div class="up">
                    <p class="number"><?php echo $numsmeals; ?></p>
                    <img src="../../assets/icons/current.svg" alt="current">
                </div>
                <div class="middle">
                    <p class="box-name">Current meals</p>
                </div>
                <div class="down">
                    <p class="summary">Total number of food meals we have in our menu currently.</p>
                </div>
            </div>
            <div class="box">
                <div class="up">
                    <p class="number"><?php echo $numOfOrders; ?></p>
                    <img src="../../assets/icons/newOrdersBlack.svg" alt="current">
                </div>
                <div class="middle">
                    <p class="box-name">New Orders</p>
                </div>
                <div class="down">
                    <p class="summary">Total number of orders that just came through.</p>
                </div>
            </div>
            <div class="box">
                <div class="up">
                    <p class="number"><?php echo $numschef;?></p>
                    <img src="../../assets/icons/current.svg" alt="current">
                </div>
                <div class="middle">
                    <p class="box-name">Chefs</p>
                </div>
                <div class="down">
                    <p class="summary">Total number of chefs we have in our restaurant.</p>
                </div>
            </div>
            <div class="box">
                <div class="up">
                    <p class="number"><?php echo $numscustomer;?></p>
                    <img src="../../assets/icons/current.svg" alt="current">
                </div>
                <div class="middle">
                    <p class="box-name">Customers</p>
                </div>
                <div class="down">
                    <p class="summary">Total number of customers registered</p>
                </div>
            </div>
        </div>
        <div class="new-Orders">
            <div class="heading">
                <p class="section-title">Receently Added Customers.</p>
                <p class="section-info">Newly signed up customers, quick view.</p>
            </div>
            <table>
                <thead>
                    <th>no.</th>
                    <th>username</th>
                    <th>email</th>
                    <th>date</th>
                </thead>
                <?php
                    $sqlshow ="SELECT * FROM `users` WHERE role = 'Customer'";
                    $resultshow= mysqli_query($con,$sqlshow);
                    //$rowshow= mysqli_fetch_assoc($resultshow);
                    $number = 0;
                    if($resultshow){
                        while($rowshow = mysqli_fetch_assoc($resultshow)){
                            $number++;
                            $customer_username = $rowshow['username'];
                            $customer_email = $rowshow['email'];
                            $customer_date = $rowshow['date_joined'];
                        }
                        echo "
                            <tr>
                                <td><p class='meal-ranking'>$number</p></td>
                                <td><p class='meal-name'>$customer_username</p></td>
                                <td><p class='meal-price'>$customer_email</p></td>
                                <td><p class='meal-orders'>$customer_date</p></td>
                            </tr>
                        
                        ";
                    }
                
                ?>
            </table>
        </div>
        <div class="menubar">
            <div class="menu-icons">
                <div class="icon" class="active-page">
                    <a href="./homechef.php"><img src="../../assets/icons/home.svg" alt="home"></a>
                    <img src="../../assets/icons/active.svg" alt="current page">
                </div>
                <div class="icon">
                    <a href="./homeadmin.php"><img src="../../assets/icons/new.svg" alt="orders"></a>
                </div>
                <div class="icon">
                    <a href="#"><img src="../../assets/icons/person.svg" alt="pending orders"></a>
                </div>
                <div class="icon">
                    <a href="#"><img src="../../assets/icons/person-add.svg" alt="meals"></a>
                </div>
                <div class="icon">
                    <a href="./customization.php"><img src="../../assets/icons/settings.svg" alt="settings"></a>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>