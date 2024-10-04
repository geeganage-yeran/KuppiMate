<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once __DIR__ . '/../model/Dbconnector.php';
include_once __DIR__ . '/../model/Payment.php';
include_once __DIR__ . '/../model/Subscription.php';
include_once __DIR__ . '/../controller/checkout.php';

$payment = new Payment();
$paymentList = $payment->listPayment(Dbconnector::getConnection());

$role = $_SESSION['role'];

if (isset($_GET['pay'])) {
    if ($_GET['pay'] == '101') {
        $course_id = $_GET['course_id'];
        $course_fee = $_GET['course_fee'];
        $payment = new Payment();
        $payment->setPaymentId($course_id);
        $payment->setAmount($course_fee);
        if ($payment->savePaymentDetails(Dbconnector::getConnection())) {
            $subscription = new Subscription();
            $subscription->setTutorSessionId($course_id);
            if ($subscription->subscribeToSession(Dbconnector::getConnection())) {
                if ($role == 'undergraduate') {
                    header("Location: /KuppiMate/src/view/ug-dashboard.php?s=101");
                    exit();
                } elseif ($role == 'external_learner') {
                    header("Location: /KuppiMate/src/view/ex-dashboard.php?s=101");
                    exit();
                }
            } else {
                if ($role == 'undergraduate') {
                    header("Location: /KuppiMate/src/view/ug-dashboard.php?s=102");
                    exit();
                } elseif ($role == 'external_learner') {
                    header("Location: /KuppiMate/src/view/ex-dashboard.php?s=102");
                    exit();
                }
            }
        } else {
            if ($role == 'undergraduate') {
                header("Location: /KuppiMate/src/view/ug-dashboard.php?s=102");
                exit();
            } elseif ($role == 'external_learner') {
                header("Location: /KuppiMate/src/view/ex-dashboard.php?s=102");
                exit();
            }
        }
    } elseif ($_GET['pay'] == '102') {
        if ($role == 'undergraduate') {
            header("Location: /KuppiMate/src/view/ug-dashboard.php?s=102");
            exit();
        } elseif ($role == 'external_learner') {
            header("Location: /KuppiMate/src/view/ex-dashboard.php?s=102");
            exit();
        }
    }
}
