<?php
session_start();

include_once __DIR__ . '/../model/Category.php';
include_once __DIR__ . '/../model/Dbconnector.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['catName']) && !empty($_POST['catName'])){
        if(!preg_match("/^[A-Za-z_ ]*$/",$_POST['catName'])){
            header("Location: /KuppiMate/src/view/admin-dashboard.php?id=120");
            exit();
        }else{
            $catName=$_POST['catName'];
            $category=new Category();
            $category->setcategoryname($catName);
            if($category->createCategory(Dbconnector::getConnection(),$_SESSION['id'])){
                header("Location: /KuppiMate/src/view/admin-dashboard.php?id=121");
                exit();
            }else{
                header("Location: /KuppiMate/src/view/admin-dashboard.php?id=122");
                exit();
            }
            
        }
    }
}
