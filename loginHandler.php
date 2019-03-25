<?php
   if(isset($_POST['createAccount'])) {
     header("location: createAccount.php");
     die();
   }

   session_start();

   $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
   $enteredPassword = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

   require_once 'Dao.php';
   $dao = new Dao();

   $correctPassword = $dao->getPassword($username);

   if($correctPassword != $enteredPassword || $enteredPassword == "") {
     $_SESSION['message'] = "You shall not pass." ;
     header("location: login.php");
     die();
   } else {
     $_SESSION['username'] = $username;
     header("location: account.php");
     die();
   }

?>
