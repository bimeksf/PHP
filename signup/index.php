<?php
require_once("includes/config_session.inc.php");
require_once("includes/signup_view.inc.php");
require_once("includes/login_view.inc.php");
require_once("includes/login_model.inc.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

<h3><?php  output_username() ?></h3>


<?php 
  if (!isset($_SESSION["user_id"])) {


    
        echo '<h3>Login</h3>' ;
    
          echo  '<form action="includes/login.inc.php" method="post">';
          echo  ' <input type="text" name="username" placeholder="username">';
          echo  ' <input type="password" name="pwd" placeholder="password">';
          echo  '  <button type="submit">Login</button>';
         
    
      
      
      
          echo '</form>';



  }else {
    echo " you are not logged in";
  }

?>




  <?php


  check_login_errors();

  ?>








  <h3>Sign Up</h3>

  <form action="includes/signup.inc.php" method="post">

    <?php signup_inputs(); ?>



    <button type="submit">Login</button>



  </form>


  <?php
  check_signup_errors();

  ?>

<h3>Logout</h3>

<form action="includes/logout.inc.php" method="post">

  <button type="submit">logout</button>



</form>






</body>

</html>