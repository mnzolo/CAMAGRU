<?php
    include  'crud.php';
    include  'connection.php';
    
    //session_start();

   // $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email1 = NULL;

    if ($username == NULL)
    {
        echo "Ivalid Username";
    }
    else if ($password == NULL)
    {
        echo "Invalid Password";
    }
    else
    {

        $password1 = hash("sha1", $password);

        /* $tables = new tables();
        $tables->create(); */
    
        $connection = new Insert();
        $conn = $connection->createconn();
    
        $creation = new User($email1,$username,$password1,$token,$conn);
        $creation->validate_user();
   
    /*
    if ($res == 0)
    {
        echo "login Error";
    }
    else
    {
        echo "Login Success";
    } */
}
?>