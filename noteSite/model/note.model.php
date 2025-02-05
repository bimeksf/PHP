<?php




class NoteModel extends ConnectionDb
{

  private $name;
  private $email;
  private $comment;

  public function __construct($name, $email, $comment)
  {
      $this->name = htmlspecialchars(strip_tags($name));
      $this->email = filter_var($email, FILTER_VALIDATE_EMAIL); 
      if (!$this->email) {
          throw new Exception("Invalid email format");
      }
      $this->comment = htmlspecialchars(strip_tags($comment));  
    }
  
    public function insertUser()
    {
        try {
            $conn = $this->connection(); 
    
            $query = "INSERT INTO users (name, email, comments) VALUES (:name, :email, :comments)";
            $stmt = $conn->prepare($query);
    
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":comments", $this->comment);
            
            $stmt->execute();
    
            echo "User inserted successfully!";


        } catch (PDOException $e) {
            die("User insert failed: " . $e->getMessage());
        }
    }

   

  }




