<?php
    include 'includes/datab.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>CAMAGRU</title>
        <link rel="stylesheet" href="css/login.css">
        <div class="NavBar">
            <a>HOME</a>
            <a>Gallery</a>
            <a>Uplaod</a>
            <a>Profile</a>
            <a>LogOut</a>
        </div>
        <hr>
    </head>
    <body style="background-color:white;">
        <form method="post" align="center" action="includes/mechanism.php">
            <div>
                <input type="text" name="username" placeholder="Please Username">
            </div>
            <div>
                <input type="text" name="password" placeholder="Please Password">
            </div>
            <div>
                <input style="width:100px;background-color:green;" type="submit" name="LOG_IN_" value="LOG_IN_">
            </div>
        </form>
        <form action="register.php">
                <input style="width:100px;background-color:green;" type="submit" name="Register_" value="Register">
        </form>
        <form method="post" action="forgotpassword.php">
            <div>
                <input style="width:100px;background-color:green;" type="submit" name="Send Password Reset Email" value="forgot password">
            </div>
        </form>
    </body>
</html>