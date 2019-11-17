<?php

include  'crud.php';
include  'connection.php';

    if($_GET["image"] == NULL)
    {
        header("location: ../uploadimage.php");
    }
    if($_POST["like"] == "Like")
    {
        $connection = new Insert();
        $conn = $connection->createconn();


        $com = new like($_POST["like"], $_GET["image"], $conn);
        $res = $com->addlike();

        $ques = $conn->prepare("SELECT * FROM IMAGES WHERE imgurl='$_GET[image]'");
        $ques->execute();
        $images = $ques->fetchAll(PDO::FETCH_ASSOC);

        foreach($images as $key)
        {
            $userimage = $key["token"];
        }

        $objects = new fetch($conn,$userimage);
        $result = $objects->getstuff();

        $email = $result["email"];
        $notify = $result["notifications"];

        $username = $_SESSION["user"];


        if ($res == 1)
        {
            if ($notify == '1')
            {
                mail("$email","CAMAGRU Notification","$username just Liked your image");
                header("location: ../uploadimage.php");
            }
            else if($notify == '0')
            {
                header("location: ../uploadimage.php");
            }
        }
        else
        {
            echo "Error";
        }
    }
    else
    {
        header("location: ../uploadimage.php");
    }
?>