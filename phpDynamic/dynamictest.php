<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="favColour" id="" placeholder="Enter your Fav colour">
        <input type="submit" name="submit" value="Check Now">
    </form>
    <p>
        <?php
            if(isset($_POST['submit'])){
                switch($_POST['favColour']){
                    case "red":echo "your fav colour is red";
                    break;
                    case "blue":echo "your fav colour is blue";
                    break;
                    case "green":echo "your fav colour is green";
                    break;
                    default:echo "damm im not sure abt the colour";
                }
            }
        ?>
    </p>
</body>
</html>