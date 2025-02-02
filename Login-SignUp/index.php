<?php
require_once("app.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h3>Login</h3>
  <form action="control/login.control.php" method="post">
    <label for="username">Username</label>
    <input type="text" name="username" placeholder="Enter username" required>
    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="Enter your password" required>
    <button type="submit">Login In</button>
  </form>

  <h3>Sign Up</h3>
  <form action="control/signup.control.php" method="post">
    <label for="username">Username</label>
    <input type="text" name="username" placeholder="Enter username" value="<?php isset($_SESSION['signup_data']['username']) ? htmlspecialchars($_SESSION['signup_data']['username']) : '';  ?>">
    <label for="email">Email</label>
    <input type="text" name="email" placeholder="Enter email" value="<?php isset($_SESSION['signup_data']['username']) ? htmlspecialchars($_SESSION['signup_data']['username']) : ''; ?>">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="Enter your password">
    <button type="submit">Sign Up</button>
  </form>

  <?php
if (isset($_SESSION["errors_signup"])) {
  $errors = $_SESSION["errors_signup"];
  foreach ($errors as $error) {
      echo "<p>$error</p>";
  }
  unset($_SESSION["errors_signup"]); // Vyčištění chybových zpráv
}

if (isset($_SESSION["signup_data"])) {
  unset($_SESSION["signup_data"]); // Vyčištění předvyplněných dat
}

  ?>

<h3>Logout</h3>

<form action="control/signup.control.php" method="post">

  <button type="submit">logout</button>



</form>









</body>

</html>