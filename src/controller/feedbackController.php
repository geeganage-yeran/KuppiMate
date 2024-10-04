<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once __DIR__ . '/../model/Feedback.php';
include_once __DIR__ . '/../model/Dbconnector.php';

$feedback = new Feedback();
$feedbackList = $feedback->getFeedback(Dbconnector::getConnection());

$created_by=$_SESSION['id'];

$averageRating = $feedback->averageFeedback(Dbconnector::getConnection(),$created_by );
if (!empty($averageRating)) {
    $sessionCount = count($averageRating);
    $totalRating = 0;
    foreach ($averageRating as $avgRating) {
        $totalRating += $avgRating['average_rating'];
    }
    $averageRatingCount = $totalRating / $sessionCount;
}else{
    $averageRatingCount = 0;
}
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
