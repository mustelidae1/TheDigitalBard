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
   <form method="post" action="loginHandler.php">
      <h1>Save Poems</h1>
      <div><div class="regText">Username: </div><input value="<?php echo isset($_SESSION['form_input']['username']) ? $_SESSION['form_input']['username'] : ""; ?>" type="text" name="username"></div>
      <div><div class="regText">Password: </div><input type="password" name="password"></div>
      <?php
        if (isset($_SESSION['message'])) {
          echo "<div id='message'>" . $_SESSION['message'] .  "</div>";
          unset($_SESSION['message']);
        }
        unset($_SESSION['form_input']);
      ?>
      <input class="button" type="submit" value="Log In">
      <input class="button" type="submit" name="createAccount" value="Create Account">
   </form>
 </div>
</div>
<?php
   require 'pageFooter.php'
?>
</div>
</body>
</html>
