<?php
    include  'includes/crud.php';
    include  'includes/connection.php';

    session_start();

    $username = $_SESSION["user"];

    $fetch = new Insert();
    $conn = $fetch->createconn();

    $objects = new fetch($conn,$username);
    $result = $objects->getstuff();

    $email = $result["email"];
    $username = $result["username"];

    $conn = null;
?>

<html>
    <head>
        <title>CAMAGRU</title>
        <link rel="stylesheet" href="css/login.css">
        <h1 align="center" >PROFILE_</h1>
        <hr>
    </head>
    <body style="background-color:white;">
        <form method="post" align="center" action="resetemailprof.php">
            <div>
                <?php
                    echo $email."<br/>"."<br/>";
                ?>
            </div>
            <div>
                <input style="width:100px;background-color:green;" type="submit" name="Reset Email" value="Reset Email">
            </div>
        </form>
        <form align="center" action="resetuser.php">
            <div>
                <?php
                    echo $username."<br/>"."<br/>";
                ?>
            </div>
            <div>    
                <input style="width:100px;background-color:green;" type="submit" name="Reset username" value="Reset username">
            </div>
        </form>
        <form action="resetpassword.php" align="center">
            <div>
                <?php
                    echo "**********";
                ?>
            </div>
             <div>   
                <input style="width:100px;background-color:green;" type="submit" name="Reset Password" value="Reset password">
            </div>
        </form>
    </body>
</html>