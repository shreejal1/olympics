<?php
require('database.php');
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Account Registration</title>
  </head>

  <body>
    <div class="centered">
    <?php
if(isset($_POST['reg'])){
  unset($_POST['reg']);
  $name = $_POST['name'];
  $username = $_POST['email'];
  $password = $_POST['password'];
  $cp = $_POST['cpassword'];
  $sq = $_POST['squestion'];
  $sa = $_POST['sanswer'];

  if($password === $cp){
    $sql = $pdo->query("select username from user where username = '$username'");
    $rd = $sql->fetch();
    $rc = $sql->rowCount();
    if($rc < 1){
      $ins = $pdo->query("insert into user values('$name', '$username', '$password', '$sq', '$sa')");
      if($ins){
        header("Location: login.php");
        exit();
      }
      else{
        echo "<h4 style='font-family:helvetica; color:#d42e11;'>Unusual error occured, try again</h4>";
      }
    }
    else{
      echo "<h4 style='font-family:helvetica; color:#d42e11;'>Username or email already in use</h4>";
    }
  }
  else{
    echo "<h4 style='font-family:helvetica; color:#d42e11;'>Password do not match, Try again.</h4>";
  }
}
?>
    <h4 style="font-family:helvetica">*All fields required</h4>
      <form action="" method="POST">
        
        <input type="text" name="name" placeholder="Full name*" required/>
        <input type="text" name="email" placeholder="Username or Email*" required/>
        <input type="password" name="password" placeholder="Password*" required/>
        <input type="password" name="cpassword" placeholder="Confirm Password*" required/>
        <input type="text" name="squestion" placeholder="Security Question*" required/>
        <input type="text" name="sanswer" placeholder="Answer*" required/>

      

      <div class="links">
        <button type="submit" name="reg">Register</button>
      </div>
      <br><a href="login.php">Already have an account?</a>
      </form>
    </div>

  </body>

</html>