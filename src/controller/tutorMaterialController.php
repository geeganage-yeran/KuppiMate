<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once __DIR__ . '/../model/Dbconnector.php';
include_once __DIR__ . '/../model/Material.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['eXMaterials'], $_POST['tutorSessionId'])) {
        $tutorSessionId = $_POST['tutorSessionId'];
        $file = $_FILES['eXMaterials'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $randomNumber = rand(1000, 9999);
        $newName = $tutorSessionId . '_' . $randomNumber . '.' . $fileExtension;
        $file_location = __DIR__ . '/external_material_uploads/';
        $file_upload = $file_location . $newName;
        if ($fileExtension === 'zip' || $fileExtension === 'rar') {
            if (move_uploaded_file($fileTmpName, $file_upload)) {
                $material = new Material($newName, $fileSize, $file_upload);
                if ($material->uploadExMaterial(Dbconnector::getConnection(), $tutorSessionId, $_SESSION['id'])) {
                    header('Location: /KuppiMate/src/view/ug-dashboard.php?m=101');
                    exit();
                } else {
                    header('Location: /KuppiMate/src/view/ug-dashboard.php?m=102');
                    exit();
                }
            } else {
                header('Location: /KuppiMate/src/view/ug-dashboard.php?m=102');
                exit();
            }
        } else {
            header('Location: /KuppiMate/src/view/ug-dashboard.php?m=103');
            exit();
        }
    }

    if(isset($_POST['materialIdSet'])){
        $materialId=$_POST['materialIdSet'];
        $material=new Material(null,null,null);
        $material->setMaterialId($materialId);
        if($material->deleteExMaterial(Dbconnector::getConnection())){
            header('Location: /KuppiMate/src/view/ug-dashboard.php?m=104');
            exit();
        }else{
            header('Location: /KuppiMate/src/view/ug-dashboard.php?m=105');
            exit();
        }


    }


}
