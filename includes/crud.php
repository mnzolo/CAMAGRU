<?php

    class   Insert{
    protected $DB_DSN;
    protected $DB_USER;
    protected $DB_PASSWORD;

        public function __construct()
        {
            $this->DB_DSN = "localhost";
            $this->DB_USER = "root";
            $this->DB_PASSWORD = "123456";
        }

        public function createconn()
        {
            try{
                    $conn = new PDO("mysql:host=$this->DB_DSN;dbname=CAMAGRU;", $this->DB_USER, $this->DB_PASSWORD);

                    $conn->setAttribute(PDO:: ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    

                    return $conn;
                }
            catch(PDOEXCEPTION $e)
                {
                    echo "ERROR:".$e->getMessage();
                }
        }
}


class User {
    
    protected $conn;
    //protected $email;
    protected $username;
    protected $password;

    public function __construct($username,$password,$conn)
    {  
        $this->conn = $conn;
        //$this->email = $email;
        $this->username = $username;
        $this->password = $password;
    }
    
     public function create_user()
    {
        /* if ($this->username == NULL || $this->password == NULL)
        {
            return (0);
        }
        else
        { */
            //$sql="SELECT username FROM USERS";
            ///* $result = */ $this->conn->exec($sql);

            //echo/*  print_r($result); */ "tables";
            /* foreach ($result as $value)
            {
                if ($value = $this->username)
                {
                    return (0);
                }
            }
            */

            $sql="INSERT INTO USERS (email,username,passwords)
                VALUES ('mnzolo@gmail.com',$this->username,$this->password)
            ";
            $this->conn->exec($sql);

            //return (1);
    //}
    }

    /* public function Read()
    {
       $result = $this->conn->exec("query");
        ehco "result";
    }

    public function Update()
    {
        $this->conn->exec("query");
        echo "update";
    }

    public function Delete()
    {
        $this->conn->exec("query");
        echo "deleted";
    } */
}

class Tables{


    protected $DB_DSN;
    protected $DB_USER;
    protected $DB_PASSWORD;

        public function __construct()
        {
            $this->DB_DSN = "localhost";
            $this->DB_USER = "root";
            $this->DB_PASSWORD = "123456";
        }

        public function create()
        {
            try{
                    $conn = new PDO("mysql:host=$this->DB_DSN;dbname=CAMAGRU;", $this->DB_USER, $this->DB_PASSWORD);

                    $conn->setAttribute(PDO:: ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                    $sql="CREATE TABLE IF NOT EXISTS USERS(
                        id INT(10) AUTO_INCREMENT PRIMARY KEY,
                        email varchar(50) NOT NULL,
                        username varchar(50) NOT NULL,
                        passwords varchar(50) NOT NULL
                    )";

                    $conn->exec($sql);
                }
            catch(PDOEXCEPTION $e)
                {
                    echo "ERROR:".$e->getMessage();
                }

                $conn = null;
        }
}
