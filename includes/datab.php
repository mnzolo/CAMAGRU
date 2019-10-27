<?php
    include 'dbconnection.php';

    $open = new connect();
    $create = $open->network();
    $sql="CREATE DATABASE IF NOT EXISTS CAMAGRU";
    $create->exec($sql);
?>