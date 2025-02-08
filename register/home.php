<?php

session_start();

// mozna vymazat
if (!isset($_SESSION["username"])) {
  header("location: login.php");
  exit;
}
echo "Vítejte, " . htmlspecialchars($_SESSION["username"]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>this is home page </h1>


  <form action="home.php" method="post">
    <input type="submit" name="logout" value="logout">


  </form>


</body>

</html>



<?php



if (isset($_POST["logout"])) {

  session_destroy();
  header("location: index.php");
  exit;
}



?>