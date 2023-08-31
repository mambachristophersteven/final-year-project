<?php

include './connection.php';

$error="";
$success="";
$currentDate = date('Y-m-d'); 

$username = "";
$password = "";

if(isset($_POST['submit'])){
    $username= $_POST['username'];
    $password= $_POST['password'];
    if(empty($username)){
        $error = "Invalid Login Credentials";
    }
    else{
        if(empty($password)){
            $error = "Invalid login Credentials";
        }
        else{
            $sql= "SELECT * FROM `users` WHERE username='$username' AND password ='$password'";
            $result= mysqli_query($con,$sql);
            $nums= mysqli_num_rows($result);
            if($nums>0){
                $row= mysqli_fetch_assoc($result);
                $passwordinDb =$row['password'];
                $position=$row['role'];               
                if($position==="Customer"){
                    session_start();
                    $_SESSION['username']= $username;
                    header('location: ./pages/customer/homecustomer.php');
                }
                if($position==="Chef"){
                    session_start();
                    $_SESSION['username']= $username;
                    header('location: ./pages/chef/homechef.php');
                }
                if($position==="Admin"){
                    session_start();
                    $_SESSION['username']= $username;
                    header('location: ./pages/admin/homeadmin.php');
                }
            }          
            else{
                $error= "Invalid Login Credentials";
            }
        }
    }


    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="52x52" href="./assets/images/meta-logo-black.png">
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/sign.css">
    <title>Winkies- Login</title>
</head>
<body>
    <div class="container">
        <div class="top">
            <img src="./assets/images/logo-light.png" alt="logo">
            <a href="./selectLogin.php">
                <img src="./assets//icons/back.svg" alt="back">
            </a>
        </div>
        <h1 class="heading">Login</h1>
        <div class="box">
            <p class="error" id="error"><?php echo $error; ?></p>
            <p class="box-title" id="boxTitle">Enter your credentials</p>
            <form action="./login.php" method="post" id="form">
                <div class="form">
                    <div class="input">
                        <label for="username">username</label>
                        <input type="text" name="username" id="username"  value="<?php echo $username; ?>">
                    </div>
                    <div class="input">
                        <label for="email">password</label>
                        <input type="password" name="password" id="password"  value="<?php echo $password; ?>">
                    </div>
                    <input type="submit" value="Next" name="submit" id="submit">
                </div>
            </form>
        </div>
        <div class="option">
            <p>Don't have an account?</p>
            <a href="./signup.php">sign up</a>
        </div>
    </div>

    <script src="./interactivity/login.js"></script>
    
</body>
</html>