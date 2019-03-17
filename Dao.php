<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Dao {
   public $host = "us-cdbr-iron-east-03.cleardb.net";
   public $db = "heroku_4dd4a9c8944f601";
   public $user = "b26302263e858c";
   public $password = "52e8e4ba";

   public function getConnection() {
     return new PDO("mysql:host={$this->host};dbname={$this->db}",$this->user,$this->password);
   }

   public function createUser($username, $password, $email) {
     $conn = $this->getConnection();
     $saveQuery =
         "INSERT INTO dbuser
         (username, password, email)
         VALUES
         (:username, :password, :email)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":username", $username);
    $q->bindParam(":password", $password);
    $q->bindParam(":email", $email);
    $q->execute();
  }

   public function getUsers() {
     $conn = $this->getConnection();
     return $conn->query("SELECT * FROM dbuser");
   }

   public function getPassword($username) { // TODO: sanitize this statement
     $conn = $this->getConnection();
     $result = $conn->query("SELECT * FROM dbuser WHERE username LIKE '$username'");
     foreach ($result as $curUser) {
        $correctPassword = $curUser['password'];
      }
     return $correctPassword;
   }

   public function userExists($username) {
     $conn = $this->getConnection();
     $result = $conn->query("SELECT * FROM dbuser WHERE username LIKE'$username'");
     $userExists = false;
     foreach ($result as $curUser) {
       $userExists = true;
     }
     return $userExists; 
   }

}

?>
