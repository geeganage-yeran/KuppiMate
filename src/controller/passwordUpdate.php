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
                        header("Location: /KuppiMate/src/view/ug-dashboard.php?id=108");
                        exit();
                    }
                } else {
                    header("Location: /KuppiMate/src/view/ug-dashboard.php?id=107");
                    exit();
                }
            } else {
                header("Location: /KuppiMate/src/view/ug-dashboard.php?id=107");
                exit();
            }
        }
    }

    $user = new User();

    $user_id = $_SESSION['id'];
    $user->setUserId($user_id);
    $currentPassword = $_POST['pr-password'];
    $dbpasw = $user->getPassword(Dbconnector::getConnection());
    if ($dbpasw && password_verify($currentPassword,$dbpasw)) {

        $user->setPassword($newpassword);
        if ($user->updateProfile(Dbconnector::getConnection(), "password-update", $currentPassword)) {
            header("Location: /KuppiMate/src/view/ug-dashboard.php?id=109");
            exit();
        } else {
            header("Location: /KuppiMate/src/view/ug-dashboard.php?id=111");
            exit();
        }
    } else {
        header("Location: /KuppiMate/src/view/ug-dashboard.php?id=110");
        exit();
    }
}

