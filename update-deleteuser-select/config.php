<?php 

ini_set("sesion.use_only_cookies", 1);
ini_set("sesion.use_strict_mode", 1);


session_set_cookie_params([

  'lifetime'=> 1800,
  'domain'=>"localhost",
  'path' => "/",
  'secure'=> true,
    'httponly'=>true,



]);





session_start();

if(!isset($_SESSION[]))




session_regenerate_id(true);
