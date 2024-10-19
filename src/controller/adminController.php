<?php
include_once __DIR__ . '/../model/User.php';
include_once __DIR__ . '/../model/Dbconnector.php';
include_once __DIR__ . '/../model/Category.php';
include_once __DIR__ . '/../model/KuppiSession.php';
include_once __DIR__ . '/../model/Notice.php';

$user = new User();
$result = $user->userList(Dbconnector::getConnection(), "needToVerify");
$verified = $user->userList(Dbconnector::getConnection(), "verified");
$exLearnerList = $user->userList(Dbconnector::getConnection(), "externalLearnerList");
$category=new Category();
$catList=$category->getCategory(Dbconnector::getConnection());

if (isset($_POST['activateUserId'])) {
    $user->setuserId($_POST['activateUserId']);
    if ($user->ugAccountActivation(Dbconnector::getConnection())) {
        header("Location: /KuppiMate/src/view/admin-dashboard.php?u=5");
        exit();
    };
}
if (isset($_POST['deleteId'])) {
    $user->setuserId($_POST['deleteId']);
    if ($user->deleteAccount(Dbconnector::getConnection())) {
        header("Location: /KuppiMate/src/view/admin-dashboard.php?u=6");
        exit();
    }
}
if (isset($_POST["inactiveId"])) {
    $user->setuserId($_POST["inactiveId"]);
    if ($user->inactiveAccount(Dbconnector::getConnection())) {
        header("Location: /KuppiMate/src/view/admin-dashboard.php?u=7");
        exit();
    }
}
if (isset($_POST["reactiveId"])) {
    $user->setuserId($_POST["reactiveId"]);
    if ($user->reactiveAccount(Dbconnector::getConnection())) {
        header("Location: /KuppiMate/src/view/admin-dashboard.php?u=8");
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

if(isset($_POST["recordId"])){
    $kuppilist->setkuppiSessionId($_POST["recordId"]);
    $recordedLink=$_POST['recordedLink'];
    if($kuppilist->updateSessionRecordStatus(Dbconnector::getConnection(),$recordedLink)){
        header("Location: /KuppiMate/src/view/admin-dashboard.php");
        exit();
    }else{
        echo "Error";
    }    
}

// Notices to be Broadcast

$noticeSet=new Notice();
$noticeToDisplay=$noticeSet->listNotices(Dbconnector::getConnection());

if(isset($_POST['noticeId'])){
    $noticeId=$_POST['noticeId'];
    if($noticeSet->broadcastNotice(Dbconnector::getConnection(),$noticeId)){
        header("Location:/KuppiMate/src/view/admin-dashboard.php?n=101");
        exit();
    }else{
        header("Location:/KuppiMate/src/view/admin-dashboard.php?n=103");
        exit();
    }
}
if(isset($_POST['noticeDeleteId'])){
    $noticeDeleteId=$_POST['noticeDeleteId'];
    if($noticeSet->deleteNotice(Dbconnector::getConnection(), $noticeDeleteId)){
        header("Location:/KuppiMate/src/view/admin-dashboard.php?n=102");
        exit();
    }else{
        header("Location:/KuppiMate/src/view/admin-dashboard.php?n=103");
        exit();
    }
}

