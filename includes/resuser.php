<?php

    include  'crud.php';
    include  'connection.php';

    $username = $_POST["user1"];
    $username1 = $_POST["user2"];
    $token = NULL;
    $email = $username;
    $password = $username1;

    $connection = new Insert();
    $conn = $connection->createconn();

    $forgot = new forgets($conn,$email,$token,$password);
    $res = $forgot->updateuser();

    if ($res == 1)
    {
        echo "User successfully updated";
    }
    else
    {
        echo "Invalid Username"; 
    }
?>