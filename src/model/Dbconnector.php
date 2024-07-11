<?php

class Dbconnector{

    private $host="localhost";
    private $db_name="Kuppimate";
    private $db_user="cst_user";
    private $db_password="password";

    public function getConnection(){
        try {
           $dsn="mysql:host".$this->host.";dbname=".$this->db_name; 
           $con=new PDO($dsn,$this->db_user,$this->db_password);
           return $con;
        } catch (PDOException $e) {
            echo "connection failed".$e->getMessage();
        }    
    }
    
}
?>
