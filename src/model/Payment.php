<?php
class Payment {
    private $paymentId;
    private $paymentMethod;
    private $amount;
    private $paymentDate;

    public function setPaymentId($paymentId) {
        $this->paymentId = $paymentId;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function savePaymentDetails($con) {
        try {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $created_by = $_SESSION['id'];
            $query = "INSERT INTO payment(`user_id`,tutor_session_id,amount,created_by) VALUES (?,?,?,?)";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $created_by);
            $stmt->bindParam(2, $this->paymentId);
            $stmt->bindParam(3, $this->amount);
            $stmt->bindParam(4, $created_by);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function listPayment($con) {
        try {
            $query="SELECT p.*, u.first_name, u.last_name,ts.title,DATE(p.created_date) AS paidDate,TIME(p.created_date) AS paidTime
            FROM payment p
            JOIN users u ON u.id = p.user_id
            JOIN tutorsession ts ON ts.id = p.tutor_session_id";
            $stmt=$con->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

}
