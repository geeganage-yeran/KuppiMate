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

    public function getApprovedTutorSessionId($con) {
        try {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $created_by = $_SESSION['id'];
            $query = "SELECT * FROM tutorsession WHERE created_by=? AND `status`='approved'";
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


    public function updateTutorSessionStatus($con)
    {
        try {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $created_by = $_SESSION['id'];
            $query = "UPDATE tutorsession SET `status`='approved',updated_by=? WHERE id=?";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $created_by);
            $stmt->bindParam(2, $this->tutorSessionId);
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
            $query = "DELETE FROM tutorsession WHERE id=?";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $this->tutorSessionId);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getApprovedTutorSessions($con) {
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
}
