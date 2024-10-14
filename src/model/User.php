<?php
session_start();
class User
{
    private $userId;
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $contact;
    private $universityId;
    private $role;
    private $accountStatus;
    private $verificationFileName;
    private $verificationFilePath;
    private $verificationFileType;
    private $verificationFileSize;
    private $isVerified;


    public function setuserId($userId)
    {
        $this->userId = $userId;
    }
    public function setfirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    public function setlastName($lastName)
    {
        $this->lastName = $lastName;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function setContact($contact)
    {
        $this->contact = $contact;
    }
    public function setUniversityId($universityId)
    {
        $this->universityId = $universityId;
    }
    public function setverificationFileName($verificationFileName)
    {
        $this->verificationFileName = $verificationFileName;
    }
    public function setverificationFilePath($verificationFilePath)
    {
        $this->verificationFilePath = $verificationFilePath;
    }

    public function setverificationFileType($verificationFileType)
    {
        $this->verificationFileType = $verificationFileType;
    }
    public function setverificationFileSize($verificationFileSize)
    {
        $this->verificationFileSize = $verificationFileSize;
    }
    public function getPassword($con)
    {
        try {
            $query = "SELECT password FROM users WHERE id = ?";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $this->userId);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? $result['password'] : null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function verifyUser($con, $email)
    {
        try {
            $query = "SELECT email FROM users WHERE email=?";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $email);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return false;
            } else {
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function registerUser($con)
    {
        if ($this->verificationFileName) {
            $this->role = "undergraduate";
            $this->accountStatus = "inactive";
            $this->isVerified = 0;
        } else {
            $this->role = "external_learner";
            $this->accountStatus = "active";
            $this->isVerified = 1;
        }
        try {
            $query = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `contact`, `university_id`, `role`,`account_status`, `verification_file_name`, `verification_file_path`, `verification_file_type`, `verification_file_size`,`is_verified`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,? ,?)";

            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $this->firstName);
            $stmt->bindParam(2, $this->lastName);
            $stmt->bindParam(3, $this->email);
            $stmt->bindParam(4, password_hash($this->password,PASSWORD_BCRYPT));
            $stmt->bindParam(5, $this->contact);
            $stmt->bindParam(6, $this->universityId);
            $stmt->bindParam(7, $this->role);
            $stmt->bindParam(8, $this->accountStatus);
            $stmt->bindParam(9, $this->verificationFileName);
            $stmt->bindParam(10, $this->verificationFilePath);
            $stmt->bindParam(11, $this->verificationFileType);
            $stmt->bindParam(12, $this->verificationFileSize);
            $stmt->bindParam(13, $this->isVerified);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function login($con)
    {
        try {
            $query = "SELECT uni.name,u.* FROM users u LEFT JOIN university uni ON u.university_id=uni.id WHERE email=?";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $this->email);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                if (password_verify($this->password,$result['password']) && $result['account_status'] == "active" && $result['is_verified'] == 1) {
                    $_SESSION['first_name'] = $result['first_name'];
                    $_SESSION['last_name'] = $result['last_name'];
                    $_SESSION['email'] = $result['email'];
                    $_SESSION['contact'] = $result['contact'];
                    $_SESSION['university'] = $result['name'];
                    $_SESSION['role'] = $result['role'];
                    $_SESSION['account_status'] = $result['account_status'];
                    $_SESSION['verification_file_path'] = $result['verification_file_path'];
                    $_SESSION['is_verified'] = $result['is_verified'];
                    $_SESSION['id'] = $result['id'];
                    return true;
                } elseif (password_verify($this->password,$result['password'])) {
                    if ($result['account_status'] == "inactive" && $result['is_verified'] == 0) {
                        header("Location: /KuppiMate/src/view/verification-pending.php");
                        exit();
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function logout()
    {
        session_destroy();
        return true;
    }
    public function userList($con, $condition)
    {
        try {
            if ($condition == "needToVerify") {
                $query = "SELECT u.id,u.first_name,u.last_name,uni.name,u.email,u.verification_file_name 
                FROM users u 
                LEFT JOIN university uni ON uni.id = u.university_id 
                WHERE u.account_status='inactive' AND u.is_verified=0";
            } elseif ($condition == "verified") {
                $query = "SELECT u.id,u.first_name,u.last_name,uni.name,u.account_status,u.contact 
                FROM users u
                LEFT JOIN university uni ON uni.id = u.university_id  
                WHERE u.is_verified=1 AND u.role='undergraduate'";
            } elseif ($condition == "externalLearnerList") {
                $query = "SELECT id,first_name,last_name,email,contact FROM users WHERE account_status='active' AND is_verified=1 AND role='external_learner' ";
            }
            $rs = $con->query($query);
            if ($rs->rowCount() > 0) {
                while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
                    $output[] = $row;
                }
                return $output;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function ugAccountActivation($con)
    {
        try {
            $query = "UPDATE users SET account_status='active',is_verified=1 WHERE id=?";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $this->userId);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function deleteAccount($con)
    {
        try {

            $queryAttendace = "DELETE FROM attendance WHERE `user_id`=?";
            $stmtAttendance = $con->prepare($queryAttendace);
            $stmtAttendance->bindParam(1, $this->userId);
            $stmtAttendance->execute();

            $queryFeedback = "DELETE FROM feedback WHERE created_by=?";
            $stmtFeedback = $con->prepare($queryFeedback);
            $stmtFeedback->bindParam(1, $this->userId);
            $stmtFeedback->execute();

            $queryNotice = "DELETE FROM notice WHERE created_by=?";
            $stmtNotice = $con->prepare($queryNotice);
            $stmtNotice->bindParam(1, $this->userId);
            $stmtNotice->execute();

            $querySubscription = "DELETE FROM subscription WHERE created_by=?";
            $stmtSubscription = $con->prepare($querySubscription);
            $stmtSubscription->bindParam(1, $this->userId);
            $stmtSubscription->execute();

            $queryPayment = "DELETE FROM payment WHERE created_by=?";
            $stmtPayment = $con->prepare($queryPayment);
            $stmtPayment->bindParam(1, $this->userId);
            $stmtPayment->execute();

            $queryMaterial = "SELECT file_path FROM material WHERE created_by=?";
            $stmtMaterial = $con->prepare($queryMaterial);
            $stmtMaterial->bindParam(1, $this->userId);
            $stmtMaterial->execute();
            $filePaths = $stmtMaterial->fetchAll(PDO::FETCH_COLUMN);

            if (!empty($filePaths)) {
                $query3 = "DELETE FROM material WHERE created_by=?";
                $stmt3 = $con->prepare($query3);
                $stmt3->bindParam(1, $this->userId);
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

            $queryTutorSession = "DELETE FROM tutorsession WHERE created_by=?";
            $stmtTutorSession = $con->prepare($queryTutorSession);
            $stmtTutorSession->bindParam(1, $this->userId);
            $stmtTutorSession->execute();

            $queryKuppi = "DELETE FROM kuppisession WHERE created_by=?";
            $stmtKuppi = $con->prepare($queryKuppi);
            $stmtKuppi->bindParam(1, $this->userId);
            $stmtKuppi->execute();

            $query1 = "SELECT verification_file_path FROM users WHERE id=?";
            $stmt1 = $con->prepare($query1);
            $stmt1->bindParam(1, $this->userId);
            $stmt1->execute();
            $vFile = $stmt1->fetchColumn();

            $query2 = "DELETE FROM users WHERE id=?";
            $stmt2 = $con->prepare($query2);
            $stmt2->bindParam(1, $this->userId);
            $stmt2->execute();
            if ($stmt2->rowCount() > 0) {
                if (file_exists($vFile)) {
                    unlink($vFile);
                }
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function countDetails($con, $condition)
    {
        try {
            $query = "SELECT COUNT(*) as count FROM users";
            if ($condition == "totalUsers") {
                $query .= " WHERE role='undergraduate' OR role='external_learner'";
            } elseif ($condition == "totalUndergarduate") {
                $query .= " WHERE role='undergraduate'";
            } elseif ($condition == "totalActive") {
                $query .= " WHERE account_status='active' AND (role='undergraduate' OR role='external_learner') ";
            } elseif ($condition == "needToVerify") {
                $query .= " WHERE is_verified=0";
            }
            $stmt = $con->prepare($query);
            $stmt->execute();
            $count = $stmt->fetchColumn();
            return $count;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function inactiveAccount($con)
    {
        try {
            $query = "UPDATE users SET account_status='inactive' WHERE id=?";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $this->userId);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function reactiveAccount($con)
    {
        try {
            $query = "UPDATE users SET account_status='active' WHERE id=?";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $this->userId);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function updateProfile($con, $condition, $oldPsw)
    {
        try {
            if ($condition == "user-details") {
                $updates = [];
                $params = [];

                if ($this->firstName !== null) {
                    $updates[] = "first_name = ?";
                    $params[] = $this->firstName;
                }
                if ($this->lastName !== null) {
                    $updates[] = "last_name = ?";
                    $params[] = $this->lastName;
                }
                if ($this->email !== null) {
                    $updates[] = "email = ?";
                    $params[] = $this->email;
                }
                if ($this->contact !== null) {
                    $updates[] = "contact = ?";
                    $params[] = $this->contact;
                }
                if (!empty($updates)) {
                    $query = "UPDATE users SET " . implode(", ", $updates) . " WHERE id = ?";
                    $params[] = $this->userId;

                    $stmt = $con->prepare($query);

                    if ($stmt->execute($params)) {
                        $query = "SELECT * FROM users WHERE id=?";
                        $stmt = $con->prepare($query);
                        $stmt->bindParam(1, $this->userId);
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        if ($result) {
                            $_SESSION['first_name'] = $result['first_name'];
                            $_SESSION['last_name'] = $result['last_name'];
                            $_SESSION['email'] = $result['email'];
                            $_SESSION['contact'] = $result['contact'];
                        }
                        return $stmt->rowCount() > 0;
                    } else {
                        return false;
                    }
                }
            } elseif ($condition == "password-update") {
                $query = "UPDATE users SET password = ? WHERE id = ? AND password = ?";
                $stmt = $con->prepare($query);
                $stmt->bindParam(1, password_hash($this->password,PASSWORD_BCRYPT));
                $stmt->bindParam(2, $this->userId);
                $stmt->bindParam(3, password_hash($oldPsw,PASSWORD_BCRYPT));

                if ($stmt->execute()) {
                    return $stmt->rowCount() > 0;
                } else {
                    return false;
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function recoveryUpdate($con){
        try {
            $query="UPDATE users SET password=? WHERE email=?";
            $stmt=$con->prepare($query);
            $stmt->bindparam(1,password_hash($this->password,PASSWORD_BCRYPT));
            $stmt->bindparam(2,$this->email);
            $stmt->execute();

            return $stmt->rowCount()>0;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
    public function updateLastLogin($con,$id){
        try {
            $query="UPDATE users SET last_login=CURRENT_TIMESTAMP WHERE id=?";
            $stmt=$con->prepare($query);
            $stmt->bindparam(1,$id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
