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
      <h1>Genre</h1>
      <div id="radioBSection">
      <div class="radioB"><input type="radio" name="genre" value="comedy"> <div class="regText">Comedy</div> </div>
      <div class="radioB"><input type="radio" name="genre" value="action"> <div class="regText">Action</div> </div>
      <div class="radioB"><input type="radio" name="genre" value="general"> <div class="regText">General</div> </div>
      </div>
      <h1>Characters</h1>
      <div><input class="textBox" type="text" name="char1"><input type="radio" name="mainChar" value="1"></div>
      <div><input class="textBox" type="text" name="char2"><input type="radio" name="mainChar" value="2"> </div>
      <div><input class="textBox" type="text" name="char3"><input type="radio" name="mainChar" value="3"></div>
      <input type="submit" value="Submit">
   </form>
</div>
</div>
<div id="bottom"> </div>
<div id="footer">&copy; 2019 Olivia Thomas. Images used with permission from writersplanet.org and kisspng.</div>
</div>
</body>
</html>
