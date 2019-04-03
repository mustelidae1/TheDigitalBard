<?php
   session_start();

   $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

   $username = $_POST['username'];
   $password = $_POST['password'];
   $email = $_POST['email'];

   $_SESSION['form_input'] = $_POST;

   require_once 'Dao.php';
   $dao = new Dao();

   $messages = array();

   // CHECK: Preexisting username
   if($dao->userExists($username)) {
    $messages[] = "User already exists.";
   }

  // CHECK: data not entered
  if (strlen($username) == 0 || strlen($password) == 0 || strlen($email) == 0) {
    $messages[] = "Please fill everything in.";
   }

   // CHECK: Username length
   if(strlen($username) < 5) {
     $messages[] = "Your username was too short.";
  }

  // CHECK: Email format
  if(!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $email)){
      $messages[] = "Incorrect email format.";
   }

   // CHECK: Password format
   if(!preg_match("/^[a-zA-Z]\w{3,14}$/", $password)) {
     $messages[] = "Password must be alphanumeric and between 4 and 15 characters.";
   }

   // We passed all the checks
   if (count($messages) == 0) {
     $dao->createUser($username, $password, $email);
     $_SESSION['username'] = $username;
     if(isset($_SESSION['savingPoem'])) {
       header("location: savePoemHandler.php");
       die();
     }
     header("location: account.php");
     die();

   // We did not pass all the checks
   } else {
      $_SESSION['messages'] = $messages;
      header("location: createAccount.php");
      die();
   }


?>
