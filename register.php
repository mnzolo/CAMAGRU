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
        <form method="post" align="center" action="includes/mechanism2.php">
            <div>
                <input type="text" name="email" placeholder="Please Enter Email">
            </div>
            <div>
                <input type="text" name="username" placeholder="Please Enter Username">
            </div>
            <div>
                <input type="password" name="password1" placeholder="Please Enter Password">
            </div>
                <input type="password" name="password2" placeholder="Please Confirm Password">
            </div>
            <div>
                <input style="width:100px;background-color:green;" type="submit" name="Register" value="Register">
            </div>
        </form>
        <?php
        require_once 'footer.php';
    ?>
    </body>
</html>