<?php
    include  'includes/crud.php';
    include  'includes/connection.php';

    session_start();

    $username = $_SESSION["user"];

    $fetch = new Insert();
    $conn = $fetch->createconn();

    $objects = new fetch($conn,$username);
    $result = $objects->getstuff();
    
//$conn = null;
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
                <!-- <input type="text" name="email" placeholder="Please Enter Email"> -->
                <?php
                    foreach($result as $key)
                    {
                        echo $key["email"];
                    }
                ?>
            </div>
            <div>
                <input style="width:100px;background-color:green;" type="submit" name="Reset Email" value="Reset Email">
            </div>
            <div>
                <!-- <input type="text" name="username" placeholder="Please Enter Username"> -->
                <?php
                        foreach($result as $key)
                        {
                            echo $key["username"];
                        }
                ?>
            </div>
            <div>    
                <input style="width:100px;background-color:green;" type="submit" name="Reset username" value="Reset username">
            </div>
        </form>
        <form action="">
             <div>   
                <input style="width:100px;background-color:green;" type="submit" name="Reset Password" value="Reset password">
            </div>
        </form>
    </body>
</html>