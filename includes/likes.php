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

        
        if ($res == 1)
        {
            header("location: ../uploadimage.php");
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