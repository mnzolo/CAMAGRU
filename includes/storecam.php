<?php

    include  'crud.php';
    include  'connection.php';


    $imgd = $_POST["data"];

    $filename = "../Images/".time()."newpic.png";
    $imgd = str_replace('data:image/png;base64,', '', $imgd);
    $imgd = str_replace(' ', '+', $imgd);
    
    $filedata = base64_decode($imgd);

    if(file_put_contents($filename,$filedata))
    {
            $connection = new Insert();
            $conn = $connection->createconn();
            
            $len = strlen($filename);

            $upload_path = substr($filename,"3", "$len");

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
        echo "Error";
    }
?>