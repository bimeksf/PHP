<?php

include("database.php");
session_start();
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

  <h1>Prihlaseni</h1>


  <form action="" method="post">

    <input type="text" name="username" placeholder="username" autocomplete="username">
    <input type="password" name="password" placeholder="password">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION["csrf_token"] ?>">
    <input type="submit" name="login" value="login">


  </form>

  <a href="index.php">zpet na registraci</a>

</body>

</html>


<?php

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login"])) {

  if (!hash_equals($_SESSION["csrf_token"], $_POST["csrf_token"])) {
    die("neplatny token");
  }


  if (!empty($_POST["username"]) && !empty($_POST["password"])) {
    $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS));
    $password = trim($_POST["password"]);


    $db = new Database();
    $conn = $db->connection();

    if (!$conn) {
      die("Připojení k databázi selhalo.");
    }

    $sql = "SELECT password  FROM names WHERE username = :username";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
      echo "Něco se pokazilo při přípravě dotazu";
    } else {

      $stmt->bindValue(":username", $username, PDO::PARAM_STR);

      if ($stmt->execute()) {

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
          $hashed_password = $row["password"];


          if (password_verify($password, $hashed_password)) {

            $_SESSION["username"] = $username;
            $_SESSION["message"] = "Přihlášení bylo úspěšné.";
            header("location: home.php");
            exit;
          }
        } else {
          echo "uzivatel nenalezen";
        }
      }
    }
  }
}


echo $_GET["name"]


?>