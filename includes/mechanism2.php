<?php
     include  'crud.php';
    include  'connection.php';
    
    //session_start();

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password1'];
    $password2 = $_POST['password2'];

    if ($password != $password2)
    {
        //header ("Location: ../register.php");
        echo "Please Enter Valid Passwords";
    }
    else
    {
        $tables = new tables();
        $tables->create();
    
        $connection = new Insert();
        $conn = $connection->createconn();
    
        $creation = new User($email,$username,$password,$conn);
        $res = $creation->create_user();

        echo $res;
    }
?>