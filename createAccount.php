<html>
<head>
  <title>The Digital Bard</title>
   <link rel="stylesheet" href="style.css">
   <link href="https://fonts.googleapis.com/css?family=Cinzel|Arapey" rel="stylesheet">
   <link rel="icon" type="image/png" href="favicon.png">
</head>
<body>
<div id="main">
  <?php
    require 'pageTop.php';
  ?>
<div id="mid" class="parchmentSection">
<div id="midContent">
   <form method="post" action="createAccountHandler.php">
      <h1>Create Account</h1>
      <div><div class="regText">Username: </div><input type="text" name="username"></div>
      <div><div class="regText">Password: </div><input type="password" name="password"></div>
      <div><div class="regText">Email: </div><input type="text" name = "email"></div>
      <?php
        session_start();
        if (isset($_SESSION['message'])) {
          echo "<div id='message'>" . $_SESSION['message'] .  "</div>";
          unset($_SESSION['message']); 
        }
      ?>
      <input class="button" type="submit" value="Create">
   </form>
 </div>
</div>
<?php
   require 'pageFooter.php'
?>
</div>
</body>
</html>