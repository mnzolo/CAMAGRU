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
            $query="INSERT INTO USERS (email,username,passwords,tokens,verified)
                VALUES ('$this->email','$this->username','$this->password','$this->token','0');
            "; 
  
            $this->conn->exec($query);
            //mail("mthothonzolo@gmail","Email Verification", "click on the <a href="//localhost:8080/crud/confirmemail.php">link</a>)
            return (1); 
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
            $this->DB_PASSWORD = "";
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