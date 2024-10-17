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
    <link rel="stylesheet"href="/KuppiMate/public/css/Ac-recovery.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/61aa28421f.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="new-password-container" class="container hidden">
       <h2>Set a new password</h2>
        <p >Create a new password. Ensure it differs from previous ones for security.</p>
        <form action="/KuppiMate/src/controller/recoverPasswordController.php" method="post" onsubmit="return validateUpdatePassword()" >
            <input type="password" id="uPassword" name="new-password" placeholder="Password" required><br>
            <input type="password" id="cPassword" name="con-password" placeholder="Confirm Password" required><br>
            <button type="submit" class="reset">Update Password</button>
        </form>
        <?php
        if (isset($_GET['id'])) {
            if ($_GET['id'] == '108') {
                echo "<div style='margin-top:10px; color: red; font-size:15px;text-align:center; '>Password Mismatch</div>";
            } elseif ($_GET['id'] == '107') {
                echo "<div style='margin-top:10px; color: red; font-size:15px; text-align:center;'>Use a Strong Password !</div>";
            } elseif ($_GET['id'] == '104') {
                echo "<div style='margin-top:10px; color: red; font-size:15px; text-align:center; '>failed to recover the Account !</div>";
            }
        }
        ?>
    </div>
    <script src="/KuppiMate/public/js/Ac-recovery.js?v=<?php echo time(); ?>"></script>
</body>
</html>
