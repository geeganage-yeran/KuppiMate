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
    private $university;
    private $role;
    private $accountStatus;
    private $verificationFileName;
    private $verificationFilePath;
    private $verificationFileType;
    private $verificationFileSize;
    private $isVerified;
    private $lastLogin;

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
        $this->password = md5($password);
    }
    public function setContact($contact)
    {
        $this->contact = $contact;
    }
    public function setUniversity($university)
    {
        $this->university = $university;
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
            $query = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `contact`, `university`, `role`,`account_status`, `verification_file_name`, `verification_file_path`, `verification_file_type`, `verification_file_size`,`is_verified`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,? ,?)";

            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $this->firstName);
            $stmt->bindParam(2, $this->lastName);
            $stmt->bindParam(3, $this->email);
            $stmt->bindParam(4, $this->password);
            $stmt->bindParam(5, $this->contact);
            $stmt->bindParam(6, $this->university);
            $stmt->bindParam(7, $this->role);
            $stmt->bindParam(8, $this->accountStatus);
            $stmt->bindParam(9, $this->verificationFileName);
            $stmt->bindParam(10, $this->verificationFilePath);
            $stmt->bindParam(11, $this->verificationFileType);
            $stmt->bindParam(12, $this->verificationFileSize);
            $stmt->bindParam(13, $this->isVerified);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function login($con)
    {
        try {
            $query = "SELECT * FROM users WHERE email=?";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $this->email);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                if ($result['password'] === $this->password && $result['account_status'] == "active" && $result['is_verified'] == 1) {
                    $_SESSION['first_name'] = $result['first_name'];
                    $_SESSION['last_name'] = $result['last_name'];
                    $_SESSION['email'] = $result['email'];
                    $_SESSION['contact'] = $result['contact'];
                    $_SESSION['university'] = $result['university'];
                    $_SESSION['role'] = $result['role'];
                    $_SESSION['account_status'] = $result['account_status'];
                    $_SESSION['verification_file_path'] = $result['verification_file_path'];
                    $_SESSION['is_verified'] = $result['is_verified'];
                    $_SESSION['id'] = $result['id'];
                    return true;
                } elseif ($result['password'] === $this->password) {
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
                $query = "SELECT id,first_name,last_name,university,email,verification_file_name FROM users WHERE account_status='inactive' AND is_verified=0";
            } elseif ($condition == "verified") {
                $query = "SELECT id,first_name,last_name,university,account_status,contact FROM users WHERE is_verified=1 AND role='undergraduate'";
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
                $stmt->bindParam(1, $this->password);
                $stmt->bindParam(2, $this->userId);
                $stmt->bindParam(3, md5($oldPsw));

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
}
