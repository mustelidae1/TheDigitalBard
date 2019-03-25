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
   <form method="post" action="poemCreator.php">
      <h1>Enter a Topic</h1>
      <div><input type="text" name="topic"></div>
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
