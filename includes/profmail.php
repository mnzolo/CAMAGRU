<?php

    include  'crud.php';
    include  'connection.php';

    $email = $_POST["email1"];
    $email2 = $_POST["email2"];
    $token = NULL;
    $password = $email2;

    if ($email == NULL || $email2 == NULL)
    {
        echo "Invalid Email Address";
    }
    else
    {
        $connection = new Insert();
        $conn = $connection->createconn();
        
        $forgot = new forgets($conn,$email,$token,$password);
        $res = $forgot->updateemail();
        
        $token = $res["token"];
        $username = $res["user"];

        if ($res != NULL)
        {
            $send = mail("$email2","CAMAGRU EMAIL VERIFICATION","CAMAGRU EMAIL VERIFY <a href='http://localhost:8080/CAMAGRU/confirmemail.php?token=$token&&user=$username'>Account</a>");

            if ($send)
            {
                echo "EMAIL HAS BEEN SENT";
            }
            else
            {
                echo "INVALID EMAIL";
            }
        }
        else if ($res == 0)
        {
            echo "INVALID EMAIL NOT REGISTERED";
        }
    }
?>