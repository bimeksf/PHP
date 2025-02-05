<?php


class ConnectionDb
{
  private $host = "localhost";
  private $dbname = "portfolio";
  private $user = "root";
  private $password = "";

  public function connection()
  {
    try {
      $pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


      return $pdo;
    } catch (Exception $e) {
      die("connection failed" . $e->getMessage());
    }
  }
}
