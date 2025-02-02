<?php 
require_once("../app.php");

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];


    try{
    
        $user= new User($username, $email, $password);
        
        $user->signup_user();   


        




    }catch(Exception $e){
        die("something went wrond") . $e->getMessage();
    }


}