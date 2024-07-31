<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Process</title>
    <link rel="stylesheet"href="/KuppiMate/public/css/Ac-recovery.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/61aa28421f.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="reset-password-container" class="container">
        <button class="back" onclick="document.location='/KuppiMate/src/view/login.php'">&lt; Back</button>
        <h2>Forgot password</h2>
        <p>Please enter your email to reset the password</p>
        <form id="reset-form" action="/KuppiMate/src/controller/mail.php"  method="POST" >
            <label id="tEmail">Your Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            <button type="submit" class="reset">Reset Password</button>
        </form>
        <?php
            if (isset($_GET['id'])) {
                if ($_GET['id'] == '101') {
                    echo "<div style='margin-top:10px; color: red; font-size:15px;text-align:center; '>Email is not registerd Yet !</div>";
                }elseif ($_GET['id'] == '115') {
                    echo "<div style='margin-top:10px; color: red; font-size:15px;text-align:center; '>Failed to Recover the Account !</div>";
                }
            }
        ?>
    </div>
</body>
</html>
