<?php
require ("config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <h3>Change account</h3>
  <form action="userupdate.inc.php" method="POST">

    <input type="text" name="username" placeholder="username">
    <input type="password" name="pwd" placeholder="password">
    <input type="text" name="email" placeholder="email">
    <button>Signup</button>

  </form>
  <h3>Delete account</h3>
  <form action="userdelete.inc.php" method="POST">
    <input type="text" name="username" placeholder="username">
    <input type="password" name="pwd" placeholder="password">
    <button>Delete</button>
  </form>
  <br>

  <a href="search.php">serach user </a>











</body>

</html>