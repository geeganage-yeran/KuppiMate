<?php
class Attendance
{
    private $attendanceId;
    private $sessionId;
    private $relatedTable;
    private $attendedDate;
    private $status;

    public function getAttendance($con)
    {
        try {
            $query = "SELECT `user_id`,`session_id` FROM attendance ";
            $stmt = $con->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function setAttendance($con, $related_table, $status, $uId, $sId)
    {
        try {
            $query = "INSERT INTO attendance(`user_id`,`session_id`,related_table,`status`,created_by) VALUES (?,?,?,?,?)";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $uId);
            $stmt->bindParam(2, $sId);
            $stmt->bindParam(3, $related_table);
            $stmt->bindParam(4, $status);
            $stmt->bindParam(5, $uId);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function listAttendance($con, $user_id)
    {
        try {
            $query = "SELECT a.*, k.title,k.recorded,k.driveLink,DATE(a.attended_date) AS attendedDate 
                    FROM attendance a 
                    JOIN kuppisession k ON k.id = a.session_id 
                    WHERE a.user_id = ? AND a.status = 'attended';";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $user_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getAttendnaceDetails($con)
    {
        try {
                $query = "SELECT a.*,u.first_name,u.last_name,u.role,k.title FROM attendance a 
                JOIN users u ON u.id=a.user_id 
                JOIN kuppisession k ON k.id=a.session_id
                WHERE a.user_id=u.id";
                $stmt = $con->prepare($query);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
