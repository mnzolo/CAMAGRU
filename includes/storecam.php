<?php
    $imgd = $_POST["data"];

    $filename = "../Images/".time()."newpic.png";
    $imgd = str_replace('data:image/png;base64,', '', $imgd);
    $imgd = str_replace(' ', '+', $imgd);
    
    $filedata = base64_decode($imgd);

    if(file_put_contents($filename,$filedata))
    {
        echo "<img src='$filename'>";
    }
?>