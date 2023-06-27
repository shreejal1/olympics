<?php
require('database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Schedule</title>
</head>
<body>
    
    <div class="nav" id="myTopnav">
    <!-- <div class="logoo">
    <img id="logoo" src="./images/logoo.png" />
    </div> -->
        <a href="home.php">Home</a>
        <a href="news.php">News</a>
        <a href="video.php">Live</a>
        <a href="schedule.php" id="clicked">Schedule</a>
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

<h1 style="background-color: #22049c; color: #ffffff; font-family: helvetica">Day 1</h1>
    
    <h2>Morning Session</h2>
    
    <table>
        <tr>
            <th style="color: #ffffff;">LOCAL TIME</th>
            <th style="color: #ffffff;">SEX</th>
            <th style="color: #ffffff;">EVENT</th>
            <th style="color: #ffffff;">ROUND</th>
        </tr>
        <tr>
            <td>09:00</td>
            <td>W</td>
            <td>100 Metres</td>
            <td>Preliminary round</td>
        </tr>
        <tr>
            <td>09:15</td>
            <td>M</td>
            <td>High Jump</td>
            <td>Qualification</td>
        </tr>
        <tr>
            <td>09:30</td>
            <td>M</td>
            <td>3000 Metres Steeplechase</td>
            <td>Heats</td>
        </tr>
        <tr>
            <td>09:45</td>
            <td>M</td>
            <td>Discus Throw</td>
            <td>Qualification - Group A</td>
        </tr>
        <tr>
            <td>10:25</td>
            <td>W</td>
            <td>800 Metres</td>
            <td>Heats</td>
        </tr>
        <tr>
            <td>11:20</td>
            <td>M</td>
            <td>Discus Throw</td>
            <td>Qualification - Group B</td>
        </tr>
        <tr>
            <td>11:25</td>
            <td>M</td>
            <td>400 Metres Hurdles</td>
            <td>Heats</td>
        </tr>
        <tr>
            <td>12:15</td>
            <td>W</td>
            <td>100 Metres</td>
            <td>Heats</td>
        </tr>
    </table>

    <h2>Evening Session</h2>
    
    <table>
        <tr>
            <th style="color: #ffffff;">LOCAL TIME</th>
            <th style="color: #ffffff;">SEX</th>
            <th style="color: #ffffff;">EVENT</th>
            <th style="color: #ffffff;">ROUND</th>
        </tr>
        <tr>
            <td>19:10</td>
            <td>M</td>
            <td>Long Jump</td>
            <td>Qualification</td>
        </tr>
        <tr>
            <td>19:15</td>
            <td>W</td>
            <td>100 Metres</td>
            <td>Semi-Final</td>
        </tr>
        <tr>
            <td>19:45</td>
            <td>M</td>
            <td>100 Metres</td>
            <td>Heats</td>
        </tr>
        <tr>
            <td>20:15</td>
            <td>M</td>
            <td>Discus Throw</td>
            <td>Final</td>
        </tr>
        <tr>
            <td>20:50</td>
            <td>W</td>
            <td>800 Metres</td>
            <td>Semi-Final</td>
        </tr>
        <tr>
            <td>21:35</td>
            <td>X</td>
            <td>4x400 Metres Relay</td>
            <td>Final</td>
        </tr>
        <tr>
            <td>21:50</td>
            <td>W</td>
            <td>100 Metres</td>
            <td>Final</td>
        </tr>
    </table>
    <h1 style="background-color: #22049c; color: #ffffff; font-family: helvetica">Day 2</h1>
    
    <h2>Morning Session</h2>
    
    <table>
        <tr>
            <th style="color: #ffffff;">LOCAL TIME</th>
            <th style="color: #ffffff;">SEX</th>
            <th style="color: #ffffff;">EVENT</th>
            <th style="color: #ffffff;">ROUND</th>
        </tr>
        <tr>
            <td>09:00</td>
            <td>W</td>
            <td>400 Metres Hurdles</td>
            <td>Heats</td>
        </tr>
        <tr>
            <td>09:30</td>
            <td>W</td>
            <td>Discus Throw</td>
            <td>Qualification - Group A</td>
        </tr>
        <tr>
            <td>09:40</td>
            <td>M</td>
            <td>Pole Vault</td>
            <td>Qualification</td>
        </tr>
        <tr>
            <td>09:50</td>
            <td>M</td>
            <td>800 Metres</td>
            <td>Heats</td>
        </tr>
        <tr>
            <td>10:45</td>
            <td>W</td>
            <td>100 Metres Hurdles</td>
            <td>Heats</td>
        </tr>
        <tr>
            <td>10:55</td>
            <td>W</td>
            <td>Discus Throw</td>
            <td>Qualification - Group B</td>
        </tr>
        <tr>
            <td>11:35</td>
            <td>M</td>
            <td>100 Metres</td>
            <td>Preliminary round</td>
        </tr>
    </table>

<?php
require('footer.php');
?>