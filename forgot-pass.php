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
    <title>Account Recovery</title>
  </head>

  <body>
    <div class="centered">
    <a href="./index.php" class="login-btn">Exit</a>
    <h1 class="main-title">Account Recovery</h1>
      <!-- <div class="image-container">
        <img src="./logo.jpg" />
      </div> -->

    <div class="container">
    <div class="login-container">
      
        
</div>
    </div>
    <?php
        if(isset($_POST['submitBtn'])){
            // unset($_POST['submitBtn']);
            $email = $_POST['email'];
            $sql = $pdo->query("select * from user where username = '$email'");
            $rd = $sql->fetch();
            $rc = $sql->rowCount();
            if($rc > 0){
                echo '<form action="" method="POST" id="login-form">
					<br><input type="text" name="email" id="email" value="'.$rd['username'].'" hidden/>
          <input type="text" name="ques" id="ques" value="'.$rd['squestion'].'" disabled/>
					<input type="text" name="ans" id="ans" placeholder="Answer" required/>
          

					<button type="submit" name="verify" id="login-btn">Verify</button>
          <br><a href="./forgot-pass.php" class="login-btn" style="margin-right:5px; margin-left:5px;">Not my account, search again</a>
				</form>';
                
            }
            else{
                echo "No any account matched, try again.";
                echo '<form action="" method="POST" id="login-form">
					<input type="text" name="email" id="email" placeholder="Username or email" required/>
					<button type="submit" name="submitBtn" id="login-btn">Search Account</button>
				</form>';
            }
        }
        else{
        
    if(!isset($_POST['submitBtn'])){
				echo '<form action="" method="POST" id="login-form">
					<input type="text" name="email" id="email" placeholder="Username or email" required/>
					<button type="submit" name="submitBtn" id="login-btn">Search Account</button>
				</form>';
    }    
        }
        if(isset($_POST['verify'])){
          unset($_POST['verify']);
          $email = $_POST['email'];
          $sql = $pdo->query("select * from user where username = '$email'");
          $rd = $sql->fetch();
          if(strtolower($_POST['ans']) == strtolower($rd['sanswer'])){
            echo "<script>window.location.href='register.php?id=$email'</script>";
              // header("Location: register.php?id=$email");
              exit();
          }
          else{
            echo "Answer didn't match";
          }
        }

    ?>
    </div>

  </body>

</html>