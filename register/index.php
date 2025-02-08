<?php
session_start();
include("database.php");
if (!isset($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1> Registrace</h1>
  <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <input type="text" name="username" placeholder="Uživatelské jméno"><br>
    <input type="password" name="password" placeholder="Heslo"><br>
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    <input type="submit" name="login" value="login">
  </form>


  <a href="login.php">Prihlaseni</a>







</body>

</html>

<?php

if (isset($_POST["login"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

  if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    die("Neplatný CSRF token!");
  }


  if (!empty($_POST["username"]) && !empty($_POST["password"])) {

    $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS));
    $password_raw = trim($_POST["password"]);
    $password  = password_hash($password_raw, PASSWORD_DEFAULT);

    $db = new Database();
    $conn = $db->connection();

    if (!$conn) {
      die("Připojení k databázi selhalo.");
    }

    $checkUser = $conn->prepare("SELECT * FROM names WHERE username = :username");
    $checkUser->bindValue(":username", $username, PDO::PARAM_STR);
    $checkUser->execute();

    if ($checkUser->rowCount() > 0) {
      echo "Uživatelské jméno je již obsazeno.";
      exit;
    }



    $sql = "INSERT INTO names (username, password) VALUES (:username, :password)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
      echo "Něco se pokazilo při přípravě dotazu";
    } else {
      $stmt->bindValue(":username", $username, PDO::PARAM_STR);
      $stmt->bindValue(":password", $password, PDO::PARAM_STR);

      if ($stmt->execute()) {
        $_SESSION['username'] = $username;

        header("location: home.php");
        exit;
      } else {
        echo "Chyba při vkládání dat.";
      }
    }
  } else {
    echo "Neplatné vstupní údaje!";
  }
}

?>