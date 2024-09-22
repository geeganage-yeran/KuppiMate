<?php
include_once __DIR__ . '/../model/Dbconnector.php';
include_once __DIR__.'/../model/Notice.php';

if (isset($_SESSION['id'])) {
    $notice=new Notice();
    $noticeAvailable=$notice->displayNotice(Dbconnector::getConnection());
} else {
    header("Location: /KuppiMate/src/view/login.php");
    exit();
}
