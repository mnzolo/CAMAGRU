<?php
   include  'includes/connection.php';
   session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>CAMAGRU</title>
        <link rel="stylesheet" href="css/login.css">
        <h1 align="center" >Image_Maker_</h1>
        <hr>
    </head>
    <body style="background-color:white;">
    <form method="post" enctype="multipart/form-data" action="includes/uploads.php">
        <div>
            <input style="background-color: green" type="file" name="takeimage">
        </div>
        <div>
            <input style="background-color: green" type="submit" name="uplaodimages"   value="uplaodimages">
        </div>
    </form>
    <div>
        <?php

                $connection = new Insert();
                $conn = $connection->createconn();

                $username = $_SESSION["User"];

                $sql="SELECT * FROM IMAGES WHERE token='$username'
                ";

                $result = $conn->query($sql);
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $images = $result->fetchall();

                print_r($images);

        ?>
    </div>
    </body>
</html>