<?php
class Feedback{
    private $session_id;

    public function setSessionId($session_id){
        $this->session_id = $session_id;
    }
    public function submitFeedback($con,$relatedTable,$comment,$rating){
        try {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $created_by = $_SESSION['id'];

            $query="INSERT INTO feedback(`session_id`,related_table,comment,rating,created_by) VALUES (?,?,?,?,?)";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1,$this->session_id);
            $stmt->bindParam(2,$relatedTable);
            $stmt->bindParam(3,$comment);
            $stmt->bindParam(4,$rating);
            $stmt->bindParam(5,$created_by);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }

    }

    public function getFeedback($con){
        try {
            $query="SELECT * FROM feedback WHERE created_by=?";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1,$_SESSION['id']);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

}