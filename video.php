<?php
require('database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Live</title>
</head>
<body>
    
    <div class="nav" id="myTopnav">
    <!-- <div class="logoo">
    <img id="logoo" src="./images/logoo.png" />
    </div> -->
        <a href="home.php">Home</a>
        <a href="news.php">News</a>
        <a href="video.php" id="clicked">Live</a>
        <a href="schedule.php">Schedule</a>
        <a href="sports.php">Sports</a>
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
    
</body>
</html>
<?php
if(isset($_POST['submitBtn'])){
    if(isset($_SESSION['id'])){
    unset($_POST['submitBtn']);
    $id = $_SESSION['id'];
    $comment = $_POST['comment'];
    $sql = $pdo->query("select fullname from user where username = '$id'");
    $fn = $sql->fetch();
    $fnm = $fn['fullname'];
    $ins = $pdo->query("insert into comments(comment, user) values('$comment', '$fnm') ");
    if($ins){
        echo "<script>window.location.href='video.php'</script>";
        // header('Location: video.php');
        exit();
    }
    else{
        echo "failed to post comment";
    }

}else{
    echo "<script>alert('Please login to post a comment.')</script>";}
}

?>

<div class="vid">

<!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/zMFb8Y2QLPc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
    <iframe width="75%" height="315" src="https://www.youtube.com/embed/zMFb8Y2QLPc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
</div>

<div class="centered">
        <h1 class="main-title">Comments</h1>
    
        <div class="comments">
            <?php
                $sql = $pdo->query("select * from comments");
                $rc = $sql->rowCount();
                $resultSet = $sql->fetchAll(PDO::FETCH_ASSOC);
                if($rc > 0){
                    foreach($resultSet as $cmts){
                    echo "<input type='text' value='".$cmts['user'].": ".$cmts['comment']."' disabled>";
                    }
                }else{
                    echo "No any comment, be the first to comment.";
                }

            ?>
        </div>
        <div class="login-container">
				<form action="" method="POST" id="login-form">
					<textarea name="comment" id="" cols="50" rows="5" required></textarea>

					<br><button type="submit" name="submitBtn" id="login-btn">Post comment</button>
				</form>
    </div>
</div>

<?php
require('footer.php');
?>