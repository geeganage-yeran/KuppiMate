<?php
include_once __DIR__ . '/../model/User.php';
include_once __DIR__ . '/../model/Category.php';
include_once __DIR__ . '/../model/KuppiSession.php';
include_once __DIR__ . '/../model/Dbconnector.php';
include_once __DIR__.'/../model/Notice.php';

if (isset($_SESSION['id'])) {
    $kuppisession = new KuppiSession();
    $output = $kuppisession->getSession(Dbconnector::getConnection(), $_SESSION['id']);
} else {
    header("Location: /KuppiMate/src/view/login.php");
    exit();
}
$catname = new Category();
$catList = $catname->getCategory(Dbconnector::getConnection());

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['tName'], $_POST['description'], $_POST['startDate'], $_POST['endDate'], $_POST['category'], $_SESSION['id'])) {
        $title = $_POST['tName'];
        $description = $_POST['description'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $categoryId = $_POST['category'];
        $userId = $_SESSION['id'];

        if (!empty($title) && !preg_match('/^[a-zA-Z0-9\s\-_\.(),]+$/', $title)) {
            $errorMessage = 'Invalid title you canot use special characters in title only allowed (- , _ , .)';
            $_SESSION['errorMessage'] = $errormessage;
            header("Location: /KuppiMate/src/view/ug-dashboard.php?id=1");
            exit();
        }

        if (!empty($description) && !preg_match('/^[a-zA-Z0-9\s\-_\.(),]+$/', $description)) {
            $errorDescription = 'Invalid description you canot use special characters in decription only allowed (- , _ , .)';
            header("Location: /KuppiMate/src/view/ug-dashboard.php?id=1");
            exit();
        }
        $kuppisession = new KuppiSession();
        $kuppisession->setTitle($title);
        $kuppisession->setDescription($description);
        $kuppisession->setStartDate($startDate);
        $kuppisession->setEndDate($endDate);
        $lastID=$kuppisession->createSession(Dbconnector::getConnection(), $categoryId, $userId);
        if ($lastID!==NULL) {
            $notice = new Notice();
            $notice->setTitle($title);
            $notice->setDescription($description);
            if ($notice->createNotice(Dbconnector::getConnection(), $categoryId, $userId,$lastID)) {
                header("Location: /KuppiMate/src/view/ug-dashboard.php?id=3");
                exit();
            }else{
                header("Location: /KuppiMate/src/view/ug-dashboard.php?id=6");
                exit();
            }
        }

    }
}

if (isset($_POST['deleteSessionId'])) {
    $deleteSessionId = $_POST['deleteSessionId'];
    $kuppisession = new KuppiSession();
    if ($kuppisession->deleteSession(Dbconnector::getConnection(), $deleteSessionId)) {
        header("Location: /KuppiMate/src/view/ug-dashboard.php");
        exit();
    }
}
if (isset($_POST['deleteKuppiSessionId'])) {
    $deleteSessionId = $_POST['deleteKuppiSessionId'];
    $kuppisession = new KuppiSession();
    if ($kuppisession->deleteSession(Dbconnector::getConnection(), $deleteSessionId)) {
        header("Location: /KuppiMate/src/view/admin-dashboard.php");
        exit();
    }
}
