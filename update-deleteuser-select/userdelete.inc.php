<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST["username"];
  $password = $_POST["pwd"];


  try {

    require_once("dbh.inc.php");


    $query = "DELETE FROM users WHERE username = :username AND  pwd=:pwd;";


    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":pwd", $password);


    $stmt->execute();

    header("Location: index.php");
    die();
  } catch (PDOException $e) {

    die("query failded") . $e->getMessage();
  }
} else {
  header("Location: index.php");
}
