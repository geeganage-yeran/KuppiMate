<?php 
include_once __DIR__ . '/../model/Dbconnector.php';
include_once __DIR__ . '/../model/Payment.php';

$payment=new Payment();
$paymentList=$payment->listPayment(Dbconnector::getConnection());