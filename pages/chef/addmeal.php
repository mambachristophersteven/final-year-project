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

$currentDate = date('Y-m-d'); 

$error = "";

$name = "";
$price = "";
$description = "";
$category = "";
$ingredient1 = "";
$ingredient2 = "";
$ingredient3 = "";
$ingredient4 = "";

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $ingredient1 = $_POST['ingredient1'];
    $ingredient2 = $_POST['ingredient2'];
    $ingredient3 = $_POST['ingredient3'];
    $ingredient4 = $_POST['ingredient4'];
    $image = $_FILES['image'];

    if(empty($name)){
        $error = "Enter name of meal";
    }
    else{
        if(empty($price)){
            $error = "Enter price of meal";
        }
        else{
            if(empty($description)){
                $error = "Enter description of meal";
            }
            else{
                if(empty($category)){
                    $error = "Enter category of meal";
                }
                else{
                    if(empty($ingredient1)){
                        $error = "Enter ingredient of meal";
                    }
                    else{
                        if(empty($ingredient2)){
                            $error = "Enter ingredient of meal";
                        }
                        else{
                            if(empty($ingredient3)){
                                $error = "Enter ingredient of meal";
                            }
                            else{
                                if(empty($ingredient4)){
                                    $error = "Enter ingredient of meal";
                                }
                                else{
                                    $imagefilename= $image['name'];
                                    $imagefiletemp= $image['tmp_name'];
                                    $imagefileerror= $image['error'];
                                    $imagefiletype= $image['type'];
                                    $filename_separate= explode('.',$imagefilename);
                                    $imagefilenameextension= strtolower($filename_separate['1']);
                                    $extensions= array('jpeg', 'jpg', 'png', 'svg');
                                    if(in_array($imagefilenameextension,$extensions)){
                                        $upload_image='../../meals/'.$imagefilename;
                                        move_uploaded_file($imagefiletemp,$upload_image);
                                        $sqlinsert= "INSERT INTO `meals` (name,price,description,category,image,ingredient1,ingredient2,ingredient3,ingredient4,date_added,on_menu) VALUES ('$name','$price','$description','$category','$upload_image','$ingredient1','$ingredient2','$ingredient3','$ingredient4','$currentDate','false')";
                                        $resultin= mysqli_query($con, $sqlinsert);
                                        if($resultin){
                                            header("location: ./homechef.php");
                                            exit;
                                        }
                                        else{
                                            die("error occurred: ".mysqli_error($con));
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
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
    <link rel="icon" type="image/png" sizes="52x52" href="../../assets/images/meta-logo-black.png">
    <link rel="stylesheet" href="../../styles/global.css">
    <link rel="stylesheet" href="../..//styles/addnewm.css">
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
            <p id="error"><?php echo $error; ?></p>
            <form action="./addmeal.php" method="post" enctype="multipart/form-data"id="form">
                <div class="wrapper">
                    <label for="image">
                        <img src="../../assets//icons/image.svg" alt="" id="imageContainer">
                    </label>
                    <input type="file" name="image" id="image" accept="image/*" hidden >
                </div>
                <div class="input">
                    <input type="text" name="name" id="name" placeholder="enter name of meal" value="<?php echo $name;?>">
                </div>
                <div class="input">
                    <input type="number" name="price" id="price" placeholder="enter price of meal" min="0" value="<?php echo $price;?>">
                </div>
                <div class="input">
                    <textarea name="description" id="description" placeholder="enter description of meal" value="<?php echo $description;?>"></textarea>
                </div>
                <p class="ingredient-text">choose category</p>
                <div class="input">
                    <select name="category" id="category" value="<?php echo $category;?>">
                        <option value=""></option>
                        <option value="Burgers">Burgers</option>
                        <option value="Salads">Salad</option>
                        <option value="Juices">Juices</option>
                        <option value="Hot Dogs">Hot Dogs</option>
                        <option value="Fries">Fries</option>
                        <option value="Pizzas">Pizzas</option>
                        <option value="Pastries">Pastries</option>
                        <option value="Lunch">Lunch</option>
                        <option value="Brunch">Brunch</option>
                        <option value="Vegan">Vegan</option>
                        <option value="Milkshakes">Milkshakes</option>
                        <option value="Breakfast">Breakfast</option>
                        <option value="Chef Choice">Chef Choice</option>
                        
                    </select>
                </div>
                <p class="ingredient-text"> main ingredients</p>
                <div class="ingredients">
                    <input type="text" name="ingredient1" id="ingredient1" value="<?php echo $ingredient1;?>">
                    <input type="text" name="ingredient2" id="ingredient2" value="<?php echo $ingredient2;?>">
                    <input type="text" name="ingredient3" id="ingredient3" value="<?php echo $ingredient3;?>">
                    <input type="text" name="ingredient4" id="ingredient4" value="<?php echo $ingredient4;?>">
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