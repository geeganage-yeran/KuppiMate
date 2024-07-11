<?php

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
        $this->password = $password;
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

    public function registerUser($con)
    {
        if ($this->verificationFileName) {
            $this->role = "undergraduate";
        } else {
            $this->role = "external_learner";
        }
        try {
            $query = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `contact`, `university`, `role`, `verification_file_name`, `verification_file_path`, `verification_file_type`, `verification_file_size`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $this->firstName);
            $stmt->bindParam(2, $this->lastName);
            $stmt->bindParam(3, $this->email);
            $stmt->bindParam(4, $this->password);
            $stmt->bindParam(5, $this->contact);
            $stmt->bindParam(6, $this->university);
            $stmt->bindParam(7, $this->role);
            $stmt->bindParam(8, $this->verificationFileName);
            $stmt->bindParam(9, $this->verificationFilePath);
            $stmt->bindParam(10, $this->verificationFileType);
            $stmt->bindParam(11, $this->verificationFileSize);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
