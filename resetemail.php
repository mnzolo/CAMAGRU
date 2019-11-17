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
    <body>
        <form>
            <input type="text" name="email">
            <p>Send_Reset_Email_ :</p><input class="put" type="submit" name="Sendemail_">
            <p>Return_to_LOG_IN_ :</p><input class="put" type="submit" name="LOG_IN_">
        </form>
        <?php
        require_once 'footer.php';
    ?>
    </body>
<html>