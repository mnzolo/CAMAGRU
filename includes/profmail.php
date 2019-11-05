<?php
    $email1 = $_POST["email1"];
    $email2 = $_POST["email2"];
    $token = NULL;
    $password = $email2;

    if ($email1 == NULL || $email2 == NULL)
    {
        echo "Invalid Email Address";
    }
    else
    {
        $connection = new Insert();
        $conn = $connection->createconn();
        
        $forgot = new forgets($conn,$email,$token,$password);
        $res = $forgot->updateemail();

        if ($res != NULL)
        {
            $send = mail("$email2","CAMAGRU EMAIL VERIFICATION","CAMAGRU EMAIL VERIFY <a href='http://localhost:8080/crud/confirmemail.php?token=$token&&user=$username'>Account</a>");
        }
        else if ($res == 0)
        {
            echo "INVALID EMAIL NOT REGISTERED";
        }
    }
?>