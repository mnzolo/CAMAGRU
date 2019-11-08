<?php
    try{
        $DB_DSN = "localhost";
        $DB_USER = "root";
        $DB_PASSWORD = "";

        $conn = new PDO("mysql:host=$DB_DSN;dbname=CAMAGRU;", $DB_USER, $DB_PASSWORD);

        $conn->setAttribute(PDO:: ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="CREATE TABLE USERS(
            id INT(10) AUTO_INCREMENT PRIMARY KEY,
            email varchar(50) NOT NULL,
            username varchar(50) NOT NULL,
            passwords varchar(50) NOT NULL
        )";
        
        $sql="CREATE TABLE GALLERY(
            id INT(10) AUTO_INCREMENT PRIMARY KEY,
            email varchar(50) NOT NULL,
            username varchar(50) NOT NULL,
            passwords varchar(50) NOT NULL
        )";

        $sql="CREATE TABLE COMMENTS(
            id INT(10) AUTO_INCREMENT PRIMARY KEY,
            email varchar(50) NOT NULL,
            username varchar(50) NOT NULL,
            passwords varchar(50) NOT NULL
        )"; 

        $sql="CREATE TABLE LIKES(
            id INT(10) AUTO_INCREMENT PRIMARY KEY,
            email varchar(50) NOT NULL,
            username varchar(50) NOT NULL,
            passwords varchar(50) NOT NULL
        )";
        
        $conn->exec($sql);
        echo "table created"; 
    }
    catch(PDOEXCEPTION $e)
    {
        echo "ERROR :".$e->getMessage();
    }

    $conn = null;
?>