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
        <button class="back" onclick="goBack('reset-password-container')">&lt; Back</button>
        <h2>Forgot password</h2>
        <p>Please enter your email to reset the password</p>
        <form id="reset-form" action="send-code.php"  method="POST" >
            <label id="tEmail">Your Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            <button type="submit" class="reset">Reset Password</button>
        </form>
    </div>

    <div id="verify-code-container" class="container hidden">
        <button class="back" onclick="showSection('reset-password-container')">&lt; Back</button>
        <h2>Check your email</h2>
        <p>We sent a reset link to <b id="user-email">contact@dscode...com</b>. Enter the 5-digit code mentioned in the email.</p>
        <form method="post" action="verify-code.php">
            <input type="text" maxlength="1" class="code-input" name="digit1">
            <input type="text" maxlength="1" class="code-input" name="digit2">
            <input type="text" maxlength="1" class="code-input" name="digit3">
            <input type="text" maxlength="1" class="code-input" name="digit4">
            <input type="text" maxlength="1" class="code-input" name="digit5">
            
        </form>
        <button class="reset" onclick="showSection('forget-password-container')">Verify Code</button><br>
        <label id="bottomText">Haven't got the email yet? <a href="#">Resend email</a></label>
    </div>
     
    <div id="forget-password-container" class="container hidden">
        <h2>Password reset</h2> 
        <p>Your password has been successfully reset. Click confirm to set a new password.</p>
        <button class="reset" onclick="showSection('new-password-container')">Confirm</button>
    </div>

    <div id="new-password-container" class="container hidden">
       <h2>Set a new password</h2>
        <p>Create a new password. Ensure it differs from previous ones for security.</p>
        <form onsubmit="event.preventDefault(); showSection('successful-container')">
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="password" name="confirmpassword" placeholder="Confirm Password" required><br>
            <button type="submit" class="reset">Update Password</button>
        </form>
    </div>

    <div id="successful-container" class="container hidden">
        <i class="fa-regular fa-circle-check"></i>
        <h2 id="tCenter">Successful</h2>
        <p id="sPara">Congratulations! Your password has been changed. Click continue to login.</p>
        <button class="reset">Continue</button>
    </div>

    <script src="/KuppiMate/public/js/Ac-recovery.js?v=<?php echo time(); ?>"></script>
</body>
</html>
