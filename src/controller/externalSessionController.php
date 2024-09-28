<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once __DIR__ . '/../model/Dbconnector.php';
include_once __DIR__ . '/../model/TutorSession.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['cTitle']) && !empty(trim($_POST['cTitle']))) {
        $courseTitle = htmlspecialchars(trim(stripslashes($_POST['cTitle'])));
    } else {
        $errors[] = "Course Title is required.";
    }

    if (isset($_POST['cTime']) && !empty(trim($_POST['cTime']))) {
        $timePeriod = htmlspecialchars(trim(stripslashes($_POST['cTime'])));
    } else {
        $errors[] = "Time Period is required.";
    }

    if (isset($_POST['description']) && !empty(trim($_POST['description']))) {
        $description = htmlspecialchars(trim(stripslashes($_POST['description'])));
    } else {
        $errors[] = "Course Description is required.";
    }

    if (isset($_POST['cFee']) && !empty(trim($_POST['cFee']))) {
        $courseFee = htmlspecialchars(trim(stripslashes($_POST['cFee'])));
        if (!is_numeric($courseFee)) {
            $errors[] = "Course Fee must be a valid number.";
        }
    }

    if (isset($_POST['descriptionC']) && !empty(trim($_POST['descriptionC']))) {
        $courseContent = htmlspecialchars(trim(stripslashes($_POST['descriptionC'])));
    } else {
        $errors[] = "Course Content is required.";
    }

    if (isset($_POST['descriptionA']) && !empty(trim($_POST['descriptionA']))) {
        $aboutYou = htmlspecialchars(trim(stripslashes($_POST['descriptionA'])));
    } else {
        $errors[] = "Personal Description is required.";
    }

    if (!empty($errors)) {
        $_SESSION['form_errors'] = $errors;
        header("Location: /KuppiMate/src/view/ug-dashboard.php");
        exit();
    } else {
        $tutorSession = new TutorSession();
        $tutorSession->setTitle($courseTitle);
        $tutorSession->setTimePeriod($timePeriod);
        $tutorSession->setDescription($description);
        $tutorSession->setCourseFee($courseFee);
        $tutorSession->setCourseContent($courseContent);
        $tutorSession->setAboutTutor($aboutYou);
        if ($tutorSession->createTutorSession(Dbconnector::getConnection())) {
            header("Location: /KuppiMate/src/view/ug-dashboard.php");
            exit();
        } else {
            echo 'Error with database';
        }
    }
}
