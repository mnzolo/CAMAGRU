<?php
   include  'includes/connection.php';
   session_start();

   if($_SESSION["login"] != "True")
   {
       header("location: index.php");
   }
?>

<!DOCTYPE html>
<html>
<head>
        <title>CAMAGRU</title>
        <link rel="stylesheet" href="css/login.css">
        <div class="NavBar">
            <a href="home.php">HOME</a>
            <a href="uploadimage.php">Uplaod</a>
            <a href= "profile.php">Profile</a>
            <a href= "camera.php">Camera</a>
            <a href="logout.php" >LogOut</a>
        </div>
        <hr>
    </head>
    <body style="background-color: white">
    <div align="center" style="background-color: gray;width: 500px;height: 500px;border: 7px black solid; border-radius: 5px;">
        <video id="videocam" autoplay="true">
        </video>
    <div>
    </body>
</html>
<script>
    var video = document.querySelector("#videocam");
</script>