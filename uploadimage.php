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

                $username = $_SESSION["user"];

                $sql="SELECT * FROM IMAGES WHERE token='$username'
                ";

                $result = $conn->query($sql);
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $images = $result->fetchall();

                $sqc="SELECT * FROM COMMENTS";

                $res = $conn->query($sqc);
                $res->setFetchMode(PDO::FETCH_ASSOC);
                $comments = $res->fetchall();

                $sqa="SELECT * FROM likes";

                $resu = $conn->query($sqa);
                $resu->setFetchMode(PDO::FETCH_ASSOC);
                $likes = $resu->fetchall();

                foreach($images as $value)
                {
                    echo "<div class='imagediv' ><img style='width:500px; height:500px' src='$value[imgurl]'></div>";
                    echo "<br>"."<br>";
                    $img = $value["imgurl"];
                    ?><div class='commentssection' ><?php
                    foreach($comments as $key)
                    {
                        if($img == $key["imgurl"])
                        {
                            echo "<div class='commentssection' ><p>$key[token]</p><hr><p>$key[comment]<p></div>";
                        }
                    }
                    ?></div>
                    <!-- <div class='commentssection'><P>$username<hr>$comment</div>"; -->
                    <form method="post" action="includes/comments.php?image=<?php echo $img ?>">
                            <input type="textarea" name="comment" placeholder="COMMENT">
                            <input type="submit" name="Comment" value="Comment">
                    </form>
                    <div class="likessection">
                    <form method="post" action="includes/likes.php?image=<?php echo $img ?>">
                            <input type="submit" name="like" value="Like">
                            <?php
                                foreach($likes as $key)
                                {
                                    $num = count($key["imgurl"]);
                                    if($img == $key["imgurl"])
                                    {
                                        echo "<span class='imgheart'>$num <img style='width:50px; height:50px' src='icons/like.svg'> this image </span>";
                                    }
                                }
                            ?>
                    </form>
                    </div>
                    <?php
                }
                ?>
        </div>
    </body>
</html>