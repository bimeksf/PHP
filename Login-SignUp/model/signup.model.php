<?php
class User extends dbConnect
{

  private $username;
  private $email;
  private $password;

  public function __construct($username, $email, $password)
  {


    $this->username = $this->sanitizeUsername($username);
    $this->password = $password;
    $this->email = $this->sanitizeEmail($email);
  }

  private function sanitizeUsername($username)
  {
    $username = strip_tags($username);
    $username = trim($username);
    return substr($username, 0, 50); // omezeni na 50 znaku
  }
  private function sanitizeEmail($email)
  {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    return filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : null;
  }
  





  public function getUsername()
  {
    return $this->username;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function getPassword()
  {
    return $this->password;
  }

  public function is_email_invalid()
  {
    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {

      return true;
    } else {
  
      return false;
    }
  }

  public function is_input_empty()
  {
    if (empty($this->email) || empty($this->password) || empty($this->username)) {
      return true;
    } else {
      return false;
    }
  }

  public function is_username_taken()
  {

    try {


      $query = "SELECT username FROM users WHERE username = :username;";
      $stmt = $this->connection()->prepare($query);

      $stmt->bindParam(":username", $this->username, PDO::PARAM_STR);
      $stmt->execute();


      if ($stmt->rowCount() > 0) {

        return true;
      }
      return false;
    } catch (PDOException $e) {

      die("something wrong with user finding" . $e->getMessage());
    }
  }
  public function is_email_taken()
  {


    try {


      $query = "SELECT email FROM users WHERE email = :email;";
      $stmt = $this->connection()->prepare($query);

      $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        return true;
      }
      return false;
    } catch (PDOException $e) {

      die("something wrong with email finding" . $e->getMessage());
    }
  }





  public function insertUser()
  {


    try {

      $query = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email);";
      $stmt = $this->connection()->prepare($query);


      $options = [
        "cost" => 12
      ];

      $hashedpwd = password_hash($this->password, PASSWORD_DEFAULT, $options);

      $stmt->bindParam(":username", $this->username, PDO::PARAM_STR);
      $stmt->bindParam(":pwd", $hashedpwd, PDO::PARAM_STR);
      $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
      $stmt->execute();

      echo "user insert";
    } catch (PDOException $e) {
      die("something went wrong with query" . $e->getMessage());
    }
  }





  public function signup_user()
  {
    $errors = [];

   
    
    if ($this->is_input_empty()) {
      $errors["empty_input"]="Fill in all Fields";

    } 
     if ($this->is_email_taken()) {
      $errors["email_used"]="email already registred";
    } 
     if ($this->is_username_taken()) {
      $errors["username_taken"] = "User name is taken";
    }
     if ($this->is_email_invalid()) {
      $errors["invalid_email"]="Invalid email used!";
    }
    
    
      if(!$errors){

        $this->insertUser();
        header("Location: ../view/signup.view.php");
        exit();

      }else {

        $_SESSION["errors_signup"]= $errors;

        $signupData=[
          "username"=>$this->username,
          "email"=>$this->email

        ];


        $_SESSION["signup_data"]=$signupData;

        header("Location: ../index.php");



    }
  }
}
