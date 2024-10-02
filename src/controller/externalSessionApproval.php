<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once __DIR__ . '/../model/Dbconnector.php';
include_once __DIR__ . '/../model/TutorSession.php';
include_once __DIR__ . '/../model/Feedback.php';

$tutorPending = new TutorSession();
$pendingSessions = $tutorPending->getPendingTutorSession(Dbconnector::getConnection());


if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST['session_id'])) {
        $tutorPending->setTutorSessionId($_POST['session_id']);
        if ($tutorPending->updateTutorSessionStatus(Dbconnector::getConnection())) {
            header("Location: /KuppiMate/src/view/admin-dashboard.php?id=101");
            exit();
        } else {
            header("Location: /KuppiMate/src/view/admin-dashboard.php?id=102");
            exit();
        }
    }

    if (isset($_POST['reject_session_id'])) {
        $tutorPending->setTutorSessionId($_POST['reject_session_id']);
        if ($tutorPending->rejectTutorSession(Dbconnector::getConnection())) {
            header("Location: /KuppiMate/src/view/admin-dashboard.php?id=103");
            exit();
        } else {
            header("Location: /KuppiMate/src/view/admin-dashboard.php?id=102");
            exit();
        }
    }

    if (isset($_POST['delete_session_id'])) {
        $tutorPending->setTutorSessionId($_POST['delete_session_id']);
        if ($tutorPending->deleteTutorSession(Dbconnector::getConnection())) {
            header("Location: /KuppiMate/src/view/ug-dashboard.php?id=103");
            exit();
        } else {
            header("Location: /KuppiMate/src/view/ug-dashboard.php?id=102");
            exit();
        }
    }
}
