<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My First PHP Website</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />

</head>

<body>
    <h2>Registration Page</h2>
    <a href="index.php">Click here to go back</a><br><br>
    <form action="register.php" method="POST">
        Enter Username: <input type="text" name="username" required="required"> <br> Enter Password: <input type="password" name="password" required="required"> <br>
        <input type="submit" value="Register">
    </form>


</body>

</html>


<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    #"mysql_real_escape_string" prevents inputs from SQL Injections.
    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);
    $bool = true;


    mysql_connect("localhost", "root", "") or die(mysql_error()); //Connect to database
    mysql_select_db("first_db") or die("Cannot connect to database");
    $query = mysql_query("Select * from users");
    while($row = mysql_fetch_array($query)){
        $table_users = $row['username'];
        if($username == $table_users){
            $bool = false;
            Print '<script>alert("Username has been taken!");</script>';
            Print '<script>window.location.assign("register.php");</script>';
        }
    }

    if($bool){
        mysql_query("INSERT INTO users (username, password) VALUES ('$username','$password')");
        Print '<script>alert("Successfully Registered!");</script>';
        Print '<script>window.location.assign("register.php");</script>';
    }
}

?>
