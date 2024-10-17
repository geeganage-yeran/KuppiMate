<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: /KuppiMate/src/view/recovery_password.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Process</title>
    <link rel="stylesheet" href="/KuppiMate/public/css/Ac-recovery.css?v=<?php echo time(); ?>">
</head>

<body>
    <div id="verify-code-container" class="container hidden">
        <button class="back" onclick="location.href='/KuppiMate/src/view/recovery_password.php'"    >&lt; Back</button>
        <h2>Check your email</h2>
        <form action="/KuppiMate/src/controller/otpVerification.php" method="POST">
            <input type="text" maxlength="1" class="code-input" name="digit1" required>
            <input type="text" maxlength="1" class="code-input" name="digit2" required>
            <input type="text" maxlength="1" class="code-input" name="digit3" required>
            <input type="text" maxlength="1" class="code-input" name="digit4" required>
            <input type="text" maxlength="1" class="code-input" name="digit5" required>
            <button class="reset" type="submit">Verify Code</button><br>
        </form>
        <label id="bottomText">Haven't got the email yet? <a href="/KuppiMate/src/controller/mail.php">Resend email</a></label>
        <?php
        if (isset($_GET['id'])) {
            if ($_GET['id'] == '102') {
                echo "<div id='otpMessage' style='margin-top:10px; color:#0b7a09; font-size:15px;text-align:center; '>OTP sent successfully</div>";
            } elseif ($_GET['id'] == '103') {
                echo "<div id='otpMessage' style='margin-top:10px; color: red; font-size:15px; text-align:center;'>Please Try Again!</div>";
            } elseif ($_GET['id'] == '104') {
                echo "<div id='otpMessage' style='margin-top:10px; color: red; font-size:15px; text-align:center; '>Not Match or Expired !</div>";
            }
        }
        ?>
    </div>
    <script src="/KuppiMate/public/js/Ac-recovery.js?v=<?php echo time(); ?>"></script>
</body>

</html>