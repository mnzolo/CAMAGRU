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
    <form method="post" action="includes/forgot.php">
        <input type="text" name="email" placeholder="PLEASE_ENTER_YOUR_EMAIL_">
        <input style="width:100px;background-color:green;" type="submit" name="emailsub" value="SEND_EMAIL_">
    </form>
    </body>
</html>