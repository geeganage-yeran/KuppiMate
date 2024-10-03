<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once __DIR__ . '/../model/Feedback.php';
include_once __DIR__ . '/../model/Dbconnector.php';

$feedback = new Feedback();
$listFeedbacks = $feedback->listAllFeedback(Dbconnector::getConnection());
$feedbackCount=$feedback->averageFeedbackAll(Dbconnector::getConnection());

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['deleteFeedId'])) {
        if ($feedback->deleteFeedback(Dbconnector::getConnection(), $_POST['deleteFeedId'])) {
            header("Location: /KuppiMate/src/view/admin-dashboard.php?f=0");
            exit();
        } else {
            header("Location: /KuppiMate/src/view/admin-dashboard.php?f=1");
            exit();
        }
    } else {
        header("Location: /KuppiMate/src/view/admin-dashboard.php?f=2");
        exit();
    }
}
