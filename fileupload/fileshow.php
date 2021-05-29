<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

include 'conn.php';

$Q = "select * from imageupload";
$FQ=mysqli_query($con,$Q);
$FE=mysqli_fetch_assoc($FQ);
?>
<img src="<?PHP echo $FE['imageupload'];?>" alt="" srcset="">
</body>
</html>