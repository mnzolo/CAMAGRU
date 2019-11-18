<?php
    try{
            $DB_DSN = "localhost";
            $DB_USER = "root";
            $DB_PASSWORD =  "123456";
            
            $conn = new PDO("mysql:host=$DB_DSN;", $DB_USER, $DB_PASSWORD);
            $conn->setAttribute(PDO:: ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
            $sql = $conn->prepare("CREATE DATABASE IF NOT EXISTS CAMAGRU");
            $sql->execute();

            echo "CAMAGRU DATABASE CREATED";
        }
        catch(PDOEXCEPTION $e)
        {
            echo "ERROR:".$e->getMessage();
        }
?>