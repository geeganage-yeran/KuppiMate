<?php

include_once __DIR__ . '/../model/User.php';
include_once __DIR__ . '/../model/Dbconnector.php';



if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $email=null;
    $fname=null;
    $lname=null;
    $contact=null;

    if(isset($_POST['fname']) && !empty($_POST['fname'])){
        if (preg_match("/^[a-zA-Z]+$/", $_POST['fname'])){
            $fname = $_POST['fname'];
        }else{
            header("Location: /KuppiMate/src/view/ug-dashboard.php?id=101");
            exit();
        }
    }
    if(isset($_POST['lname']) && !empty($_POST['lname'])){
        if (preg_match("/^[a-zA-Z]+$/", $_POST['lname'])){
            $lname = $_POST['lname'];
        }else{
            header("Location: /KuppiMate/src/view/ug-dashboard.php?id=101");
            exit();
        }
    }
    if(isset($_POST['email']) && !empty($_POST['email'])){
        if (preg_match("/^[a-zA-Z]+@[a-zA-Z0-9]+\.[a-zA-Z]+$/", $_POST['email'])){
            $email = $_POST['email'];
        }else{
            header("Location: /KuppiMate/src/view/ug-dashboard.php?id=102");
            exit();
        }
    }
    if(isset($_POST['contact']) && !empty($_POST['contact'])){
        if (preg_match("/^\d{10}$/", $_POST['contact'])){
            $contact = $_POST['contact'];
        }else{
            header("Location: /KuppiMate/src/view/ug-dashboard.php?id=103");
            exit();
        }
    }

    $user=new User();

    $user_id=$_SESSION['id'];
    $user->setfirstName($fname);
    $user->setlastName($lname);
    if($user->verifyUser(Dbconnector::getConnection(),$email)){
        $user->setEmail($email);
    }else{
        header("Location: /KuppiMate/src/view/ug-dashboard.php?id=106");
        exit();
    }
    $user->setContact($contact);
    $user->setUserId($user_id);

    if($user->updateProfile(Dbconnector::getConnection(),"user-details","null")){
        header("Location: /KuppiMate/src/view/ug-dashboard.php?id=104");
        exit();
    }else{
        header("Location: /KuppiMate/src/view/ug-dashboard.php?id=105");
        exit();
    }

}
