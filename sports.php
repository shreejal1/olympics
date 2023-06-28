<?php
require('database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Sports</title>
</head>
<body>
    
    <div class="nav" id="myTopnav">
    <!-- <div class="logoo">
    <img id="logoo" src="./images/logoo.png" />
    </div> -->
        <a href="home.php">Home</a>
        <a href="news.php">News</a>
        <a href="video.php">Live</a>
        <a href="schedule.php">Schedule</a>
        <a href="sports.php" id="clicked">Sports</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
  <!-- <script>
  function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "nav") {
    x.className += " responsive";
  } else {
    x.className = "nav";
  }
}
</script> -->
<script src="script.js"></script>
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
    
    <div>
        <!-- <a href="./sports.php?id=1" id="slink"><img id="sportss" src="./sports/image1.jpg" />
        <h1 id="sp">Football</h1></a><br> -->


<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = $pdo->query("select * from sports where id = '$id'");
    $rd = $sql->fetch();
    
   echo '<div class="centered">
   Game Description-'.$rd['name'].'
      <div class="image-container">';
        echo '<img id="namilogo" src="./sports/image'.$rd['id'].'.jpg" />';
        echo '<h1 class="main-title" style="font-family: trebuchet ms">'.$rd['name'].'</h1>
      </div>

    <div class="container">
        <h4 style="font-family: trebuchet ms; text-align: justify;">'.$rd['description'].'</h4>
    </div>
    <div class="links">
        <a href="./sports.php">Go back</a>
      </div>

   
    </div>';

}else{
?>

        <br><br><div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="./sports/image1.jpg" alt="Avatar" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <h1>Football</h1>
      <a href="./sports.php?id=1" id="slink">Description</a>
    </div>
  </div>
</div><br><br>

<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="./sports/image2.jpg" alt="Avatar" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <h1>Athletics</h1>
      <a href="./sports.php?id=2" id="slink">Description</a>
    </div>
  </div>
</div><br><br>

<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="./sports/image3.jpg" alt="Avatar" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <h1>Equestrian</h1>
      <a href="./sports.php?id=3" id="slink">Description</a>
    </div>
  </div>
</div><br><br>

<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="./sports/image4.jpg" alt="Avatar" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <h1>Pentathlon</h1>
      <a href="./sports.php?id=4" id="slink">Description</a>
    </div>
  </div>
</div><br><br>

        <!-- <a href="./sports.php?id=2" id="slink"><img id="sportss" src="./sports/image2.jpg" />
        <h1 id="sp">Athletics</h1></a><br> -->
      </div>

<?php
}
?>

<?php
require('footer.php');
?>