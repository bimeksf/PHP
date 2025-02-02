<?php
require_once("../app.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  try {
    $db = new dbConnect();
    $connection = $db->connection();
    $query = "SELECT username, pwd FROM users WHERE username = :username;";
    $stmt = $connection->prepare($query);

    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result && password_verify($password, $result['pwd']) && $username === $result['username']) {
      header("Location: ../view/login.view.php");
      exit();
    } else {
      header("Location: ../view/login.view.php?error=invalid_credentials");
      exit();
    }
  } catch (PDOException $e) {
    die("Something went wrong: " . $e->getMessage());
  }
}
