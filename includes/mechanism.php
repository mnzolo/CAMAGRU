<?php
    include  'crud.php';
    
    //session_start();

   // $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $tables = new tables();
    $tables->create();

    $object = new Insert();
    $conn = $object->create();
    
    $creation = new User($username,$password,$conn);
    $res = $creation->create_user();

    if ($res == 0)
    {
        echo "login Error";
    }
    else
    {
        echo "Login Success";
    }
?>