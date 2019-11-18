<?php

    include  'crud.php';
    include  'connection.php';

    $username = htmlspecialchars($_POST["user1"]);
    $username1 = htmlspecialchars($_POST["user2"]);
    $token = NULL;
    $email = $username;
    $password = $username1;

    $connection = new Insert();
    $conn = $connection->createconn();

    $forgot = new forgets($conn,$email,$token,$password);
    $res = $forgot->updateuser();

    if ($res == 1)
    {
        $_SESSION["user"] = $username1;
        echo "User successfully updated";
    }
    else
    {
        echo "Invalid Username"; 
    }
?>