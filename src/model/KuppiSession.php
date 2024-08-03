<?php
class KuppiSession
{
    private $kuppiSessionId;
    private $title;
    private $description;
    private $session_start_date_time;
    private $session_end_date_time;
    private $status;
    private $recorded;
    private $driveLink;
    private $rescheduledDate;

    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function setkuppiSessionId($sessionId)
    {
        $this->kuppiSessionId = $sessionId;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function setStartDate($startDate)
    {
        $this->session_start_date_time = $startDate;
    }
    public function setEndDate($endDate)
    {
        $this->session_end_date_time = $endDate;
    }


    
    public function createSession($con, $categoryId, $userId)
    {
        try {
            $query = "INSERT INTO kuppisession (`category_id`,`title`,`description`,`session_start_date_time`,`session_end_date_time`,`created_by`) VALUES (?,?,?,?,?,? )";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $categoryId);
            $stmt->bindParam(2, $this->title);
            $stmt->bindParam(3, $this->description);
            $stmt->bindParam(4, $this->session_start_date_time);
            $stmt->bindParam(5, $this->session_end_date_time);
            $stmt->bindParam(6, $userId);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function approveSession($con)
    {
        try {
            $query = "UPDATE `kuppisession` SET status='approved' WHERE id=?";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $this->kuppiSessionId);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function categorizeSession()
    {
    }

    public function listSession($con, $condition)
    {
        try {
            if ($condition == "pending") {
                $query = "SELECT * FROM `kuppisession` WHERE status='pending'";
                $stmt = $con->prepare($query);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $output[] = $row;
                    }
                    return $output;
                }
            }
            if ($condition == "approved") {
                $query = "SELECT * FROM `kuppisession` WHERE status='approved'";
                $stmt = $con->prepare($query);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $output[] = $row;
                    }
                    return $output;
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function filterSession()
    {
    }

    public function getSession($con, $userId)
    {
        try {
            $query = "SELECT `id`,`session_link`,`title`, `description`, `session_start_date_time`, `session_end_date_time`, `status` FROM `kuppisession` WHERE `created_by`=?";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $userId);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $output[] = $row;
                }
                return $output;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function setSession($con, $session_link)
    {
        try {
            $query = "UPDATE `kuppisession` SET session_link=? WHERE id=?";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $session_link);
            $stmt->bindParam(2, $this->kuppiSessionId);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function deleteSession($con, $session_id)
    {
        try {

            $query1 = "SELECT file_path FROM material WHERE kuppi_session_id=?";
            $stmt1 = $con->prepare($query1);
            $stmt1->bindParam(1, $session_id);
            $stmt1->execute();
            $filePath = $stmt1->fetchColumn();

            $query3="DELETE FROM material WHERE kuppi_session_id=?";
            $stmt3 = $con->prepare($query3);
            $stmt3->bindParam(1, $session_id);
            $stmt3->execute();

            $query2 = "DELETE FROM kuppisession WHERE id=?";
            $stmt2 = $con->prepare($query2);
            $stmt2->bindParam(1, $session_id);
            $stmt2->execute();

            if ($stmt2->rowCount() > 0) {
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateSessionStatus()
    {
    }
}
