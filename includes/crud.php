<?php
include 'includes/dbconnection.php';


class User{
    protected $conn;
    
    /* protected $email;
    protected $username;
    protected $password;
    */
    public function __construct()
    {   
        $this->conn = new connect();
    }

    public function create_database()
    {
        $sql="CREATE DATABASE CAMAGRU";
        $this->conn->exec($sql);
    }
    /*
    public function setName($username)
    {
        $this->username = $username;
    } */
}   
?> 