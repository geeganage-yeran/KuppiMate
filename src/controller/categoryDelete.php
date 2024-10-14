<?php
session_start();

include_once __DIR__ . '/../model/Category.php';
include_once __DIR__ . '/../model/Dbconnector.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['deleteCatId']) && !empty($_POST['deleteCatId'])){
        $category=new Category();
        if($category->deleteCategory(Dbconnector::getConnection(),$_POST['deleteCatId'])){
            header("Location: /KuppiMate/src/view/admin-dashboard.php?id=130");
            exit();
        }
    }
}

