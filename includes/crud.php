<?php  
class User{
    protected $conn;
    //protected $email;
    protected $username;
    protected $password;
    protected $token; 
    
    public function __construct($email,$username,$password,$token,$conn)
    {  
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->token = $token;
        $this->conn = $conn;
    }
    
    public function create_user()
    {
            $sql="SELECT username FROM USERS";
            $result = $this->conn->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $value = $result->fetchAll();

            foreach($value as $key)
            {
                if ($key["username"] == $this->username)
                {
                    echo "Invalid Username";
                    return (0);
                }
            }
            $query="INSERT INTO USERS (email,username,passwords,tokens)
                VALUES ('$this->email','$this->username','$this->password','$this->token');
            "; 
  
            $this->conn->exec($query);
           
            return (1);
        }
    
    public function validate_user()
    {
        $sq="SELECT * FROM USERS WHERE username='$this->username'";
        $res = $this->conn->query($sq);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $val = $res->fetchall();

        foreach($val as $key)
        {
            $user = $key['username'];
            $pass = $key['passwords'];
        }
        $paschek = $password;
        /* echo $paschek;
        echo $pass; */
        if ($user == $this->username)
        {
            if(password_hash($this->password,$pass))
            {
                echo "User Succesfully Logged IN";
            }
        }
        else
        {
            echo "Invalid User Details : create account or log_out";
        }
    }

    public function validation()
    {
        $sqe="SELECT * FROM USERS WHERE tokens='$this->token'";
        $mail = $this->conn->query($sqe);
        $mail->setFetchMode(PDO::FETCH_ASSOC);
        $vmai = $mail->fetchall();

        foreach ($vmai as $key)
        {
            if ($vmai['verified'] == '1')
            {
                echo "LINK_ALREADY_USED or Go_TO_Registration_";
                //header("location: register.php");
                return  (0);
            }
        }

        $sql1="UPDATE USERS SET verified='1' where username='$this->username'";
        $this->conn->exec($sql1);

        echo "Email Verified GO To LOG_IN_";
    }
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
                        passwords varchar(50) NOT NULL,
                        tokens varchar(50) NOT NULL,
                        verified varchar(1) DEFAULT '0'
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
?>