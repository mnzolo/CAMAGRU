<?php

    include 'includes/connection.php';
    include 'includes/crud.php';

    $token = $_GET['token'];
    $username = $_GET['user'];
    $email1 = "True";
    $password1 = "true";
    $password2 = NULL;

    $connection = new Insert();
    $conn = $connection->createconn();

    $creation = new User($email1,$username,$password1,$token,$conn,$password2);
    $res = $creation->validation();
?>