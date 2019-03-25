<html>
<head>
  <title>The Digital Bard</title>
   <link rel="stylesheet" href="style.css">
   <link href="https://fonts.googleapis.com/css?family=Cinzel|Arapey" rel="stylesheet">
   <link rel="icon" type="image/png" href="favicon.png">
</head>
<body>
  <?php
    require 'pageTop.php';
  ?>
<div id="mid" class="parchmentSection">
<div id="midContent">
   <form method="post" action="savePoemHandler.php">
     <?php
     if (isset($_SESSION['poem'])) {
       echo "<h1>" . $_SESSION['title'] . "</h1>";
       echo "<div id='poem'>" . $_SESSION['poem'] .  "</div>";
       //unset($_SESSION['poem']); -- actually want to keep for saving
     }
     ?>
      <input class="button" type="submit" value="Save">
      <input class="button" type="submit" name="NewPoem" value="New Poem">
   </form>
</div>
</div>
<?php
   require 'pageFooter.php'
?>
</div>
</body>
</html>
