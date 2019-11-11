<?php
   include  'includes/connection.php';
   session_start();
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
    <hr>
</head>
<body style="background-color: white">
    <div>
        <div>
            <?php

                $connection = new Insert();
                $conn = $connection->createconn();

                $sql="SELECT * FROM IMAGES
                ";

                $result = $conn->query($sql);
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $images = $result->fetchall();

                foreach($images as $value)
                {
                    echo "<div class='imagediv' ><img style='width:500px; height:500px' src='$value[imgurl]'></div>";
                    echo "<br>"."<br>";
                }
            ?>
        </div>
        <form method="post">
                <input type="textarea" name="comment" placeholder="COMMENT">
        </form>
        <form method="post">
                <input type="submit" name="like" value="Like">
        </form>
        <div id="commentssection">
                
        <div>
    </div>
</body>
</html>