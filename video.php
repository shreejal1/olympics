<?php
require('header.php');
// echo $_SESSION['id'];
?>
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
        header('Location: video.php');
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

<iframe width="560" height="315" src="https://www.youtube.com/embed/zMFb8Y2QLPc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

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
                    echo "<input type='text' value='".$cmts['user']." said: ".$cmts['comment']."' disabled>";
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