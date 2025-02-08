<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST["username"];
  $password = $_POST["pwd"];
  $email = $_POST["email"];


  try {

    require_once("dbh.inc.php");


$query = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd , :email);";

$stmt= $pdo->prepare($query);

$stmt->bindParam(":username",$username);
$stmt->bindParam(":pwd",$password);
$stmt->bindParam(":email",$email);


$stmt->execute();

header("Location: index.php");
  die();

  } catch (PDOException $e) {

    die("query failded") . $e->getMessage();
  }
} else {
  header("Location: index.php");
}
