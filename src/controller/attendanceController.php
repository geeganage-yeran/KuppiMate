<?php
include_once __DIR__ . '/../model/Notice.php';
include_once __DIR__ . '/../model/Attendance.php';
include_once __DIR__ . '/../model/Dbconnector.php';

$attendance=new Attendance();

$isEnrolled=$attendance->getAttendance(Dbconnector::getConnection());
$enrolledList=$attendance->listAttendance(Dbconnector::getConnection(),$_SESSION['id']);
$attendanceKuppi=$attendance->getAttendnaceDetails(Dbconnector::getConnection());

if($_SERVER["REQUEST_METHOD"]=='POST'){
    if(isset($_POST['sId'],$_POST['uId'])){
        $sId = $_POST['sId'];
        $uId = $_POST['uId'];

        if($attendance->setAttendance(Dbconnector::getConnection(),'kuppisession','attended',$uId,$sId)){
           header("Location: /KuppiMate/src/view/ug-dashboard.php?at=1");
           exit();
        }else{
           header("Location: /KuppiMate/src/view/ug-dashboard.php?at=2");
           exit();
        }

    }
}