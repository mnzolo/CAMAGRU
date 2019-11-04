<?php
    include  'crud.php';
    include  'connection.php';

    session_start();

    $fetch = new Insert();
    $conn = $fetch->create_conn();
    
    $objects = new fetch($conn);
    $result = $objects->getstuff();

    $conn = null;
?>