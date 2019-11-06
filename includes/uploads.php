<?php
    $upload_dir = "../uploads/";
    $upload_path = $upload_dir.basename($_FILES["takeimage"]["name"]);

    if (getimagesize($_FILES["takeimage"]["tmp_name"]))
    {
        if(move_uploaded_file($_FILES["takeimage"]["tmp_name"], $upload_path))
        {
            echo "image uploaded successfully";
            echo "<img style='width:500px;height:400px;' src='$upload_path'>";
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