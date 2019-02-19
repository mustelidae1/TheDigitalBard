<html>
<head>
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
   <form method="post" action="account.php">
      <h1>Save Stories</h1>
      <div><div class="regText">Username: </div><input type="text" name="username"></div>
      <div><div class="regText">Password: </div><input type="password" name="password"></div>
      <input class="button" type="submit" value="Log In">
      <input class="button" type="submit" value="Create Account">
   </form>
 </div>
</div>
<?php
   require 'pageFooter.php'
?> 
</div>
</body>
</html>
