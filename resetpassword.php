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
        <form method="post" action="includes/mechanism3.php">
            <div>
            <input type="text" name="email" placeholder="Please Enter Email">
            </div>
            <div>
            <input type="password" name="OLD_PASSWORD" placeholder="Please Enter OLD_PASSWORD" minlength="6" pattern="(?=\S*\d)(?=\S*[a-z])(?=\S*[A-Z])\S*" title="password must contain at least 1 uppercase, lowercase, digit, special character">
            </div>
            <div>
            <input type="password" name="NEW_PASSWORD" placeholder="Please Enter NEW_PASSWORD" minlength="6" pattern="(?=\S*\d)(?=\S*[a-z])(?=\S*[A-Z])\S*" title="password must contain at least 1 uppercase, lowercase, digit, special character">
            </div>
            <div>
            <input style="width:100px;background-color:green;" type="submit" name="Reset" value="Reset_">
            </div>
        </form>
        <?php
        require_once 'footer.php';
    ?>
    </body>
</html>