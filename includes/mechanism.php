<?php
    //login
    include  'crud.php';
    include  'connection.php';
    
    session_start();

   // $email = $_POST['email'];
    $username = $_POST['username'];
    $password1 = $_POST['password'];
    $email1 = NULL;
    $token = NULL;
    $newpassword = NULL;

    if ($username == NULL)
    {
        echo "Ivalid Username";
    }
    else if ($password1 == NULL)
    {
        echo "Invalid Password";
    }
    else
    {
        /* $tables = new tables();
        $tables->create(); */
    
        $connection = new Insert();
        $conn = $connection->createconn();

        $creation = new User($email1,$username,$password1,$token,$conn,$newpassword);
        $res = $creation->validate_user();

    if ($res == 0)
    {
        echo "login Error";
    }
    else
    {
        $_SESSION["user"] = $username;
        $_SESSION["password"] = $password1;
        header("location: ../profile.php");
    }
}
?>