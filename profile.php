<?php
    include  'includes/crud.php';
    include  'includes/connection.php';

   if($_SESSION["login"] != "True")
   {
       header("location: index.php");
   }
   else
   {
    $username = $_SESSION["user"];

    $fetch = new Insert();
    $conn = $fetch->createconn();

    $objects = new fetch($conn,$username);
    $result = $objects->getstuff();

    $email = $result["email"];
    $username = $result["username"];
   }
    //$conn = null;
?>

<html>
<head>
        <title>CAMAGRU</title>
        <link rel="stylesheet" href="css/login.css">
        <div class="NavBar">
            <a href="index.php">HOME</a>
            <a href="home.php">Gallery</a>
            <a href="uploadimage.php">Uplaod</a>
            <a href= "profile.php">Profile</a>
            <a href= "camera.php">Camera</a>
            <a href="logout.php" >LogOut</a>
        </div>
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