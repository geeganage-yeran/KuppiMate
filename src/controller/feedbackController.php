<?php
include_once __DIR__ . '/../model/Feedback.php';
include_once __DIR__ . '/../model/Dbconnector.php';

$feedback = new Feedback();
$feedbackList = $feedback->getFeedback(Dbconnector::getConnection());

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['ratingLevel'], $_POST['session_id'], $_POST['description'])) {
        if (!empty($_POST['ratingLevel']) && !empty($_POST['session_id']) && !empty($_POST['description'])) {
            $description = trim(htmlspecialchars($_POST['description']));
            $rating = $_POST['ratingLevel'];
            $session_id = $_POST['session_id'];
            $feedback->setSessionId($session_id);
            if ($feedback->submitFeedback(Dbconnector::getConnection(), 'kuppisession', $description, $rating)) {
                header("Location: /KuppiMate/src/view/ug-dashboard.php?feedback=1");
                exit();
            } else {
                header("Location: /KuppiMate/src/view/ug-dashboard.php?feedback=0");
                exit();
            }
        } else {
            header("Location: /KuppiMate/src/view/ug-dashboard.php?feedback=0");
            exit();
        }
    } else {
        header("Location: /KuppiMate/src/view/ug-dashboard.php?feedback=0");
        exit();
    }
}
