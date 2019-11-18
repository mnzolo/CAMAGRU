<?php
    include  'connection.php';
    
    $connection = new Insert();
    $conn = $connection->createconn();

    $sql = $conn->prepare("DELETE FROM IMAGES WHERE imgurl='$_GET[image]'");
    $sql->execute();

    $sqa = $conn->prepare("DELETE FROM COMMENTS WHERE imgurl='$_GET[image]'");
    $sqa->execute();

    $sqb = $conn->prepare("DELETE FROM LIKES WHERE imgurl='$_GET[image]'");
    $sqb->execute();

    header("location: ../uploadimage.php");
?>