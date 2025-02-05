<?php


require_once("../app.php");


class Guestbook extends ConnectionDb
{
  public function getData()
  {
    try {
      $conn = $this->connection();

      $query = "SELECT name, email, comments, reg_date FROM users ORDER BY reg_date DESC;";

      $stmt = $conn->prepare($query);
      $stmt->execute();

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      die("Cannot find users: " . $e->getMessage());
    }
  }
}
