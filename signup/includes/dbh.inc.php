<?php 



$dbhost= "mysql:host=localhost;dbname=test";
$dbusername= "root";
$dbpassword= "";



try{
  
  $pdo = new PDO($dbhost , $dbusername, $dbpassword);
   
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);






} catch(PDOException $e){
  die(   "connection faild" . $e->getMessage()   ) ;
}