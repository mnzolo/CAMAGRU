<?php
class User{
    public $username;
 
    public function __construct($name)
    {   
        $this->username=$name;
    }
    public function setName($username)
    {
        $this->username = $username;
    }
}
   // require 'tablecreation.php';

    /* session_start();

    if ($_POST["email"] != NULL && $_POST["password"] != NULL)
    {
        $_SESSION["user"] = "logged in";
        echo "well done";
    }

    session_close(); */
    
?> 