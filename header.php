<?php
require('database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Olympics</title>
</head>
<body>
    
    <div class="nav">
    <div class="logoo">
    <img id="logoo" src="./images/logoo.png" />
    </div>
        <a href="home.php">Home</a>
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
    
</body>
</html>