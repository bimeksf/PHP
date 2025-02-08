<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $username = $_POST["username"];
  $pwd = $_POST["pwd"];
  $email = $_POST["email"];

  $options  = [

    'cost' => 12,
  ];

  $pwdHased = password_hash($pwd, PASSWORD_DEFAULT, $options);

  

  try {
    
    require_once("dbh.inc.php");
    require_once("signup_model.inc.php");
    require_once("signup_contr.inc.php");

    // errors handler


    $errors =[];







    if(is_input_empty($username, $pwd, $email)) {
      $errors["empty_input"]="Fill in all Fields";


    }
    if(is_email_invalid($email)) {
      $errors["invalid_email"]="Invalid email used!";

    }
    if( is_username_taken( $pdo,  $username)) {

      $errors["username_taken"]="User name is taken";
    }

  
    if( is_email_register( $pdo,  $email)) {
      $errors["email_used"]="email already registred";

    }


    require_once("config_session.inc.php");

    if($errors){

      $_SESSION["errors_signup"]= $errors;


      $signupData=[
          "username"=>$username,
          "email"=>$email,
      
      ];
      $_SESSION["signup_data"]= $signupData;


      header("Location: ../index.php");
        die();
    }

 
    create_user( $pdo,  $username,  $pwd,  $email);

    header("Location: ../index.php?signup=succes");


      $pdo =null;
      $stmt=null;

    die();




  
  
  

  
    






  } catch (PDOException $e) {
    die("Query failded registration" . $e->getMessage());
  }
} else {

  header("Location: ../index.php");
  die();
}
