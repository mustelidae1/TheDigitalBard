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
      <h1>Welcome, user!</h1>
      <a href="storyDetail.php"><div class="box fadeable"><div class="storyTitle">Story 1</div> <div class="timestamp">January 7 2019</div></div></a>
      <a href="storyDetail.php"><div class="box fadeable"><div class="storyTitle">Story 3 </div><div class="timestamp">December 5 2018</div></div></a>
 </div>
</div>
<?php
   require 'pageFooter.php'
?>
</div>
</body>
</html>
