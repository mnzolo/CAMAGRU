<?php
    include 'crud.php';
    include 'connection.php';

    $email1 = $_POST["email"]; 
    $oldpassword = $_POST["OLD_PASSWORD"];
    $newpassword = $_POST["NEW_PASSWORD"];
    $username = NULL;
    $token = NULL;

    if ($email1 == NULL)
    {
            echo "INVALID EMAIL";
    }
    else if($oldpassword == NULL)
    {
            echo "INVALID OLD_PASSWORD";
    }
    else if($newpassword == NULL)
    {
            echo "INVALID NEW_PASSWORD";
    }
    else
    {
        $connection = new Insert();
        $conn = $connection->createconn();
        
        $creation = new User($email1,$username,$oldpassword,$token,$conn,$newpassword);
        $res = $creation->reset_user();

        if ($res == 1)
        {
                echo "Successful Reset Go to login";
        }
        else
        {
                echo ("INvalid USER DETAILS");
        }
    }
?>