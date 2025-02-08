<?php
declare(strict_types=1);


function get_user(object $pdo, string $username)
{

  $query = "SELECT * FROM users WHERE username= :username;";

  $stmt = $pdo->prepare($query);

  $stmt->bindParam(":username", $username, PDO::PARAM_STR);
  $stmt->execute();


  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return $result;
}

function output_username()
{

  if (isset($_SESSION["user_id"])) {
    echo "you are logged in as " . $_SESSION["user_username"];
  } else {
    echo " you are not logged in";
  }
}



