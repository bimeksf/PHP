<?php

declare(strict_types=1);

phpinfo();


class Connect
{

  private $host = "localhost";
  private $dbname = "test";
  private $user = "root";
  private $password = "";

  function __construct()
  {

    $this->host;
    $this->dbname;
    $this->user;
    $this->password;
  }

  function connectDB()
  {







    try {
      $pdo = new PDO("mysql:host,$this->host", $this->user, $this->password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    } catch (PDOException $e) {
      die("something with connecting "  * $e->getMessage());
    }
  }
}
