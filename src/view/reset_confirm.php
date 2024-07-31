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
    <div id="forget-password-container" class="container hidden">
        <h2>Password reset</h2> 
        <p>Your password has been successfully reset. Click confirm to set a new password.</p>
        <button onclick="document.location='/KuppiMate/src/view/change_password.php'" class="reset">Confirm</button>
    </div>
</body>
</html>
