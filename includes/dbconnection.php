<?php
    class  Connect{
    protected $DB_DSN;
    protected $DB_USER;
    protected $DB_PASSWORD;

    public function __construct()
    {
        $this->DB_DSN = "localhost";
        $this->DB_USER = "root";
        $this->DB_PASSWORD =  "123456";
    }

    public function network()
    {
        try
        {

            $conn = new PDO("mysql:host=$this->DB_DSN", $this->DB_USER, $this->DB_PASSWORD);

            $conn->setAttribute(PDO:: ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            return $conn;
        }
        catch(PDOEXCEPTION $e)
        {
            echo "ERROR :".$e->getMessage();
        }
    }
}
?> 