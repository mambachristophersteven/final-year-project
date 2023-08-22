<?php

include './connection.php';

$error="Enter your credentials";
$success="";
$currentDate = date('Y-m-d'); 

$username = "";
$password = "";
$email = "";


if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($email)){
        $error= "Enter an email address";
    }
    else{
        if(empty($username)){
            $error = "Enter a username";
        }
        if(empty($password)){
            $error = 'Enter a password';
        }
    }

    $sqlinsert= "INSERT INTO `users` (username,email,password,date_joined,role) VALUES ('$username','$email','$password','$currentDate','Customer')";
    $result= mysqli_query($con, $sqlinsert);
    if($result){
        header("location: ./signed.php");
    }
    else{
        die("error occurred: ".mysqli_error($con));
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
            <p class="box-title" id="boxTitle"><?php echo $error; ?></p>
            <form action="./signup.php" method="post" id="form">
                <div class="form">
                    <div class="input">
                        <label for="email">email</label>
                        <input type="email" name="email" id="email" value="<?php echo $email; ?>">
                    </div>
                    <div class="input">
                        <label for="username">username</label>
                        <input type="text" name="username" id="username" value="<?php echo $username; ?>">
                    </div>
                    <div class="input">
                        <label for="email">password</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <input type="submit" value="Next" name="submit" id="submit">
                </div>
            </form>
        </div>
        <div class="option">
            <p>Already have an account?</p>
            <a href="./login.php">log in</a>
        </div>
    </div>

    <script src="./interactivity/signup.js"></script>
    
</body>
</html>