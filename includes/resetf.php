<?php
   include  'crud.php';
   include  'connection.php';

    $email = NULL;
    $password = htmlspecialchars($_POST["password1"]);
    $password1 = htmlspecialchars($_POST["password2"]);
    $token = htmlspecialchars($_POST["token"]);     
    if($password != $password1)
    {
        echo "please enter valid passwords";
    }
    else if($token == NULL)
    {
        echo "Invalid link";
    }
    else
    {
        $connection = new Insert();
        $conn = $connection->createconn();
        
        $forgot = new forgets($conn,$email,$token,$password);
        $res = $forgot->gorgetting();
        
        if($res = $token)
        {
            $ret = $forgot->updatepass();
            if ($ret == 1)
            {
                echo "Successful password reset";
            }
            else
            {
                echo "Incorrect link in use";
            }
        }
    }
?>
