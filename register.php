<!DOCTYPE html>
<html>
    <head>
        <title>CAMAGRU</title>
        <link rel="stylesheet" href="css/login.css">
        <h1 align="center" >REGISTER_</h1>
        <hr>
    </head>
    <body style="background-color:white;">
        <form method="post" align="center" action="includes/mechanism2.php">
            <div>
                <input type="text" name="email" placeholder="Please Enter Email">
            </div>
            <div>
                <input type="text" name="username" placeholder="Please Enter Username">
            </div>
            <div>
                <input type="text" name="password1" placeholder="Please Enter Password">
            </div>
                <input type="text" name="password2" placeholder="Please Confirm Password">
            </div>
            <div>
                <input style="width:100px;background-color:green;" type="submit" name="Register" value="Register">
            </div>
        </form>
        <form method='post'>
            <div>
                <input style="width:100px;background-color:green;" type="submit" name="Send Password Reset Email" value="Send Password Reset Email">
            </div>
        </form>
    </body>
</html>