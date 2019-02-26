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
      <h1>Genre</h1>
      <div id="radioBSection">
      <div class="radioB"><input type="radio" name="genre" value="comedy"> <div class="regText">Comedy</div> </div>
      <div class="radioB"><input type="radio" name="genre" value="action"> <div class="regText">Action</div> </div>
      <div class="radioB"><input type="radio" name="genre" value="general"> <div class="regText">General</div> </div>
      </div>
      <h1>Characters</h1>
      <div><input type="text" name="char1"><input type="radio" name="mainChar" value="1"></div>
      <div><input type="text" name="char2"><input type="radio" name="mainChar" value="2"> </div>
      <div><input type="text" name="char3"><input type="radio" name="mainChar" value="3"></div>
      <input class="button" type="submit" value="Submit">
   </form>
</div>
</div>
<?php
   require 'pageFooter.php'
?> 
</div>
</body>
</html>
