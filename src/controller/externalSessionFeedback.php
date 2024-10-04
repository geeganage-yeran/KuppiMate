<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once __DIR__ . '/../model/Feedback.php';
include_once __DIR__ . '/../model/Dbconnector.php';

$newFeedback = new Feedback();
$reviewdIdList = $newFeedback->getFeedbackWithId(Dbconnector::getConnection());

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (in_array($_POST['tutorSessionId'], $reviewdIdList)) {
        if ($_SESSION['role'] == 'undergraduate') {
            header("Location: /KuppiMate/src/view/ug-dashboard.php?c=102");
            exit();
        } elseif ($_SESSION['role'] == 'external_learner') {
            header("Location: /KuppiMate/src/view/ex-dashboard.php?c=102");
            exit();
        }
    } else {
        if (isset($_POST['description']) && !empty(trim($_POST['description']))) {
            $description = trim($_POST['description']);
        } else {
            $errors[] = "Description is required.";
        }

        if (isset($_POST['tutorSessionId']) && !empty(trim($_POST['tutorSessionId']))) {
            $tutorSessionId = trim($_POST['tutorSessionId']);
        }

        if (isset($_POST['ratingLevel']) && is_numeric($_POST['ratingLevel'])) {
            $ratingLevel = (int)$_POST['ratingLevel'];
            if ($ratingLevel < 1 || $ratingLevel > 5) {
                $errors[] = "Rating level must be between 1 and 5.";
            }
        } else {
            $errors[] = "Rating level is required and must be a number.";
        }

        if (!empty($errors)) {
            $_SESSION['review_errors'] = $errors;
            if ($_SESSION['role'] == 'undergraduate') {
                header("Location: /KuppiMate/src/view/ug-dashboard.php");
                exit();
            } elseif ($_SESSION['role'] == 'external_learner') {
                header("Location: /KuppiMate/src/view/ex-dashboard.php");
                exit();
            }
        } else {
            $feedback = new Feedback();
            $feedback->setSessionId($tutorSessionId);
            if ($feedbackTutorSession = $feedback->submitFeedbackExternal(Dbconnector::getConnection(), 'tutorsession', $description, $ratingLevel)) {
                if ($_SESSION['role'] == 'undergraduate') {
                    header("Location: /KuppiMate/src/view/ug-dashboard.php?c=101");
                    exit();
                } elseif ($_SESSION['role'] == 'external_learner') {
                    header("Location: /KuppiMate/src/view/ex-dashboard.php?c=101");
                    exit();
                }
            } else {
                if ($_SESSION['role'] == 'undergraduate') {
                    header("Location: /KuppiMate/src/view/ug-dashboard.php?c=102");
                    exit();
                } elseif ($_SESSION['role'] == 'external_learner') {
                    header("Location: /KuppiMate/src/view/ex-dashboard.php?c=102");
                    exit();
                }
            }
        }
    }
}
