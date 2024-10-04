<?php
class Feedback
{
    private $session_id;

    public function setSessionId($session_id)
    {
        $this->session_id = $session_id;
    }
    public function submitFeedback($con, $relatedTable, $comment, $rating)
    {
        try {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $created_by = $_SESSION['id'];

            $query = "INSERT INTO feedback(`session_id`,related_table,comment,rating,created_by) VALUES (?,?,?,?,?)";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $this->session_id);
            $stmt->bindParam(2, $relatedTable);
            $stmt->bindParam(3, $comment);
            $stmt->bindParam(4, $rating);
            $stmt->bindParam(5, $created_by);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function submitFeedbackExternal($con, $relatedTable, $comment, $rating)
    {
        try {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $created_by = $_SESSION['id'];

            $query = "INSERT INTO feedback(`session_id`,related_table,comment,rating,created_by) VALUES (?,?,?,?,?)";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $this->session_id);
            $stmt->bindParam(2, $relatedTable);
            $stmt->bindParam(3, $comment);
            $stmt->bindParam(4, $rating);
            $stmt->bindParam(5, $created_by);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getFeedback($con)
    {
        try {
            $query = "SELECT * FROM feedback WHERE created_by=?";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $_SESSION['id']);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function deleteFeedback($con,$feedId)
    {
        try {
            $query = "DELETE FROM feedback WHERE id=?";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $feedId);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function listAllFeedback($con)
    {
        try {
            $query = "SELECT f.*, u.first_name AS sessionCreatorFirstName, u.last_name AS sessionCreatorLastName, us.first_name AS feedbackByFirstName, us.last_name AS feedbackByLastName
            FROM feedback f
            LEFT JOIN kuppisession k ON k.id = f.session_id AND f.related_table = 'kuppisession'
            LEFT JOIN tutorsession t ON t.id = f.session_id AND f.related_table = 'tutorsession'
            LEFT JOIN users u ON u.id = k.created_by OR u.id = t.created_by
            LEFT JOIN users us ON us.id = f.created_by";
            $stmt = $con->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function averageFeedback($con, $created_by)
    {
        try {
            $query = "SELECT AVG(f.rating) AS average_rating
            FROM kuppisession ks
            LEFT JOIN feedback f ON ks.id = f.session_id
            WHERE ks.created_by = ? AND f.related_table='kuppisession'
            GROUP BY ks.id, ks.created_by;";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $created_by);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function averageFeedbackAll($con)
    {
        try {
            $query = "SELECT 
            AVG(f.rating) AS average_rating,
            COUNT(CASE WHEN f.related_table = 'kuppisession' THEN f.rating END) AS kuppicount,
            COUNT(CASE WHEN f.related_table = 'tutorsession' THEN f.rating END) AS tutorsession_count,
            u.first_name,u.last_name,u.email
            FROM feedback f
            LEFT JOIN kuppisession ks ON ks.id = f.session_id AND f.related_table = 'kuppisession'
            LEFT JOIN tutorsession ts ON ts.id = f.session_id AND f.related_table = 'tutorsession'
            LEFT JOIN users u ON u.id = ks.created_by OR u.id = ts.created_by
            GROUP BY u.id, u.first_name, u.last_name;";
            $stmt = $con->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getFeedbackWithId($con) {
        try {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $created_by = $_SESSION['id'];
            $query = "SELECT session_id FROM feedback WHERE created_by = ? AND related_table=?";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $created_by);
            $stmt->bindValue(2, 'tutorsession');
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_COLUMN);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
