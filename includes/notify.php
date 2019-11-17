<?php

    session_start();

    include  'connection.php';

    if($_POST["notify"] == NULL)
    {
        header("location: ../profile.php");
    }
    else if($_POST["notify"] == "YES_NOTIFY")
    {
        $connection = new Insert();
        $conn = $connection->createconn();

        $result = $conn->prepare("UPDATE USERS SET Notifications='1' WHERE username='$_SESSION[user]'");
        $result->execute();

        header("location: ../profile.php");
    }
    else if ($_POST["notify"] == "NO_NOTIFY")
    {
        $connection = new Insert();
        $conn = $connection->createconn();

        $result = $conn->prepare("UPDATE USERS SET Notifications='0' WHERE username='$_SESSION[user]'");
        $result->execute();

        header("location: ../profile.php");
    }
?>