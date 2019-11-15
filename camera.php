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
        
        <select id="sticker">
                <option name="soccerball" value="soccerball">soccerball</option>
                <option name="Nike" value="Nike">Nike</option>
                <option name="Adidas" value="Adidas">Adidas</option>
                <option name="Puma" value="Puma">Puma</option>
                <option name="Reebok" value="Reebok">Reebok</option>
                <option name="Jordan" value="Jordan">Jordan</option>
        </select>
        
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

    document.getElementById("savingdata").value = canvas.toDataURL("images/png");
});

    var img = document.getElementById("image");

document.getElementById("sticker").addEventListener("click", function() {
	context.drawImage(img, 0, 0, 40, 50);
});

/*
    var image = dataURL.getImageData();

    document.getElementById("Snap").addEventListener("click", function() {
	context.drawImage(video, 0, 0, 325, 150);

}); */

</script>