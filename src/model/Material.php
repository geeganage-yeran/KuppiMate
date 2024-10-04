<?php
class Material {
    private $materialId;
    private $fileSize;
    private $fileName;
    private $fileType;
    private $filePath;

    public function __construct($fileName,$fileSize,$filePath){
        $this->fileName = $fileName;
        $this->fileSize = $fileSize;
        $this->filePath = $filePath;
    }

    public function setMaterialId($materialId){
        $this->materialId = $materialId;
    }

    public function uploadMaterial($con,$seesion_id,$user_id) {
        try {
            $query="INSERT INTO material(`kuppi_session_id`,`file_size`,`file_name`,`file_path`,`created_by`,`updated_by`) VALUES (?,?,?,?,?,?)";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1,$seesion_id);
            $stmt->bindParam(2,$this->fileSize);
            $stmt->bindParam(3,$this->fileName);
            $stmt->bindParam(4,$this->filePath);
            $stmt->bindParam(5,$user_id);
            $stmt->bindParam(6,$user_id);
            $stmt->execute();
            if($stmt->rowCount()>0){
                return true;
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        
    }

    public function uploadExMaterial($con,$tutor_seesion_id,$user_id) {
        try {
            $query="INSERT INTO material(`tutor_session_id`,`file_size`,`file_name`,`file_path`,`created_by`,`updated_by`) VALUES (?,?,?,?,?,?)";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1,$tutor_seesion_id);
            $stmt->bindParam(2,$this->fileSize);
            $stmt->bindParam(3,$this->fileName);
            $stmt->bindParam(4,$this->filePath);
            $stmt->bindParam(5,$user_id);
            $stmt->bindParam(6,$user_id);
            $stmt->execute();
            if($stmt->rowCount()>0){
                return true;
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        
    }

    public function deleteExMaterial($con){
        try {
            $query1 = "SELECT file_path FROM material WHERE  id=?";
            $stmt1 = $con->prepare($query1);
            $stmt1->bindParam(1, $this->materialId);
            $stmt1->execute();
            $filePath = $stmt1->fetchColumn();

            $query3 = "DELETE FROM material WHERE id=?";
            $stmt3 = $con->prepare($query3);
            $stmt3->bindParam(1, $this->materialId);
            $stmt3->execute();

            if ($stmt3->rowCount() > 0) {
                if (file_exists($filePath)) {
                    unlink($filePath);
                }else{
                    return false;
                }
                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function listExMaterialUploadedById($con) {
       
    }

}
