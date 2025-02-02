<?php

class dbConnect {
    private $dbhost = "localhost";
    private $dbname = "test";
    private $dbusername = "root";
    private $dbpassword = "";

    public function connection() {
        try {
            $pdo = new PDO("mysql:host=$this->dbhost;dbname=$this->dbname", $this->dbusername, $this->dbpassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            throw new Exception("Connection failed: " . $e->getMessage());
        }
    }
}
