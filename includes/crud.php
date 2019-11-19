<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

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
            $result = $this->conn->prepare($sql);
            $result->execute();
            $value = $result->fetchAll(PDO::FETCH_ASSOC);

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
  
            $qua = $this->conn->prepare($que);

            $qua->execute();
        
        } catch ( PDOException $e ) {
			die( $e->getMessage() );
		}

            return (1);
    }
    
    public function validate_user()
    {
        $sq="SELECT * FROM USERS WHERE username='$this->username'";
        $res = $this->conn->prepare($sq);
        $res->execute();
        $val = $res->fetchall(PDO::FETCH_ASSOC);

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
        $mail = $this->conn->prepare($sqe);
        $mail->execute();
        $vmai = $mail->fetchall(PDO::FETCH_ASSOC);

        foreach ($vmai as $key)
        {
            if ($key['verified'] == '1')
            {
                //echo "LINK_ALREADY_USED or Go_TO_Registration_";
                header("location: register.php");
                return  (0);
            }
        }

        $sql1="UPDATE USERS SET verified='1' where username='$this->username'";
        $sqn = $this->conn->prepare($sql1);
        $sqn->execute();

        header("location: index.php");
    }

    //in_the_making

    public function reset_user()
    {
        $sqi="SELECT * FROM USERS WHERE email='$this->email'";
        $reset = $this->conn->prepare($sqi);
        $reset->execute();
        $rem = $reset->fetchall(PDO::FETCH_ASSOC);
        $hash = password_hash($this->password2, PASSWORD_DEFAULT);
        
        foreach ($rem as $key)
        {
            if($key["email"] == $this->email && password_verify($this->password,$key["passwords"]))
            {
                $sp="UPDATE USERS SET passwords='$hash' WHERE email='$this->email'";
                $spa = $this->conn->prepare($sp);
                $spa->execute();
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

                    $sql = $conn->prepare("CREATE TABLE IF NOT EXISTS USERS(
                        id INT(10) AUTO_INCREMENT PRIMARY KEY,
                        email varchar(50) NOT NULL,
                        username varchar(50) NOT NULL,
                        passwords varchar(255) NOT NULL,
                        tokens varchar(50) NOT NULL,
                        verified varchar(1) DEFAULT '0',
                        Notifications varchar(1) DEFAULT '0'
                    )");

                    $sql->execute();
                    
                    echo "USERS TABLE CREATED";
                    echo "<br>";
       
                    $sqe= $conn->prepare("CREATE TABLE IF NOT EXISTS IMAGES(
                        id INT(10) AUTO_INCREMENT PRIMARY KEY,
                        imgurl varchar(300) NOT NULL,
                        token varchar(100) NOT NULL
                    )");

                    $sqe->execute();
                    
                    echo "IMAGES TABLE CREATED";
                    echo "<br>";

                    $sqa=$conn->prepare("CREATE TABLE IF NOT EXISTS COMMENTS(
                        id INT(10) AUTO_INCREMENT PRIMARY KEY,
                        imgurl varchar(300) NOT NULL,
                        token varchar(100) NOT NULL,
                        comment varchar(300) NOT NULL
                    )");

                    $sqa->execute();

                    echo "COMMENTS TABLE CEATED";
                    echo "<br>";

                    $sqb=$conn->prepare("CREATE TABLE IF NOT EXISTS LIKES(
                        id INT(10) AUTO_INCREMENT PRIMARY KEY,
                        imgurl varchar(300) NOT NULL,
                        token varchar(100) NOT NULL
                    )");

                    $sqb->execute();

                    echo "LIKES TABLE CREATED";
                    echo "<br>";
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
            $sql=$this->conn->prepare("SELECT * FROM USERS WHERE username='$this->username'");
            $sql->execute();
            $value = $sql->fetchall(PDO::FETCH_ASSOC);

            foreach($value as $key)
            {
                $this->info = array("username" => $key["username"], "email" => $key["email"], "notifications" => $key["Notifications"]);
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
        $result = $this->conn->prepare($sql);
        $result->execute();
        $value = $result->fetchall(PDO::FETCH_ASSOC);

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
        $sqla = $this->conn->prepare($sql);
        $sqla->execute();

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
        $result = $this->conn->prepare($sql);
        $result->execute();
        $value = $result->fetchall(PDO::FETCH_ASSOC);
        
        foreach($value as $key)
        {
            $this->info=array("token" => $key["tokens"], "user" => $key["username"]);
        }

        foreach($value as $val)
        {
            if ($val["email"] == $this->email)
            {
                $sql="UPDATE USERS SET email='$this->password', verified='0' WHERE email='$this->email'";
                $sq = $this->conn->prepare($sql);
                $sq->execute();

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
        $result = $this->conn->prepare($sql);
        $result->execute();
        $value = $result->fetchall(PDO::FETCH_ASSOC);
        
        foreach($value as $val)
        {
            if ($val["username"] == $this->email)
            {
                $sql="UPDATE USERS SET username='$this->password' WHERE username='$this->email'";
                $sqr = $this->conn->prepare($sql);
                $sqr->execute();

                $sqlb="UPDATE IMAGES SET token='$this->password' WHERE token='$this->email'";
                $sqs = $this->conn->prepare($sqlb);
                $sqs->execute();

                $sqlc="UPDATE COMMENTS SET token='$this->password' WHERE token='$this->email'";
                $sqx = $this->conn->prepare($sqlc);
                $sqx->execute();

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

class image{

    protected $conn;
    protected $imgurl;
    protected $username;

    public function __construct($conn,$upload_path)
    {
        $this->conn = $conn;
        $this->imgurl = $upload_path;
        $this->username = $_SESSION["user"];
    }
    public function uploadpics()
    {
        try{
            
            $sql="INSERT INTO IMAGES (imgurl,token)
            VALUES ('$this->imgurl','$this->username')
            ";

            $sqp = $this->conn->prepare($sql);
            $sqp->execute();

            return(1);
        }
        catch(PDOEXCEPTION $e)
        {
            echo "Error".$e->getMessage();
        }
    }
}

class   Comment{
    protected $comment;
    protected $username;
    protected $imgurl;
    protected $conn;

    public function __construct($comment, $imgurl, $conn)
    {
        $this->comment = $comment;
        $this->imgurl = $imgurl;
        $this->username = $_SESSION["user"];
        $this->conn = $conn;
    }

    public function addcom()
    {
        try{
        $sql="INSERT INTO COMMENTS (imgurl,token,comment)
        VALUES ('$this->imgurl', '$this->username', '$this->comment')
        ";

        $rsq = $this->conn->prepare($sql);
        $rsq->execute();
        
        return (1);
        }
        catch(PDOEXCEPTION $e)
        {
            echo "Error".$e->getMessage();
        }
    }
}

class   like{
    protected $like;
    protected $username;
    protected $imgurl;
    protected $conn;

    public function __construct($like, $imgurl, $conn)
    {
        $this->comment = $like;
        $this->imgurl = $imgurl;
        $this->username = $_SESSION["user"];
        $this->conn = $conn;
    }

    public function addlike()
    {
        try{
        $sql = "SELECT * FROM LIKES WHERE token='$this->username'";
        $result = $this->conn->prepare($sql);
        $result->execute();
        $value = $result->fetchall(PDO::FETCH_ASSOC);

        foreach($value as $key)
        {
            if(($key["token"] == $this->username) && ($key["imgurl"] == $this->imgurl))
            {
                $sql="DELETE FROM LIKES WHERE token='$this->username' AND imgurl='$this->imgurl'";

                $sqc = $this->conn->prepare($sql);
                $sqc->execute();

                return (1);
            }
        }

        $sqe="INSERT INTO LIKES (imgurl,token)
        VALUES ('$this->imgurl', '$this->username')
        ";

        $ns = $this->conn->prepare($sqe);
        $ns->execute();

        return(1);
        }
        catch(PDOEXCEPTION $e)
        {
            echo "Error".$e->getMessage();
        }
    }
}

?>