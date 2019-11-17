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
        <input type="text" name="password1" placeholder="Please Enter Password">
        <input type="text" name="password2" placeholder="Please Confirm Password">
        <input style="width:100px;background-color:green;" type="submit" name="Register" value="reset">
    </form>
    <?php
        require_once 'footer.php';
    ?>
    </body>
</html>