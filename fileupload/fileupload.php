<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if(isset($_POST['submit'])){
        include 'conn.php';
        $photo=$_FILES['file'];
        $filename=$photo['name'];
        $filetmp=$photo['tmp_name'];
        $error=$photo['error'];
        $validList =array("jpg","jpeg","icon");
        $fileNameArr = explode(".",$filename);
        $fileNameExt = strtolower($fileNameArr[1]);
        if(in_array($fileNameExt,$validList)){
        if($error===0){
        $destination = 'upload/'.$filename;
        move_uploaded_file($filetmp,$destination);
        $insertQ = "insert into imageupload(imageupload) values('$destination')";

        $fireQ=mysqli_query($con,$insertQ);

        if($fireQ){
            echo "success";
        }else{
            echo "NO";
        }   
        }
    }else{
        echo "error";
    }
    }
?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="">
        <button type="submit" name="submit">Upload</button>
    </form>
</body>
</html>