<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palindrome</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="word" id="" autofocus>
        <input type="submit" name="submit" value="CHECK">
    </form>
    <p>
    <?php
        if(isset($_POST['submit'])){
            $str = $_POST['word'];

            if($str === strrev($str)){
                echo "palindrome";
            }else{
                echo "NONONONO";
            }
        }
    ?>
    </p>
</body>
</html>