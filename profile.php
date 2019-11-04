<?php

    include 'profilemech.php';

    session_start();

    echo $result;
?>

<html>
    <head>
        <title>CAMAGRU</title>
        <link rel="stylesheet" href="css/login.css">
        <h1 align="center" >PROFILE_</h1>
        <hr>
    </head>
    <body style="background-color:white;">
        <form method="post" align="center">
            <div>
                <input type="text" name="email" placeholder="Please Enter Email">
            </div>
            <div>
                <input style="width:100px;background-color:green;" type="submit" name="Reset Email" value="Reset Email">
            </div>
            <div>
                <!-- <input type="text" name="username" placeholder="Please Enter Username"> -->
                <?php
                        echo $_SESSION["user"]; 
                ?>
            </div>
            <div>    
                <input style="width:100px;background-color:green;" type="submit" name="Reset username" value="Reset username">
            </div>
            <div>
                <input type="text" name="password2" placeholder="Please Confirm Password">
             </div>
        </form>
        <form action="">
             <div>   
                <input style="width:100px;background-color:green;" type="submit" name="Reset Password" value="Reset password">
            </div>
        </form>
    </body>
</html>