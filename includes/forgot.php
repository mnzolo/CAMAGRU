<?php

    include  'crud.php';
    include  'connection.php';

    $email = $_POST["email"];

    if ($email == NULL)
    {
        echo "Invalid Email";
    }
    else
    {
        $connection = new Insert();
        $conn = $connection->createconn();

        $forgot = new forgrts($conn,$email);
        $res = $forgot->gorgetting();
    }
?>