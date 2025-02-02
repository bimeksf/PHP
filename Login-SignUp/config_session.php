<?php 
ini_set("session.use_only_cookies", 1);
ini_set("session.use_strict_mode", 1);

session_set_cookie_params([
  'lifetime' => 1800,
  'domain' => $_SERVER['HTTP_HOST'],
  'path' => '/',
  'secure' => true,
  'httponly' => true,
  'samesite' => 'Strict' // Helps mitigate CSRF attacks
]);
session_start();



if(!$_SESSION["last_activity"]){


  regeneration_session_id();

} 

else{
  $interval = 60 * 30 ;

  if((time() - $_SESSION["last_activity"] >=$interval)){

    regeneration_session_id();

  }


}

function regeneration_session_id()
{

  session_regenerate_id(true);
  $_SESSION["last_activity"] = time();
}