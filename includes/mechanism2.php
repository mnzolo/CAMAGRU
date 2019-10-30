<?php
     include  'crud.php';
    include  'connection.php';
   /*  include '../register.php'; */
    
    //session_start();

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password1'];
    $password2 = $_POST['password2'];

    if ($email == NULL)
    {
            echo "INVALID EMAIL";
            //header ("Location: ../register.php");
    }
        else if($username == NULL)
    {
            echo "INVALID USERNAME";
            //header ("Location: ../register.php");
    }
    else if($password == NULL)
    {
            echo "INVALID PASSWORD";
            //header ("Location: ../register.php");
    }

    else if ($password != $password2)
    {
        //header ("Location: ../register.php");
        echo "Please Enter Valid Passwords";
    }
    else
    {
        $email1 = hash("sha1",$email);
        $password1 = hash("sha1", $password);
        $token = substr($email1, 0 ,10);

        echo $token;
        /*
        $tables = new tables();
        $tables->create();
    
        $connection = new Insert();
        $conn = $connection->createconn();
    
        $creation = new User($email1,$username,$password1,$token,$conn);
        $res = $creation->create_user();

        if ($res == 1)
        {
            echo "Email Has been sent to account";
        } */
        /* if (!$res)
        {
            $error = "Invalid";
            include('../register.php');
        } */
    }
?>