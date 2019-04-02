<?php
   session_start();

   $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
   $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
   $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);

   $_SESSION['form_input'] = $_POST;  

   require_once 'Dao.php';
   $dao = new Dao();

   // CHECK: Preexisting username
   if($dao->userExists($username)) {
     $_SESSION['message'] = "User already exists.";
     header("location: createAccount.php");
     die();

  // CHECK: data not entered
  } else if (strlen($username) == 0 || strlen($password) == 0 || strlen($email) == 0) {
    $_SESSION['message'] = "Please fill everything in.";
    header("location: createAccount.php");
    die();

  // CHECK: Username length
   } else if(strlen($username) < 5) {
     $_SESSION['message'] = "Your username was too short.";
     header("location: createAccount.php");
     die();

  // CHECK: Email format
  } else if(!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $email)){
      $_SESSION['message'] = "Incorrect email format.";
      header("location: createAccount.php");
      die();

   // CHECK: Password format TODO

  // We passed all the checks
   } else {
     $dao->createUser($username, $password, $email);
     $_SESSION['username'] = $username;
     if(isset($_SESSION['savingPoem'])) {
       header("location: savePoemHandler.php");
       die();
     }
     header("location: account.php");
     die();
   }

?>
