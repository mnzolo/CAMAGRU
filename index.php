<?php

        include 'includes/crud.php';

       $creation = new user();
       $creation->create_database(); 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>CAMAGRU</title>
        <link rel="stylesheet" href="css/login.css">
        <h1 align="center" >LOG_IN_</h1>
        <hr>
    </head>
    <body style="background-color:white;">
        <form method="post" align="center" action="index.php">
            <div>
                <input type="text" name="username" placeholder="Please Username">
            </div>
            <div>
                <input type="text" name="password" placeholder="Please Password">
            </div>
            <div>
                <input style="width:100px;background-color:green;" type="submit" name="LOG_IN_" value="LOG_IN_">
            </div>
        </form>
        <form action="register.php">
                <input style="width:100px;background-color:green;" type="submit" name="Register_" value="Register">
        </form>
    </body>
</html>

