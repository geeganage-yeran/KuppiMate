<?php
session_start();
include_once __DIR__ . '/../model/User.php';

$user=new User();
if($user->logout()){
    header("Location: /KuppiMate/src/view/login.php");
    exit();
}


