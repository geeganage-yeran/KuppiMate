<?php
session_start();

if (isset($_POST['digit1'], $_POST['digit2'], $_POST['digit3'], $_POST['digit4'], $_POST['digit5'])) {

    $otp = $_POST['digit1'] . $_POST['digit2'] . $_POST['digit3'] . $_POST['digit4'] . $_POST['digit5'];

    if ($otp == $_SESSION['otp'] && (time() - $_SESSION['otp_time']) <= 120) {
        header("Location: /KuppiMate/src/view/reset_confirm.php");
        exit();
    } else {
        header("Location: /KuppiMate/src/view/otp.php?id=104");
        exit();
    }
}


