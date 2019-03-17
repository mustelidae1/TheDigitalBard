<?php
   session_start();

   $username = $_POST['username']; // TODO: sanitize this
   $password = $_POST['password'];
   $email = $_POST['email'];

   require_once 'Dao.php';
   $dao = new Dao();
   $dao->createUser($username, $password, $email);

   echo ("User created.");
   $users = $dao->getUsers();
   foreach ($users as $user) {
     echo $user['username'];
   }

   if($dao->userExists($username)) {
     $_SESSION['message'] = "User already exists.";
     header("location: createAccount.php");
     die();
   } else if(strlen($username) < 5) {
     // TODO: make sure username does not already exist
     $_SESSION['message'] = "Your username was too short.";
     header("location: createAccount.php");
     die();
   } else {
     header("location: account.php");
     die();
   }

?>
