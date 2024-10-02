<?php
class Subscription {
    private $tutor_session_id;
    public function setTutorSessionId($course_id) {
        $this->tutor_session_id = $course_id;
    }
    public function subscribeToSession($con) {
        try {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $created_by = $_SESSION['id'];
            $query = "INSERT INTO subscription(`user_id`,tutor_session_id,created_by) VALUES (?,?,?)";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $created_by);
            $stmt->bindParam(2, $this->tutor_session_id);
            $stmt->bindParam(3, $created_by);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getSubscriptionWithId($con) {
        try {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $created_by = $_SESSION['id'];
            $query = "SELECT tutor_session_id FROM subscription WHERE user_id = ?";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $created_by);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_COLUMN);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function listSubscription() {
        
    }

}
