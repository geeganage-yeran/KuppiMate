<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp-External Learner</title>
    
    <link rel="stylesheet" href="/KuppiMate/public/css/external-signup.css?v=<?php echo time(); ?>">

</head>
<body>
<nav class="navbar">
    <div class="navdiv">
        <div class="logo"><a href="#"><img src="\KuppiMate\public\images\logo.png"></a></div>
        <ul>
            <button class="nav-button-button1"><a href="#">Back</a></button>
            <button class="nav-button-button2"><a href="#">Login</a></button>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="text">
            <h3 class ="black" style="color: black;">Register to</h3>
            <h3 class="blue" style="color: #0B5ED7;">KuppiMate</h3>
            <p class="para">Already have an account <br>you can <a href="#">Login here!</a> </p>
    </div>

    <div class="image-holder">
        <img src="\KuppiMate\public\images\login_500x460.png" alt="image">
    </div>

    <div class="form">
        <form action="">
            <div class="form-wrapper">
                <input type="text" name="name" placeholder="Full Name" class="name">
            </div>

            <div class="form-wrapper">
                <input type="email" name="email" placeholder="Email" class="email">
            </div>

            <div class="form-wrapper">
                <input type="password" name="password" placeholder="Password" class="password">
            </div>

            <div class="form-wrapper">
                <input type="password" name="re-password" placeholder="Repeat Password" class="re-password">
            </div>

            <div class="form-wrapper">
                <button type="submit" value="Register" class="Register">Register</button>
            </div>


        </form>
    </div>

</body>
</html>
