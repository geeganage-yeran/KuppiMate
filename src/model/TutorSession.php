<?php
class TutorSession
{
    private $tutorSessionId;
    private $title;
    private $description;
    private $courseFee;
    private $timePeriod;
    private $course_content;
    private $about_tutor;

    public function setTutorSessionId($tutorSessionId)
    {
        $this->tutorSessionId = $tutorSessionId;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setCourseFee($courseFee)
    {
        $this->courseFee = $courseFee;
    }

    public function setTimePeriod($timePeriod)
    {
        $this->timePeriod = $timePeriod;
    }
    public function setCourseContent($course_content)
    {
        $this->course_content = $course_content;
    }

    public function setAboutTutor($about_tutor)
    {
        $this->about_tutor = $about_tutor;
    }

    public function createTutorSession($con)
    {
        try {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $created_by = $_SESSION['id'];
            $query = "INSERT INTO tutorsession(title,`description`,tutor_fee,time_period,created_by,course_content,	about_tutor) VALUES(?,?,?,?,?,?,?)";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $this->title);
            $stmt->bindParam(2, $this->description);
            $stmt->bindParam(3, $this->courseFee);
            $stmt->bindParam(4, $this->timePeriod);
            $stmt->bindParam(5, $created_by);
            $stmt->bindParam(6, $this->course_content);
            $stmt->bindParam(7, $this->about_tutor);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function approveTutorSession($con)
    {
        try {
            $query = "SELECT t.*, f.* FROM tutorsession t
            JOIN feedback f ON t.id = f.id AND f.related_table = 'tutorsession'
            WHERE t.status = 'approved'";
            $stmt = $con->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getApprovedTutorSessionId($con)
    {
        try {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $created_by = $_SESSION['id'];
            $query = "SELECT t.*,m.id as materialId,
                    GROUP_CONCAT(DISTINCT m.file_name ORDER BY m.id SEPARATOR ', ') AS file_names,
                    GROUP_CONCAT(DISTINCT f.comment ORDER BY f.id SEPARATOR ', ') AS comment_list,
                    GROUP_CONCAT(DISTINCT f.created_date ORDER BY f.id SEPARATOR ', ') AS date_list,
                    GROUP_CONCAT(DISTINCT us.first_name ORDER BY us.id SEPARATOR ', ') AS comment_information,
                    GROUP_CONCAT(DISTINCT f.rating ORDER BY f.id SEPARATOR ', ') AS rating_list
                    FROM tutorsession t
                    LEFT JOIN material m ON m.tutor_session_id = t.id
                    LEFT JOIN feedback f ON f.session_id=t.id AND f.related_table='tutorsession'
                    LEFT JOIN users us ON us.id=f.created_by
                    WHERE t.created_by = ? AND t.status = 'approved'
                    GROUP BY t.id;";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $created_by);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function getPendingTutorSession($con)
    {
        try {
            $query = "SELECT t.*, u.first_name,u.id AS users_id
                    FROM tutorsession t
                    LEFT JOIN users u ON t.created_by = u.id
                    LEFT JOIN kuppisession k ON t.created_by = k.created_by
                    WHERE t.status = 'pending'
                    GROUP BY t.id, u.first_name";
            $stmt = $con->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getPendingTutorSessionById($con)
    {
        try {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $created_by = $_SESSION['id'];
            $query = "SELECT * FROM tutorsession WHERE created_by=? AND (`status`='pending' OR `status`='rejected')";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $created_by);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function updateTutorSessionStatus($con, $sesson_link)
    {
        try {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $created_by = $_SESSION['id'];
            $query = "UPDATE tutorsession SET `status`='approved',updated_by=?,session_link=? WHERE id=?";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $created_by);
            $stmt->bindParam(2, $sesson_link);
            $stmt->bindParam(3, $this->tutorSessionId);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function rejectTutorSession($con)
    {
        try {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $created_by = $_SESSION['id'];
            $query = "UPDATE tutorsession SET `status`='rejected',updated_by=? WHERE id=?";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $created_by);
            $stmt->bindParam(2, $this->tutorSessionId);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function deleteTutorSession($con)
    {
        try {
            $queryPayment = "DELETE FROM payment WHERE tutor_session_id=?";
            $stmtPayment = $con->prepare($queryPayment);
            $stmtPayment->bindParam(1, $this->tutorSessionId);
            $stmtPayment->execute();

            $queryPayment = "DELETE FROM feedback WHERE `session_id`=? AND related_table='tutorsession'";
            $stmtPayment = $con->prepare($queryPayment);
            $stmtPayment->bindParam(1, $this->tutorSessionId);
            $stmtPayment->execute();

            $querySubscription = "DELETE FROM subscription WHERE tutor_session_id=?";
            $stmtSubscription = $con->prepare($querySubscription);
            $stmtSubscription->bindParam(1, $this->tutorSessionId);
            $stmtSubscription->execute();

            $query1 = "SELECT file_path FROM material WHERE tutor_session_id=?";
            $stmt1 = $con->prepare($query1);
            $stmt1->bindParam(1, $this->tutorSessionId);
            $stmt1->execute();
            $filePaths = $stmt1->fetchAll(PDO::FETCH_COLUMN);

            if (!empty($filePaths)) {
                $query3 = "DELETE FROM material WHERE tutor_session_id=?";
                $stmt3 = $con->prepare($query3);
                $stmt3->bindParam(1, $this->tutorSessionId);
                $stmt3->execute();

                if ($stmt3->rowCount() > 0) {
                    foreach ($filePaths as $filePath) {
                        if (file_exists($filePath) && is_writable($filePath)) {
                            unlink($filePath);
                        }
                    }
                } else {
                    return false;
                }
            }

            $query2 = "DELETE FROM tutorsession WHERE id=?";
            $stmt2 = $con->prepare($query2);
            $stmt2->bindParam(1, $this->tutorSessionId);
            $stmt2->execute();

            if ($stmt2->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getApprovedTutorSessions($con)
    {
        try {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $created_by = $_SESSION['id'];
            $query = "SELECT t.*, u.first_name, u.last_name, AVG(f.rating) as average_feedback, COUNT(f.comment) as feedback_count FROM tutorsession t 
            LEFT JOIN users u ON t.created_by = u.id 
            LEFT JOIN feedback f ON t.id = f.session_id AND f.related_table = 'tutorsession' WHERE t.status = 'approved' AND t.created_by != ? GROUP BY t.id;";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $created_by);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getAllApprovedTutorSessions($con)
    {
        try {
            $query = "SELECT * FROM tutorsession WHERE `status`='approved'";
            $stmt = $con->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
