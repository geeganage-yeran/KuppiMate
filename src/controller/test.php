<?php

include_once __DIR__ . '/../model/User.php';
include_once __DIR__ . '/../model/Dbconnector.php';

$user=new User();
    $email = $_POST['email'];
    if($user->verifyUser(Dbconnector::getConnection(),$email)){
        echo "email not exist";
    }else{
        echo "email exist";
    }

?>