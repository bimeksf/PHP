<?php
if ($_SERVER["REQUEST_URI"] === "/favicon.ico") 
  {
  exit;
}
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  setcookie("user", $_POST["name"], time() + 3600, "/");
}


$hasCookie = isset($_COOKIE["user"]);

if (!$hasCookie) {
  $welcomeMessage = "welcome back user";
} else
  $welcomeMessage = "welcome" .   htmlspecialchars($_COOKIE["user"]);


if (!isset($_SESSION["visits"])) {

  $_SESSION["visits"] = 1;
} else {
  $_SESSION["visits"]++;
}

$visitsMessage = "THis is your" . $_SESSION["visits"] . "visit";


?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <?php if (!$hasCookie): ?>
    <form action="" method="post">

      <input type="text" name="name">
      <input type="submit">


    </form>



  <?php endif ?>
  <p><?= $welcomeMessage ?> </p>
  <p><?= $visitsMessage ?> </p>



<a href="filter.php">Filter nav</a>

</body>

</html>