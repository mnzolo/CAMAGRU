<?php
   include  'includes/connection.php';
   session_start();
   $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
   $perpage = ($page > 1) ? ($page * 5) : 5;
   $sub = 5;
   $start = ($page > 1) ? (($page * 5) - $sub) : 0;
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
<div>
            <?php

                $connection = new Insert();
                $conn = $connection->createconn();

                $sql="SELECT * FROM IMAGES
                    LIMIT $start, {$perpage}
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
                    <?php
                        if ($_SESSION["login"] == "True")
                        {
                    ?>
                    <form method="post" action="includes/comments.php?image=<?php echo $img ?>">
                            <input type="textarea" name="comment" placeholder="COMMENT">
                            <input type="submit" name="Comment" value="Comment">
                    </form>
                    <div class="likessection">
                    <form method="post" action="includes/likes.php?image=<?php echo $img ?>">
                            <input type="submit" name="like" value="Like">
                            </form>
                        <?php
                        }
                        ?>
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
                    </div>
                    <?php
                }
                ?>
        </div>
</body>
</html>