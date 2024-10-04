<?php 
include_once __DIR__ . '/../model/Category.php';
include_once __DIR__ . '/../model/Material.php';
include_once __DIR__ . '/../model/KuppiSession.php';
include_once __DIR__ . '/../model/Dbconnector.php';
include_once __DIR__ . '/../controller/createKuppi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_FILES['kuppiMaterials'],$_POST['sessionId'])){
        $sessionId=$_POST['sessionId'];
        $file=$_FILES['kuppiMaterials'];
        $fileName=$file['name'];
        $fileTmpName=$file['tmp_name'];
        $fileSize=$file['size'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $newName=$sessionId . '.' . $fileExtension;
        $file_location = __DIR__ . '/material-uploads/';
        $file_upload=$file_location.$newName;

        if(move_uploaded_file($fileTmpName,$file_upload)){
            $material=new Material($newName,$fileSize,$file_upload);
            if($material->uploadMaterial(Dbconnector::getConnection(),$sessionId,$_SESSION['id'])){
                header('Location: /KuppiMate/src/view/ug-dashboard.php?id=7');
                exit();
            }
        }
    }
}

