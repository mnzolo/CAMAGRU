<?php
   include  'includes/connection.php';
   session_start();

   if($_SESSION["login"] != "True")
   {
       header("location: index.php");
   }

//   echo $_POST["data"];
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
                    width: 600px;
                    height: 600px;
                }

                .canvas1{
                    width: 400px;
                    height: 400px;
                    border: 7px black solid;
                    margin-left: 0px;
                    border-radius: 5px;
                    background-color: gray;
                }
                .imagesblock{
                    background-color: green;
                }
                .stickerblock
                {
                    width: 200px;
                    height:150px;
                }
        </style>
    </head>
    <body style="background-color: white">
    <div align="center" style="background-color: gray;width: 500px;height: 500px;border: 7px black solid; border-radius: 5px; margin-left:15px;">
        <video id="videocam" autoplay="true">
        </video>
        <?php
            echo "<br>"."<br>";
        ?>
        
        <button id="Snap">Capture Image</button>
        
        <?php
            echo "<br>"."<br>";
        ?>
        <p>Stickers_</p>
        <div class="imagesblock">
                   <button id="stick"><img id="stickerimg"class="stickerblock" src="stickers/soccerball.jpg" alt="soccerball"></button>
                    <button id="stick1"><img id="stickerimg1" class="stickerblock" src="stickers/Nike.png" alt="Nike"></button>
                    <button id="stick2"><img id="stickerimg2" class="stickerblock" src="stickers/Nike2.png" alt="Nike2"></button>
                    <button id="stick3"><img id="stickerimg3" class="stickerblock" src="stickers/adidas.jpg" alt="adidas"></button>
        </div>
        <?php
            echo "<br>"."<br>";
        ?>

        <canvas id="canvas" class="canvas1"></canvas>
        <?php
            echo "<br>"."<br>";
        ?>
        <form action="includes/storecam.php" method="post">
        <input id="savingdata" name="data" type="hidden">
        <input id="Save" type="submit" value="Save">
        </form>
    <div>
    </body>
</html>
<script>
    var video = document.querySelector("#videocam");
    const canvas = document.getElementById("canvas");
    /* var snap = document.getElementById("snap"); */

    async function init()
    {            
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
    }

    init();

    var context = canvas.getContext('2d');

    document.getElementById("Snap").addEventListener("click", function() {
	context.drawImage(video, 0, 0, 325, 150);    
});

document.getElementById("stick").addEventListener("click", function() {
    context.drawImage(document.getElementById("stickerimg"), 0, 0, 70, 80);
    
    document.getElementById("savingdata").value = canvas.toDataURL("images/png");
});

document.getElementById("stick1").addEventListener("click", function() {
    context.drawImage(document.getElementById("stickerimg1"), 0, 0, 70, 80);
    
    document.getElementById("savingdata").value = canvas.toDataURL("images/png");
});

document.getElementById("stick2").addEventListener("click", function() {
    context.drawImage(document.getElementById("stickerimg2"), 0, 0, 70, 80);
    
    document.getElementById("savingdata").value = canvas.toDataURL("images/png");
});

document.getElementById("stick3").addEventListener("click", function() {
    context.drawImage(document.getElementById("stickerimg3"), 0, 0, 70, 80);
    
    document.getElementById("savingdata").value = canvas.toDataURL("images/png");
});

/*
    var image = dataURL.getImageData();

    document.getElementById("Snap").addEventListener("click", function() {
	context.drawImage(video, 0, 0, 325, 150);

}); */

</script>