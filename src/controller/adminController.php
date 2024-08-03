<?php
include_once __DIR__ . '/../model/User.php';
include_once __DIR__ . '/../model/Dbconnector.php';
include_once __DIR__ . '/../model/Category.php';
include_once __DIR__ . '/../model/KuppiSession.php';

$user = new User();
$result = $user->userList(Dbconnector::getConnection(), "needToVerify");
$verified = $user->userList(Dbconnector::getConnection(), "verified");
$exLearnerList = $user->userList(Dbconnector::getConnection(), "externalLearnerList");

if (isset($_POST['acivateId'])) {
    $user->setuserId($_POST['acivateId']);
    if ($user->ugAccountActivation(Dbconnector::getConnection())) {
        header("Location: /KuppiMate/src/view/admin-dashboard.php?s=5");
        exit();
    };
}
if (isset($_POST['deleteId'])) {
    $user->setuserId($_POST['deleteId']);
    if ($user->deleteAccount(Dbconnector::getConnection())) {
        header("Location: /KuppiMate/src/view/admin-dashboard.php?s=6");
        exit();
    }
}
if (isset($_POST["inactiveId"])) {
    $user->setuserId($_POST["inactiveId"]);
    if ($user->inactiveAccount(Dbconnector::getConnection())) {
        header("Location: /KuppiMate/src/view/admin-dashboard.php?s=7");
        exit();
    }
}
if (isset($_POST["reactiveId"])) {
    $user->setuserId($_POST["reactiveId"]);
    if ($user->reactiveAccount(Dbconnector::getConnection())) {
        header("Location: /KuppiMate/src/view/admin-dashboard.php?s=8");
        exit();
    }
}

$totalUsers = $user->countDetails(Dbconnector::getConnection(), "totalUsers");
$totalUndergarduate = $user->countDetails(Dbconnector::getConnection(), "totalUndergarduate");
$needToVerify = $user->countDetails(Dbconnector::getConnection(), "needToVerify");
$totalActive = $user->countDetails(Dbconnector::getConnection(), "totalActive");

$kuppilist = new KuppiSession();
$kuppiresult = $kuppilist->listSession(Dbconnector::getConnection(), "pending");
$kuppiverified = $kuppilist->listSession(Dbconnector::getConnection(), "approved");
if (isset($_POST["link"], $_POST['resultId'])) {
    $kuppilist->setkuppiSessionId($_POST['resultId']);
    if ($kuppilist->setSession(Dbconnector::getConnection(), $_POST["link"])) {
        if ($kuppilist->approveSession(Dbconnector::getConnection())) {
            header("Location: /KuppiMate/src/view/admin-dashboard.php?s=9");
            exit();
        }
    }
}
