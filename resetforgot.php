<?php
    $token = $_GET["token"];
?>

<!DOCTYPE html>
<html>
<head>
        <title>CAMAGRU</title>
        <link rel="stylesheet" href="css/login.css">
        <div class="NavBar">
            <a href="index.php">HOME</a>
            <a href="home.php">Gallery</a>
            <a href="uploadimage.php">Uplaod</a>
            <a href= "profile.php">Profile</a>
            <a href= "camera.php">Camera</a>
            <a href="logout.php" >LogOut</a>
        </div>
        <hr>
    </head>
    <body style="background-color: white">
    <form method="post" action="includes/resetf.php">
        <input type="hidden" name="token" value="$token">
        <input type="password" name="password1" placeholder="Please Enter Password" minlength="6" pattern="(?=\S*\d)(?=\S*[a-z])(?=\S*[A-Z])\S*" title="password must contain at least 1 uppercase, lowercase, digit, special character">
        <input type="password" name="password2" placeholder="Please Confirm Password" minlength="6" pattern="(?=\S*\d)(?=\S*[a-z])(?=\S*[A-Z])\S*" title="password must contain at least 1 uppercase, lowercase, digit, special character">
        <input style="width:100px;background-color:green;" type="submit" name="Register" value="reset">
    </form>
    <?php
        require_once 'footer.php';
    ?>
    </body>
</html>