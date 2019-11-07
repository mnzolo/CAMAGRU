<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class User{
    protected $conn;
    //protected $email;
    protected $username;
    protected $password;
    protected $password2;
    protected $token; 
    
    public function __construct($email,$username,$password,$token,$conn,$password2)
    {  
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->token = $token;
        $this->conn = $conn;
        $this->password2 = $password2;
    }
    
    public function create_user()
    {
        try {
            $sql="SELECT * FROM users";
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

            foreach($value as $key)
            {
                if ($key["email"] == $this->email)
                {
                    echo "Invalid email";
                    return (0);
                }
            }

            $que="INSERT INTO users (email, username, passwords, tokens, verified) 
              
            VALUES ('$this->email','$this->username','$this->password','$this->token', 0)"; 
  
            $this->conn->exec($que);
        
        } catch ( PDOException $e ) {
			die( $e->getMessage() );
		}

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
            $user = $key["username"];
            $pass = $key["passwords"];
            $verify = $key["verified"];
        }

        if ($user == $this->username && password_verify($this->password,$pass) && $verify == 1)
        {
           return(1);
        }
        else
        {
            return(0);
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
            if ($key['verified'] == '1')
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

    //in_the_making

    public function reset_user()
    {
        $sqi="SELECT * FROM USERS WHERE email='$this->email'";
        $reset = $this->conn->query($sqi);
        $reset->setFetchMode(PDO::FETCH_ASSOC);
        $rem = $reset->fetchall();
        $hash = password_hash($this->password2, PASSWORD_DEFAULT);
        
        foreach ($rem as $key)
        {
            if($key["email"] == $this->email && password_verify($this->password,$key["passwords"]))
            {
                $sp="UPDATE USERS SET passwords='$hash' WHERE email='$this->email'";
                $this->conn->exec($sp);
                return (1);
            }
            else
            {
                echo "PLEASE ENTER VALID INFORMATION";
                return (0);
            }
        }
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
            $this->DB_PASSWORD =  "123456";
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
                        passwords varchar(255) NOT NULL,
                        tokens varchar(50) NOT NULL,
                        verified varchar(1) DEFAULT '0'
                    )";

                    $conn->exec($sql);

                    $sqe="CREATE TABLE IF NOT EXISTS IMAGES(
                        id INT(10) AUTO_INCREMENT PRIMARY KEY,
                        email varchar(50) NOT NULL,
                        username varchar(50) NOT NULL,
                        passwords varchar(255) NOT NULL,
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

class   fetch
{
    protected $conn;
    protected $username;
    protected $info;
    
    public function __construct($conn,$username)
    {
        $this->conn = $conn;
        $this->username = $username;
        $this->info = array();
    }
    
    public  function getstuff()
    {
        try{
            $sql="SELECT * FROM USERS WHERE username='$this->username'";
            $result = $this->conn->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $value = $result->fetchall();

            foreach($value as $key)
            {
                $this->info = array("username" => $key["username"], "email" => $key["email"]);
            }
            
            return ($this->info);
        }
        catch(PDOEXCEPTION $e)
        {
            echo "Error".$e->getMessage();
        }
    }
}

class   forgets{
    protected  $conn;
    protected  $email;
    protected  $token;
    protected  $password;
    protected  $info;

    public function __construct($conn, $email,$token,$password)
    {
        $this->conn = $conn;
        $this->email = $email;
        $this->token = $token;
        $this->password = $password;
        $this->info = array();
    }

    public function gorgetting()
    {
        $sql="SELECT * FROM USERS WHERE email='$this->email'";
        $result = $this->conn->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $value = $result->fetchall();

        foreach($value as $key)
        {
            $this->token = $key["tokens"];
        }
        foreach($value as $key)
        {
            if($key["email"] == $this->email)
            {
                return ($this->token);
            }
            else
            {
                return (0);
            }
        }
    }

    public function updatepass()
    {
        try{
        $sql="UPDATE USERS SET passwords='password_hash($this->password,PASSWORD_DEFAULT)' WHERE tokens='$this->token'";
        $this->conn->exec($sql);

            return(1);
        }
        catch(PDOEXCEPTION $e)
        {
            echo "Error".$e->getMessage();
        }
    }

    public function updateemail()
    {
        try{
        $sql="SELECT * FROM USERS WHERE email='$this->email'";
        $result = $this->conn->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $value = $result->fetchall();
        
        foreach($value as $key)
        {
            $this->info=array("token" => $key["tokens"], "user" => $key["username"]);
        }

        foreach($value as $val)
        {
            if ($val["email"] == $this->email)
            {
                $sql="UPDATE USERS SET email='$this->password', verified='0' WHERE email='$this->email'";
                $this->conn->exec($sql);

                return ($this->info);
            }
        }
    }
    catch(PDOEXCEPTION $e)
    {
        echo "Error".$e->getMessage();
    }
}

public function updateuser()
    {
        try{
        $sql="SELECT * FROM USERS WHERE username='$this->email'";
        $result = $this->conn->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $value = $result->fetchall();
        
        foreach($value as $val)
        {
            if ($val["username"] == $this->email)
            {
                $sql="UPDATE USERS SET username='$this->password' WHERE username='$this->email'";
                $this->conn->exec($sql);

                return (1);
            }
        }
    }
    catch(PDOEXCEPTION $e)
    {
        echo "Error".$e->getMessage();
    }
}

}
?>