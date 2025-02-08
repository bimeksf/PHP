<?php

class Database
{

  private $dp_host = "127.0.0.1";
  private $servername = "register";
  private $username = "root";
  private $password = "";






  public function connection()
  {
    try {
      $conn = new PDO("mysql:host={$this->dp_host};dbname={$this->servername}", $this->username, $this->password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connection successful";
      return $conn; // Vrátíme připojení
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      return null;
    }
  }
}

// Příklad použití
$db = new Database();
$conn = $db->connection();
