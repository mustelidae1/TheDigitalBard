<?php
session_start();


echo '
<div id="main">
<div id="navbar">
  <div id="logo"><a href="index.php"><img src="logo-small.png"></a></div>
  <div id="navButtons">
    <ul>';

    if (!isset($_SESSION['username'])) {
      echo('<li class="button" id="loginbutton"><a href="login.php"><div class="regText">Log In</div></a></li> ');
    } else {
      echo('<li class="button" id="loginbutton"><a href="account.php"><div class="regText">My Poems</div></a></li>');
    }

   echo '
      <li class="button" id="gallerybutton"> <a href="gallery.php"><div class="regText">Gallery</div></a></li>
    </ul>
   </div>
</div>
<div id="top" class="parchmentSection"></div>
';
?>
