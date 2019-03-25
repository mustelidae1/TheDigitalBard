<?php
 session_start();
 if(isset($_POST['NewPoem'])) {
   header("location: index.php");
   die();
 }

 if (!isset($_SESSION['username'])) {
   header("location: login.php");
   die();
 }

 require_once 'Dao.php';
 $dao = new Dao();

 $dao->savePoem($_SESSION['title'], $_SESSION['poem'], $_SESSION['username']);

 header("location: account.php");
 die();  
?>
