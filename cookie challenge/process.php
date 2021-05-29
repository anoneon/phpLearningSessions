<?php
        if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $age=$_POST['age'];
            $degree=$_POST['degree'];
            setcookie('name',$name,time()+86400);
            setcookie('age',$age,time()+86400);
            setcookie('degree',$degree,time()+86400);
        }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <button type="submit" name="submit"><a href="display.php">DISPLAY</a></button>
    </body>
    </html>