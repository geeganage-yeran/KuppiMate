<?php
class University{
    private $name;
    private $id;

    public function getUniversities($con){
        try {
            $query = "SELECT * FROM university";
            $stmt = $con->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
}