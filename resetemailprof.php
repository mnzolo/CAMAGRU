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
        <form method="post" action="includes/profmail.php">
        <input type="text" name="email1" placeholder="Please ENTER OLD EMAIL">
        <input type="text" name="email2" placeholder="Please ENTER NEW EMAIL">
        <input style="width:100px;background-color:green;" type="submit" name="UPDATE_EMAIL_" value="UPDATE_EMAIL_">
        </form>
        <?php
        require_once 'footer.php';
    ?>
    </body>
</html>