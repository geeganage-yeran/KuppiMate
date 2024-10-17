<?php

include_once __DIR__ . '/../model/User.php';
include_once __DIR__ . '/../model/Dbconnector.php';



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['new-password']) && !empty($_POST['new-password'])) {
        if (isset($_POST['con-password']) && !empty($_POST['con-password'])) {
            if (preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $_POST['new-password'])) {
                if (preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $_POST['con-password'])) {
                    if ($_POST['new-password'] == $_POST['con-password']) {
                        $newpassword = $_POST['new-password'];
                    } else {
                        header("Location: /KuppiMate/src/view/change_password.php?id=108");
                        exit();
                    }
                } else {
                    header("Location: /KuppiMate/src/view/change_password.php?id=107");
                    exit();
                }
            } else {
                header("Location: /KuppiMate/src/view/change_password.php?id=107");
                exit();
            }
        }
    }

    $user = new User();
    $newPassword = $_POST['new-password'];
    $email=$_SESSION['email'];

    $user->setPassword($newPassword);
    $user->setEmail($email);

    if ($user->recoveryUpdate(Dbconnector::getConnection())){
        unset($_SESSION['email']);
        unset($_SESSION['otp']);
        unset($_SESSION['otp_time']);
        header("Location: /KuppiMate/src/view/recover_success.php");
        exit();
    }else{
        unset($_SESSION['email']);
        unset($_SESSION['otp']);
        unset($_SESSION['otp_time']);
        header("Location: /KuppiMate/src/view/recovery_password.php?id=115");
        exit();
    }
}

