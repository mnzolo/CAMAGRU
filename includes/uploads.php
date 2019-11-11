<?php

include  'crud.php';
include  'connection.php';


    $upload_dir = "../uploads/";
    $upload_path = $upload_dir.basename($_FILES["takeimage"]["name"]).time();
    $unique = basename($_FILES["takeimage"]["name"]).time();
    
    if (getimagesize($_FILES["takeimage"]["tmp_name"]))
    {
        if(move_uploaded_file($_FILES["takeimage"]["tmp_name"], $upload_path))
        {
            echo "image uploaded successfully";
            echo "<img style='width:500px;height:400px;' src='$upload_path'>";
            
            $connection = new Insert();
            $conn = $connection->createconn();
            
            $upload_path = "uploads/".$unique;

            $add = new image($conn,$upload_path);
            $res = $add->uploadpics();

            if ($res == 1)
            {
                header("location: ../uploadimage.php");
            }
            else
            {
                echo "Error In Image FORMAT";
            }
        }
        else
        {
            echo "Image overwritten";
        }
    }
    else
    {
           echo "image not succeefully uploaded";
    }
?>