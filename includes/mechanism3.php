<?php
    include 'crud.php';
    include 'connection.php';

    $email = $_POST['email']; 
    $olspassword = $_POST['OLD_PASSWORD'];
    $newpassword = $_POST['NEW_PASSWORD'];

    if ($email == NULL)
    {
            echo "INVALID EMAIL";
    }
    else if($username == NULL)
    {
            echo "INVALID USERNAME";
    }
    else if($password == NULL)
    {
            echo "INVALID PASSWORD";
    }
    else
    {
        $connection = new Insert();
        $conn = $connection->createconn();
        
        $creation = new User($email1,$username,$password1,$token,$conn);
        $res = $creation->reset_user();
    }
?>