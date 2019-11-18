<?php
    //register
     include  'crud.php';
    include  'connection.php';
   /*  include '../register.php'; */
    
    //session_start();

    $email = htmlspecialchars($_POST['email']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password1']);
    $password2 = htmlspecialchars($_POST['password2']);

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
        $email1 = $email;
        $password1 = password_hash($password, PASSWORD_DEFAULT);
        $token = substr(sha1($email), 0 ,10);
          
        $connection = new Insert();
        $conn = $connection->createconn();
        
        $creation = new User($email1,$username,$password1,$token,$conn,$password2);
        $res = $creation->create_user();
        
        if ($res == 1)
        {
            $sentemail = mail("$email1","Email Verification CAMAGRU", "click on the link to Verify <a href='http://localhost:8080/CAMAGRU/confirmemail.php?token=$token&&user=$username'>Account</a>");
            
            if ($sentemail)
            {
                echo "Email Has been sent to account";
            }
            else 
            {
                echo "Email Not Sent";
            }
        }

        /* if (!$res)
        {
            $error = "Invalid";
            include('../register.php');
        } */
    }
?>