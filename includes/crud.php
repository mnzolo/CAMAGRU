<?php

class User{
    
    protected $conn;
    //protected $email;
    protected $username;
    protected $password;

    public function __construct($email,$username,$password,$conn)
    {  
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->conn = $conn;
    }
    
     public function create_user()
    {
        if ($this->email == NULL)
        {
            echo "INVALID EMAIL";
            //header ("Location: ../register.php");
            return (0);
        }
        else if($this->username == NULL)
        {
            echo "$this->username";
            echo "INVALID USERNAME";
            //header ("Location: ../register.php");
            return (0);
        }
        else if($this->password == NULL)
        {
            echo "INVALID PASSWORD";
            //header ("Location: ../register.php");
            return (0);
        }
        else
        {
            $sql="SELECT * FROM USERS";
            $result = $this->conn->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $value = $result->fetch();

            //echo print_r($value)."mtho";
            foreach ($result as $value)
            {
                switch($value)
                {
                    case email:
                        echo $value;
                }
            }
    
 
            /* $query="INSERT INTO USERS (email,username,passwords)
                VALUES ('$this->email','$this->username','$this->password');
            "; 
  
            $this->conn->exec($query); */

            //return (1);
        }
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
