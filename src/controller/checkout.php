<?php
session_start();
require __DIR__ . "/../../vendor/autoload.php";

if (!isset($_SESSION['id'])) {
    header("Location: /KuppiMate/src/view/login.php");
    exit();
}
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
                "unit_amount" => 600000,
                "product_data" => [
                    "name" => "Course Title"
                ]
            ]
        ],      
    ]
]);

http_response_code(303);
header("Location: " . $checkout_session->url);