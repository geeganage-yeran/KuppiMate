<?php
class Notice
{
    private $noticeId;
    private $title;
    private $description;
    private $broadcasted;

    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function createNotice($con, $categoryId, $userId, $lastID)
    {
        try {
            $query = "INSERT INTO notice (`category_id`,`title`,`description`,`session_id`,`created_by`) VALUES (?,?,?,?,?)";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $categoryId);
            $stmt->bindParam(2, $this->title);
            $stmt->bindParam(3, $this->description);
            $stmt->bindParam(4, $lastID);
            $stmt->bindParam(5, $userId);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function listNotices($con)
    {
        try {
            $query = "SELECT DISTINCT u.first_name, uni.name, c.category_name, n.*, DATE(n.created_date) AS created_date 
            FROM notice n 
            JOIN category c ON c.id = n.category_id 
            JOIN users u ON u.id = n.created_by 
            JOIN kuppisession ks ON ks.category_id = n.category_id 
            LEFT JOIN university uni ON uni.id = u.university_id 
            WHERE (n.broadcasted = 0 OR n.broadcasted = 1) AND ks.status = 'approved'";
            $stmt = $con->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function filterNotices($con, $condition, $catId, $date,$uniId)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $session_created_by = $_SESSION['id'];
        if ($condition == 'filterByCategory') {
            try {
                $query = "SELECT m.file_name,k.session_link,DATE(k.session_start_date_time) AS startDate,TIME(k.session_start_date_time) AS startTime,uni.name,u.id AS users_id,k.id AS sessions_id,c.category_name,n.* 
                FROM notice n 
                JOIN category c ON c.id=n.category_id 
                JOIN users u ON u.id=n.created_by 
                JOIN kuppisession k ON k.id=n.session_id
                LEFT JOIN material m ON m.kuppi_session_id=n.session_id
                LEFT JOIN university uni ON uni.id = u.university_id
                WHERE n.broadcasted=1 AND n.category_id=? AND k.created_by <> ?";
                $stmt = $con->prepare($query);
                $stmt->bindParam(1, $catId);
                $stmt->bindParam(2, $session_created_by);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } elseif ($condition == 'filterByDate') {
            try {
                $query = "SELECT m.file_name,k.session_link,DATE(k.session_start_date_time) AS startDate,TIME(k.session_start_date_time) AS startTime,uni.name,u.id AS users_id,k.id AS sessions_id,c.category_name,n.* 
                FROM notice n 
                JOIN category c ON c.id=n.category_id 
                JOIN users u ON u.id=n.created_by 
                JOIN kuppisession k ON k.id=n.session_id
                LEFT JOIN material m ON m.kuppi_session_id=n.session_id
                LEFT JOIN university uni ON uni.id = u.university_id
                WHERE n.broadcasted=1 AND DATE(k.session_start_date_time)=? AND k.created_by <> ?";
                $stmt = $con->prepare($query);
                $stmt->bindParam(1, $date);
                $stmt->bindParam(2, $session_created_by);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }elseif ($condition == 'filterByUni') {
            try {
                $query = "SELECT m.file_name,k.session_link,DATE(k.session_start_date_time) AS startDate,TIME(k.session_start_date_time) AS startTime,uni.name,c.category_name,u.id AS users_id,k.id AS sessions_id,n.* 
                FROM notice n 
                JOIN category c ON c.id=n.category_id 
                JOIN users u ON u.id=n.created_by 
                JOIN kuppisession k ON k.id=n.session_id
                LEFT JOIN material m ON m.kuppi_session_id=n.session_id
                LEFT JOIN university uni ON uni.id = u.university_id
                WHERE n.broadcasted=1 AND u.university_id=? AND k.created_by <> ?";
                $stmt = $con->prepare($query);
                $stmt->bindParam(1, $uniId);
                $stmt->bindParam(2, $session_created_by);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

    public function deleteNotice($con, $noticeId)
    {
        try {
            $query = "DELETE FROM notice WHERE id=?";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $noticeId);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function setNotice($con)
    {
        try {
            $query = "SELECT u.first_name,uni.name,c.category_name,n.*,DATE(n.created_date) AS created_date 
            FROM notice n 
            JOIN category c ON c.id=n.category_id 
            JOIN users u ON u.id=n.created_by  
            LEFT JOIN university uni ON uni.id = u.university_id 
            WHERE n.broadcasted=1";
            $stmt = $con->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function broadcastNotice($con, $noticeId)
    {
        try {
            $query = "UPDATE notice SET broadcasted=1 WHERE id=?";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $noticeId);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function displayNotice($con)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $session_created_by = $_SESSION['id'];
        try {
            $query = "SELECT m.file_name,k.session_link,DATE(k.session_start_date_time) AS startDate,TIME(k.session_start_date_time) AS startTime,u.university_id,u.id AS users_id,k.id AS sessions_id,uni.name,c.category_name,n.* 
            FROM notice n 
            JOIN category c ON c.id = n.category_id 
            JOIN users u ON u.id = n.created_by 
            JOIN kuppisession k ON k.id = n.session_id 
            LEFT JOIN material m ON m.kuppi_session_id = n.session_id 
            LEFT JOIN university uni ON uni.id = u.university_id 
            WHERE n.broadcasted = 1 AND k.created_by <> ? ;";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $session_created_by);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
