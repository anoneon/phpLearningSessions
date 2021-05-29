<?php
    session_start();
    if(!isset($_SESSION['username'])){
       echo "you are logged out";
        header('location:login.php');

    }
    else{
        echo "session not destroyed";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | <?php echo $_SESSION['username'];?></title>
    <?php include 'css/home.css';?>
</head>
<body>
    <h1>Hello There, <?php echo $_SESSION['username'];?></h1>
    <a href="logout.php">LOGOUT</a>
</body>
</html>