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

   public function getPassword($username) { 
     $conn = $this->getConnection();
     $selectQuery = "SELECT * FROM dbuser WHERE username = :username";
     $q = $conn->prepare($selectQuery);
     $q->bindParam(":username", $username);
     $q->execute();
     $result = $q->fetch();
     return $result['password'];
   }

   public function getUserID($username) {
     $conn = $this->getConnection();
     $selectQuery = "SELECT * FROM dbuser WHERE username = :username";
     $q = $conn->prepare($selectQuery);
     $q->bindParam(":username", $username);
     $q->execute();
     $result = $q->fetch();
     return $result['user_id'];
   }

   public function userExists($username) {
     $conn = $this->getConnection();
     $selectQuery = "SELECT * FROM dbuser WHERE username = :username";
     $q = $conn->prepare($selectQuery);
     $q->bindParam(":username", $username);
     $q->execute();
     $result = $q->fetchAll();
     $userExists = false;
     foreach ($result as $curUser) {
       $userExists = true;
     }
     return $userExists;
   }

   public function savePoem($title, $contents, $user) {
     $conn = $this->getConnection();
     $saveQuery =
         "INSERT INTO savedPoem
         (title, contents, user_id)
         VALUES
         (:title, :contents, :user)";
      $q = $conn->prepare($saveQuery);
      $userID = $this->getUserID($user);
      $q->bindParam(":title", $title);
      $q->bindParam(":contents", $contents);
      $q->bindParam(":user", $userID);
      $q->execute();
   }

   public function getPoemsByUser($username) {
     $conn = $this->getConnection();
     $userID = $this->getUserID($username);
     $selectQuery = "SELECT * FROM savedPoem WHERE (user_id = :userId)";
     $q = $conn->prepare($selectQuery);
     $q->bindParam(":userId", $userID);
     $q->execute();
     $result = $q->fetchAll();
     return $result;
   }

   public function getAllPoems() {
     $conn = $this->getConnection();
     $result = $conn->query("SELECT * FROM savedPoem");
     return $result;
   }

   public function getPoemByID($id) {
     $conn = $this->getConnection();
     $selectQuery = "SELECT * FROM savedPOEM WHERE (poem_id = :id)";
     $q = $conn->prepare($selectQuery);
     $q->bindParam(":id", $id);
     $q->execute();
     $result = $q->fetch();
     return $result;
   }

}

?>
