<?php

class Dbconnector {

    private static $host = "localhost";
    private static $db_name = "Kuppimate";
    private static $db_user = "cst_user";
    private static $db_password = "password";

    public static function getConnection() {
        try {
            $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$db_name;
            $con = new PDO($dsn, self::$db_user, self::$db_password);
            return $con;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    
}


