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

    public function getAllSubscriptionWithId($con) {
        try {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $created_by = $_SESSION['id'];
            $query = "SELECT s.*,ts.*,us.first_name,us.last_name,us.contact,us.email, 
                    uni.name AS university_name,
                    GROUP_CONCAT(m.file_name ORDER BY m.id SEPARATOR ',') AS file_names 
                    FROM subscription s
                    JOIN tutorsession ts ON ts.id = s.tutor_session_id
                    JOIN users us ON us.id = ts.created_by
                    JOIN university uni ON uni.id = us.university_id
                    LEFT JOIN material m ON m.tutor_session_id = ts.id
                    WHERE s.user_id = ?
                    GROUP BY s.id, ts.id;";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $created_by);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function listSubscription($con) {
        try {
            $query = "SELECT u.first_name, u.last_name, COUNT(s.tutor_session_id) AS subscription_count
            FROM subscription s
            JOIN tutorsession ts ON ts.id = s.tutor_session_id
            JOIN users u ON u.id = ts.created_by
            GROUP BY u.id, u.first_name, u.last_name;";
            $stmt = $con->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

}
