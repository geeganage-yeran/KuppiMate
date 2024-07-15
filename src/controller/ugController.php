<?php

include_once __DIR__ . '/../model/User.php';
include_once __DIR__ . '/../model/Dbconnector.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['fName'], $_POST['lName'], $_POST['email'], $_POST['contact'], $_POST['password'], $_POST['university'], $_FILES['verficationDoc'])) {

        $firstName = trim($_POST['fName']);
        $lastName = trim($_POST['lName']);
        $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
        $contact = trim($_POST['contact']);
        $password = trim($_POST['password']);
        $university = trim($_POST['university']);

        $file = $_FILES['verficationDoc'];
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileType = $file['type'];
        $fileTmpName = $file['tmp_name'];
        $uniqueId = uniqid();
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = $uniqueId . '.' . $fileExtension;
        $file_location = __DIR__ . '/uploads/';
        $file_upload = $file_location . $newFileName;

        $ugUser = new User();

        if (($ugUser->verifyUser(Dbconnector::getConnection(), $email))) {
            if (move_uploaded_file($fileTmpName, $file_upload)) {
                $ugUser->setfirstName($firstName);
                $ugUser->setLastname($lastName);
                $ugUser->setEmail($email);
                $ugUser->setPassword($password);
                $ugUser->setContact($contact);
                $ugUser->setUniversity($university);
                $ugUser->setverificationFileName($newFileName);
                $ugUser->setverificationFilePath($file_upload);
                $ugUser->setverificationFileType($fileType);
                $ugUser->setverificationFileSize($fileSize);

                if ($ugUser->registerUser(Dbconnector::getConnection())) {
                    header("Location: /KuppiMate/src/view/login.php?s=1");
                    exit();
                } else {
                    header("Location: /KuppiMate/src/view/index.php?s=0");
                    exit();
                }
            } else {
                echo "Error occured when uploading file";
            }
        } else {
            header("Location: /KuppiMate/src/view/index.php?s=2");
            exit();
        }
    }
}
