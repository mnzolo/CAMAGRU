<?php

    include  'crud.php';
    include  'connection.php';

    $email = $_POST["email"];
    $password = NULL;
    $token = NULL;

    if ($email == NULL)
    {
        echo "Invalid Email";
    }
    else
    {
        $connection = new Insert();
        $conn = $connection->createconn();

        $forgot = new forgets($conn,$email,$token,$password);
        $res = $forgot->gorgetting();

        if ($res != NULL)
        {
            $sent = mail("$email","FORGOT PASSWORD CAMAGRU","click on the link to create a new <a href='http://localhost:8080/CAMAGRU/resetforgot.php?token=$res'>password<a/>");
            if($sent)
            {
                echo "Email Sent Check your Email";
            }
            else
            {
                echo "Invalid email";
            }
        }
        else if($res == 0)
        {
            echo "EMAIL ADDRESS NOT REGISTERED";
        }
    }
?>