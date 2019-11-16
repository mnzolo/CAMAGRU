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

        if($res == 1)
        {
            header("location: ../uploadimage.php");
        }
        else
        {
            echo "Error in server";
        }
    }
?>