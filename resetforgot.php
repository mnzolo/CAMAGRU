<?php
    $token = $_GET["token"];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>CAMAGRU</title>
        <link rel="stylesheet" href="css/login.css">
        <h1 align="center" >Forgot_Password_</h1>
        <hr>
    </head>
    <body style="background-color: white">
    <form method="post" action="includes/resetf.php">
        <input type="hidden" name="token" value="$token">
        <input type="text" name="password1" placeholder="Please Enter Password">
        <input type="text" name="password2" placeholder="Please Confirm Password">
        <input style="width:100px;background-color:green;" type="submit" name="Register" value="reset">
    </form>
</html>