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
      <div><div class="regText"><label for="username">Username: </label> </div><input value="<?php echo isset($_SESSION['form_input']['username']) ? $_SESSION['form_input']['username'] : ""; ?>" type="text" name="username" id="username"></div>
      <div><div class="regText"><label for="password">Password: </label></div><input type="password" name="password" id="password"></div>
      <div><div class="regText"><label for ="email"> Email: </label></div><input value="<?php echo isset($_SESSION['form_input']['email']) ? $_SESSION['form_input']['email'] : ""; ?>"type="text" name = "email" id="email"></div>
      <?php
        if (isset($_SESSION['messages'])) {
          echo "<div id='message'>";
          foreach ($_SESSION['messages'] as $message) {
              echo "<div>" . $message . "</div>";
          }
          echo "</div>";
          unset($_SESSION['messages']);
        }
        unset($_SESSION['form_input']);
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
<script src="fadeOut.js"></script>
</html>
