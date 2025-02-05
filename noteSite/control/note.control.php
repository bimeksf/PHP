<?php 
require_once("../app.php");

if($_SERVER["REQUEST_METHOD"]==="POST"){

  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];
  
  $insert= new NoteModel($name,$email,$message);
  $insert->insertUser();

  header("Location: ../view/note.php");


}