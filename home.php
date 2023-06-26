<?php
require('database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Olympics-Home</title>
</head>
<body>
    
    <div class="nav">
    <div class="logoo">
    <img id="logoo" src="./images/logoo.png" />
    </div>
        <a href="home.php" id="clicked">Home</a>
        <a href="news.php">News</a>
        <a href="video.php">Live</a>
        <a href="schedule.php">Schedule</a>
        <a href="sports.php">Sports</a>
        <?php
            if(isset($_SESSION['id'])){
            $id = $_SESSION['id'];
            $sql = $pdo->query("select fullname from user where username = '$id'");
            $rd = $sql->fetch();
            echo '<a onclick="return clicklogout()" href="logout.php">'.$rd['fullname'].'-Logout</a>';
            echo '
            <script>
function clicklogout() {
var result = confirm("Are you sure to log out?");
if (result == true) {
return true;
} else {
return false;
}
}
</script>';




            }else{
                echo '<a href="login.php">Login</a>';
            }
        ?>
    </div>
    


<div class="slideshow">
  <img src="./images/image1.jpg" alt="Image 1" class="mySlides">
  <img src="./images/image2.jpg" alt="Image 2" class="mySlides">
  <img src="./images/image3.jpg" alt="Image 3" class="mySlides">
</div>
<h3 style="font-family:helvetica;margin-left:40px;">Move with</h3>
<h3 style="font-family:helvetica;margin-left:40px;">Athletes on</h3>
<h3 style="font-family:helvetica;margin-left:40px;">Olympic Day</h3><br><br>
<a href="./news.php" id="slink">Discover more ➡️</a><br><br>
<a href="./schedule.php" id="slink">Schedule your day 📆</a>
<a href="./sports.php" id="slink">Know more about... 👟</a><br><br>



<?php
if(isset($_SESSION['id'])){
  echo '<a href="./video.php" id="slink">Watch live 📽️</a><br><br>';
}
else{
  echo '<a href="./login.php" id="slink">Login to your account 👤</a>';
  echo '<a href="./register.php" id="slink">Get your account now ☑️</a><br><br>';
}
?>


<script>
    var slideIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > x.length) {slideIndex = 1}
  x[slideIndex-1].style.display = "block";
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
<?php
require('footer.php');
?>