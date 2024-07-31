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
    <div id="successful-container" class="container hidden">
        
        <h2 id="tCenter">Successful</h2>
        <p id="sPara">Congratulations! Your password has been changed. Click continue to login.</p>
        <button class="reset" onclick="document.location='/KuppiMate/src/view/login.php'">Continue</button>
    </div>
</body>
</html>
