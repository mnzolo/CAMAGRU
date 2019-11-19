<?php

    include  'crud.php';
    include  'connection.php';

    $comment = htmlspecialchars($_POST["comment"]);
    $imgurl = $_GET["image"];

    if($comment == NULL)
    {
        header("location: ../uploadimage.php");
    }
    else
    {
        $connection = new Insert();
        $conn = $connection->createconn();

        $com = new Comment($comment, $imgurl, $conn);
        $res = $com->addcom();

        $que = $conn->prepare("SELECT * FROM IMAGES WHERE imgurl='$imgurl'");
        $que->execute();
        $images = $que->fetchAll(PDO::FETCH_ASSOC);

        foreach($images as $key)
        {
            $userimage = $key["token"];
        }

        $objects = new fetch($conn,$userimage);
        $result = $objects->getstuff();
 
        $email = $result["email"];
        $notify = $result["notifications"];

        $username = $_SESSION["user"];

        if($res == 1)
        {
            
            if ($notify == '1')
            {
                mail("$email","CAMAGRU Notification","$username just Commented on your image");
                header("location: ../home.php");
            }
            else if($notify == '0')
            {
                header("location: ../home.php");
            }
        }
        else
        {
            echo "Error in server";
        }
    }
?>