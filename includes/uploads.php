<?php
    $upload_dir = "uploads/";
    $upload_path = $upload_dir.basename($_FILE$S["takeimage"]["tmp_name"]);

    if ($_POST["takeimage"] == "uploadimage")
   {
       if (getimagesize($_FILES["takeimage"]["tmp_name"]))
       {
            move_uploaded_file($_FILES["takeimage"]["tmp_name"], $uploadpath);
            echo "Image uploaded successfully";
       }
       else
       {
           echo "image not succeefully uploaded";
       }
   }
?>