<?php
    session_start();
    include 'includes/datab.php';

    if($_SESSION["login"] == "True")
    {
        header("location: home.php");
    }
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
    <body style="background-color:white;">
        <form method="post" align="center" action="includes/mechanism.php">
            <div>
                <input type="text" name="username" placeholder="Please Username">
            </div>
            <div>
                <input type="password" name="password" placeholder="Please Password" minlength="6" pattern="(?=\S*\d)(?=\S*[a-z])(?=\S*[A-Z])\S*" title="password must contain at least 1 uppercase, lowercase, digit, special character">
            </div>
            <div>
                <input style="width:100px;background-color:green;" type="submit" name="LOG_IN_" value="LOG_IN_">
            </div>
        </form>
        <form align="center" action="register.php">
                <input style="width:100px;background-color:green;" type="submit" name="Register_" value="Register">
        </form>
        <form align="center" method="post" action="forgotpassword.php">
            <div>
                <input style="width:100px;background-color:green;" type="submit" name="Send Password Reset Email" value="forgot password">
            </div>
        </form>
    <?php
        require_once 'footer.php';
    ?>
    </body>
</html>