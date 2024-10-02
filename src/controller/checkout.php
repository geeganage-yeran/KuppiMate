<?php
session_start();
require __DIR__ . "/../../vendor/autoload.php";
include_once __DIR__ . '/../model/Payment.php';
include_once __DIR__ . '/../model/Subscription.php';
include_once __DIR__ . '/../model/Dbconnector.php';

if (!isset($_SESSION['id'])) {
    header("Location: /KuppiMate/src/view/login.php");
    exit();
}

if (isset($_POST['course_id'], $_POST['course_title'], $_POST['course_fee'])) {

    $course_id = $_POST['course_id'];
    $course_title = $_POST['course_title'];
    $course_fee = $_POST['course_fee'];
    $course_fee_cents = (int)$course_fee * 100;


    $stripe_secret_key = "sk_test_51PjbUdI9tSLzP3FJHxCZT8XUKTOD1igyHYeLhv3c0qpTRC5ekIHgCkWMkzXvdTytk4p6A5zxq9fnO7xzXoZmnw1G00YrAWN6BS";

    \Stripe\Stripe::setApiKey($stripe_secret_key);

    $checkout_session = \Stripe\Checkout\Session::create([
        "mode" => "payment",
        "success_url" => "http://localhost/KuppiMate/src/view/ug-dashboard.php?s=101",
        "locale" => "auto",
        "line_items" => [
            [
                "quantity" => 1,
                "price_data" => [
                    "currency" => "lkr",
                    "unit_amount" => $course_fee_cents,
                    "product_data" => [
                        "name" => $course_title
                    ]
                ]
            ],
        ]
    ]);
    if ($checkout_session) {
        $payment = new Payment();
        $payment->setPaymentId($course_id);
        $payment->setAmount($course_fee);
        if ($payment->savePaymentDetails(Dbconnector::getConnection())) {
            $subscription = new Subscription();
            $subscription->setTutorSessionId($course_id);
            if ($subscription->subscribeToSession(Dbconnector::getConnection())) {
                http_response_code(303);
                header("Location: " . $checkout_session->url);
                exit();
            } else {
                echo 'error occurred';
            }
        } else {
            echo 'error occurred';
        }
    }
}
