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

    public function listMaterial() {
        
    }

    public function downloadMaterial() {
        
    }

    public function deleteMaterial() {
    
    }

    public function setMaterial() {
       
    }
}

?>