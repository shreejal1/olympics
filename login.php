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
		<title>Login</title>
	</head>

	<body>
		<div class="centered">

			<h1 class="main-title">Login</h1>
			<div class="login-container">
				<form action="" method="POST" id="login-form">
					<input type="text" name="email" id="email" placeholder="Username or email" required/>
					<input type="password" name="password" id="password" placeholder="********" required/>

					<button type="submit" name="submitBtn" id="login-btn">Log in</button>
                    <br><a href="register.php">Register for new account</a>


				</form>
                <div class="links">
        <a href="./forgot-pass.php">Forgot Password?</a>
      </div>
                <?php
if(isset($_POST['submitBtn'])){
    unset($_POST['submitBtn']);
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = $pdo->query("select * from user where username = '$email' AND password = '$password'");
    $data = $sql->fetch();
    $rc = $sql->rowCount();
    if($rc > 0){
        header("Location: index.php");
    }
    else{
        echo "<h4 style='font-family:helvetica; color:#d42e11;'>Username or Password doesn't match, Try again.</h4>";
    }
}

?>
			</div>
		</div>


	</body>

</html>
