$(function() {
     path = window.location.href.split('/');
     if (path[path.length - 1] == "gallery.php") {
       $("#gallerybutton").addClass("currentPageButton").removeClass("button");
     }
     else if (path[path.length - 1] == "login.php" || path[path.length - 1] == "account.php" || path[path.length - 1] == "createAccount.php") {
       $("#loginbutton").addClass("currentPageButton").removeClass("button");
     }
})
