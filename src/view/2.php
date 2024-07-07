<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Register-kuppimate</title>
    <link rel="stylesheet" href="/KuppiMate/public/css/styles.css?v=<?php echo time(); ?>">
</head>
<body>
    <nav class="navbar">
        <div class="navdiv">
            <div class="logo"><a href="#"><img src="\KuppiMate\public\images\logo.png"></a></div>
            <div class="rightSide">
                <div class="buttondiv">
                    <span class="material-symbols-rounded" style="color: #0B5ED7 ;">arrow_back_ios
                        </span>
        
                    <div class="buttontext">
                        Back
                    </div>
                </div>
                <button class="nav-button-button2"><a href="#">Login</a></button>
            
        </div> 
    </nav>

    <div class="container">
        <div class="leftBox Box">
            <div class="leftBoxtCenter">
                <h2>Login to <br><span class="highlight">KuppiMate</span></h2>
                <p>if you don't an account you can <a href="#" class="Register here">Register here!</a></p>
            </div>
        </div>

        <div class="image-holder">
            <img src="\KuppiMate\public\images\login_500x460.png" alt="image">
        </div>

        <div class="rightBox">

            <div class="profileImgCenter">
                <div class="profileImg">
                    
                </div>
            </div>
            <div class="form">

                <form action="">
                
                    <div class="form-wrapper">
                        <input type="email" name="email" placeholder="Enter Email" class="email">
                    </div>
    
                    <div class="form-wrapper">
                        <input type="password" name="password" placeholder="Enter Password" class="password">
                    </div>

                    <a href="#" class="forget-password">Forget Password</a>
                    
                    <button class="btn login">Login</button>
                       
    
                </form>
            </div>
        </div>
    
</body>
</html>