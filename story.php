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
   <form method="post" action="story.php">
      <h1>Once upon a time...</h1>
      <p> This is the beginning of the story. What happens next?</p>
      <div id="radioBSection">
      <div class="radioB"><input type="radio" name="genre" value="comedy"> <div class="regText">Option 1</div> </div>
      <div class="radioB"><input type="radio" name="genre" value="action"> <div class="regText">Option 2</div> </div>
      <div class="radioB"><input type="radio" name="genre" value="general"> <div class="regText">Option 3</div> </div>
      </div>
      <input class="button" type="submit" value="Go!">
   </form>
</div>
</div>
<?php
   require 'pageFooter.php'
?>
</div>
</body>
</html>
