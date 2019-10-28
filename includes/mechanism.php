<?php
    include  'crud.php';
    include  'connection.php';
    
    //session_start();

   // $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $tables = new tables();
    $tables->create();
    
    $connection = new Insert();
    $conn = $connection->createconn();
    
    $creation = new User($username,$password,$conn);
    $creation->create_user();
   
    /*
    if ($res == 0)
    {
        echo "login Error";
    }
    else
    {
        echo "Login Success";
    } */
?>