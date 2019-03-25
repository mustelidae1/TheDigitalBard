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
      <h1>Gallery</h1>
      <?php
      require_once("Dao.php");
        $dao = new Dao();
        $poems = $dao->getAllPoems();
        foreach ($poems as $poem) {
          echo("<a href=\"poemDetail.php?id={$poem["poem_id"]}\"><div class=\"box fadeable\"><div class=\"storyTitle\">{$poem['title']}</div></div></a>");
        }

        $_SESSION['gallery'] = true;
      ?>
 </div>
</div>
<?php
   require 'pageFooter.php'
?>
</div>
</body>
</html>
