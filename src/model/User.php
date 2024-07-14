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
        $this->password =md5($password);
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
    public function verifyUser($con,$email){
        try {
            $query="SELECT email FROM users WHERE email=?";
            $stmt=$con->prepare($query);
            $stmt->bindParam(1,$email);
            $stmt->execute();
            if($stmt->rowCount()>0){
                return false;
            }else{
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
            $this->accountStatus="inactive";
            $this->isVerified=0;
        } else {
            $this->role = "external_learner";
            $this->accountStatus="active";
            $this->isVerified=1;
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

    public function login($con){
        try {
            $query="SELECT * FROM users WHERE email=?";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $this->email);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($result){
                if($result['password']===$this->password && $result['account_status']=="active" && $result['is_verified']==1){
                    $_SESSION['first_name']=$result['first_name'];
                    $_SESSION['last_name']=$result['last_name'];
                    $_SESSION['email']=$result['email'];
                    $_SESSION['contact']=$result['contact'];
                    $_SESSION['university']=$result['university'];
                    $_SESSION['role']=$result['role'];
                    $_SESSION['account_status']=$result['account_status'];
                    $_SESSION['verification_file_path']=$result['verification_file_path'];
                    $_SESSION['is_verified']=$result['is_verified']; 
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        
    }
    public function logout(){
        session_destroy();
        return true;
    }
}
