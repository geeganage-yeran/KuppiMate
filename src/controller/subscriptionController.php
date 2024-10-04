<?php 

include_once __DIR__ . '/../model/Dbconnector.php';
include_once __DIR__ . '/../model/Subscription.php';

$subscription=new Subscription();
$alreadyEnrolledCourses=$subscription->getSubscriptionWithId(Dbconnector::getConnection());

$subList=$subscription->listSubscription(Dbconnector::getConnection());

$paidCourses=$subscription->getAllSubscriptionWithId(Dbconnector::getConnection());