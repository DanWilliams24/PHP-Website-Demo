<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My First PHP website</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>

    <?php
        session_start();
        if($_SESSION['user']) {

        }else{
            header("location: index.php");
        }
        $user = $_SESSION['user'];
    ?>
</head>
<body>
    <h2>Home Page</h2>

    <p>Hello <?php Print "$user"?>!</p>
    <a href="logout.php">Click here to logout</a><br><br>
    <form action="add.php" method="POST">
        Add more to list: <input type="text" name="details"><br>
        public post? <input type="checkbox" name="public[]" value="yes"><br>
        <input type="submit" value="Add to List">
    </form>

    <h2 align="center">My List</h2>
    <table border="1px" width="100%">
    <tr>
        <th>Id</th>
        <th>Details</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
    </table>
</body>
</html>
