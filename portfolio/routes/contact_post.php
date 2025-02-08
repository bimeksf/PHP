<?php



$name = $_POST["name"] ?? "";
$email = $_POST["email"] ?? "";
$comment = $_POST["comment"] ?? "";

if (empty($name) || empty($email) || empty($comment)) {

  badRequest("all fielads req");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

  badRequest("email field is invalid");
}

connectDb();
