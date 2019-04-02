<?php
   session_start();
   if(isset($_POST['createAccount'])) {
     header("location: createAccount.php");
     die();
   }

    if(issset($_POST['username'])) {
       $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    }

    if(isset($_POST['password'])) {
       $enteredPassword = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    }

   require_once 'Dao.php';
   $dao = new Dao();

   $correctPassword = $dao->getPassword($username);

   if($correctPassword != $enteredPassword || $enteredPassword == "") {
     $_SESSION['message'] = "You shall not pass." ;
     header("location: login.php");
     die();
   } else {
     $_SESSION['username'] = $username;
     if(isset($_SESSION['savingPoem'])) {
       header("location: savePoemHandler.php");
       die();
     }
     header("location: account.php");
     die();
   }

?>
