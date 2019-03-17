<?php
   if(isset($_POST['createAccount'])) {
     header("location: createAccount.php");
     die();
   }

   session_start();

   $username = $_POST['username']; // TODO: sanitize this
   $enteredPassword = $_POST['password'];

   require_once 'Dao.php';
   $dao = new Dao();

   $correctPassword = $dao->getPassword($username);

   if($correctPassword != $enteredPassword) {
     $_SESSION['message'] = "You shall not pass." ;
     header("location: login.php");
     die();
   } else {
     header("location: account.php");
     die();
   }

?>
