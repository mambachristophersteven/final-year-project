<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="52x52" href="./assets/images/meta-logo-black.png">
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/selectAvatar.css">
    <title>Winkies- Select Avatar</title>
</head>
<body>
    <div class="container">
        <div class="top">
            <img src="./assets/images/logo-light.png" alt="logo">
            <a href="./signup.php">
                <img src="./assets//icons/back.svg" alt="back">
            </a>
        </div>
        <h1 class="heading">Sign Up</h1>
        <form action="./selectAvatar.php" method="post">
            <div class="box">
                <p class="box-title">Choose Your Avatar</p>
                <div class="imgBox" id="imgBox">
                    <img src="./assets/avatars/1.svg" alt="avatar" id="1">
                    <img src="./assets/avatars/2.svg" alt="avatar" id="2">
                    <img src="./assets/avatars/3.svg" alt="avatar" id="3">
                    <img src="./assets/avatars/4.svg" alt="avatar" id="4">
                    <img src="./assets/avatars/5.svg" alt="avatar" id="5">
                    <img src="./assets/avatars/6.svg" alt="avatar" id="6">
                    <img src="./assets/avatars/7.svg" alt="avatar" id="7">
                    <img src="./assets/avatars/8.svg" alt="avatar" id="8">
                    <img src="./assets/avatars/9.svg" alt="avatar" id="9">
                    <img src="./assets/avatars/10.svg" alt="avatar" id="10">
                    <img src="./assets/avatars/11.svg" alt="avatar" id="11">
                    <img src="./assets/avatars/12.svg" alt="avatar" id="12">
                </div>

            </div>
            <input type="submit" value="Finish" id="submit">
        </form>
        
    </div>

    <script>
        let images = document.getElementById('imgBox');
        //console.log(images.children);
        images.addEventListener('click', function(e){
            console.log(e.target.src);
        })
        // Array.from(images).forEach(image=>{
        //     box.addEventListener('click', imgClicked)
        // })
        // function imgClicked(e){
        //     console.log(e.target.src);
        // }
    </script>
    
</body>
</html>