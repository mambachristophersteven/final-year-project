<?php

include './connection.php';

$error="";
$success="";
$currentDate = date('Y-m-d'); 


if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($email)){
        $error= "Enter your email";
    }
    else{
        if(empty($username)){
            $error = "Input a username";
        }
        else{
            if(empty($password)){
                $error = "Enter a password";
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
    <title>Winkies- Signup</title>
</head>
<body>
    <div class="container">
        <div class="top">
            <img src="./assets/images/logo-light.png" alt="logo">
            <a href="./selectLogin.php">
                <img src="./assets//icons/back.svg" alt="back">
            </a>
        </div>
        <h1 class="heading">Sign Up</h1>
        <div class="box">
            <p class="box-title" id="boxTitle">Enter your credentials</p>
            <form action="./selectAvatar.php" method="post">
                <div class="form">
                    <div class="input">
                        <label for="email">email</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div class="input">
                        <label for="username">username</label>
                        <input type="text" name="username" id="username">
                    </div>
                    <div class="input">
                        <label for="email">password</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <input type="submit" value="Next" id="submit">
                </div>
            </form>
        </div>
        <div class="option">
            <p>Already have an account?</p>
            <a href="./login.php">log in</a>
        </div>
    </div>

    <script>

    </script>
    
</body>
</html>