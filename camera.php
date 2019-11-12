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
            <a href="index.php">HOME</a>
            <a href="home.php">Gallery</a>
            <a href="uploadimage.php">Uplaod</a>
            <a href= "profile.php">Profile</a>
            <a href= "camera.php">Camera</a>
            <a href="logout.php" >LogOut</a>
        </div>
        <hr>
        <style>
                #videocam
                {
                    width: 500px;
                    height: 500px;
                }
                .camcont
                {
                    background-color: gray;
                    width: 500px;
                    height: 500px;
                }
        </style>
    </head>
    <body style="background-color: white">
    <div align="center" style="background-color: gray;width: 500px;height: 500px;border: 7px black solid; border-radius: 5px;">
        <video id="videocam" autoplay="true">
        </video>
        <?php
            echo "<br>"."<br>";
        ?>
        <form action="#">
            <input align="left" style="width: 100px; height: 50px;" type="submit" name="capture" value="Capture Image">
        </form>
        <form action="#">
            <input align="left" style="width: 100px; height: 50px;" type="submit" name="stickers" value="stickers">
        </form>
    <div>
    </body>
</html>
<script>
    var video = document.querySelector("#videocam");

    if(navigator.mediaDevices.getUserMedia)
    {
        navigator.mediaDevices.getUserMedia({video: true})
        .then(function(stream)
        {
            video.srcObject = stream;
        })
        .catch(function (err0r) {
        console.log("Something went wrong!");
        });
    }
</script>