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
  <?php
    if (isset($_GET['id'])) {
      $id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);
      require_once("Dao.php");
      $dao = new Dao();
      $poem = $dao->getPoemByID($id);
      echo("<h1>{$poem['title']}</h1>");
      echo("<div class=\"regText\">{$poem['contents']}</div>");
    }

    if (isset($_SESSION['gallery'])) {
      unset($_SESSION['gallery']);
      echo("<a href=\"gallery.php\"><div class=\"button\">Back</div></a>");
    } else {
      echo("<a href=\"account.php\"><div class=\"button\">Back</div></a>");
    }
  ?>

 </div>
</div>
<?php
   require 'pageFooter.php'
?>
</div>
</body>
</html>
