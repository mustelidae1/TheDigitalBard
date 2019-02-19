<html>
<head>
   <link rel="stylesheet" href="style.css">
   <link href="https://fonts.googleapis.com/css?family=Cinzel|Arapey" rel="stylesheet">
   <link rel="icon" type="image/png" href="favicon.png">
</head>
<body>
<div id="main">
<div id="navbar">
  <div id="logo"><a href="index.php"><img src="logo-small.png"></a></div>
  <div id="navButtons">
    <ul>
    <li> <a href="login.php"><div class="regText">Log In</div></a> </li>
    <li> <a href="gallery.php"><div class="regText">Gallery</div></a> </li>
    </ul>
   </div>
</div>
<div id="top"></div>
<div id="mid">
<div id="midContent">
   <form method="post" action="story.php">
      <h1>Once upon a time...</h1>
      <p> This is the beginning of the story. What happens next?</p>
      <div id="radioBSection">
      <div class="radioB"><input type="radio" name="genre" value="comedy"> <div class="regText">Option 1</div> </div>
      <div class="radioB"><input type="radio" name="genre" value="action"> <div class="regText">Option 2</div> </div>
      <div class="radioB"><input type="radio" name="genre" value="general"> <div class="regText">Option 3</div> </div>
      </div>
      <input type="submit" value="Go!">
   </form>
</div>
</div>
<div id="bottom"> </div>
<div id="footer">&copy; 2019 Olivia Thomas. Images used with permission from writersplanet.org and kisspng.</div>
</div>
</body>
</html>
