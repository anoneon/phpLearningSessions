<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'css/style.css';?>
</head>
<body>
    <div class="outerContainer">
        <div class="innerContainer">
        <?php
                include 'dbcon.php';

                if(isset($_POST['submit'])){
                    if(isset($_GET['token'])){
                        $token=$_GET['token'];
                        $newpassword=mysqli_real_escape_string($conn,$_POST['newpassword']);
                        $cpassword=mysqli_real_escape_string($conn,$_POST['cpassword']);
                        $passH = password_hash($newpassword,PASSWORD_BCRYPT);
                        $cpassH = password_hash($cpassword,PASSWORD_BCRYPT);

                        if($newpassword === $cpassword){
                            $updateQuery="update registration set password='$passH' where token='$token'";
                            $fireQuery=mysqli_query($conn,$updateQuery);
                            if($fireQuery){
                                $_SESSION['msg']="Password Update";
                                header('location:login.php');
                            }else{
                                $_SESSION['passmsg']="Updation failed";
                                header('location:resetPassword.php');
                            }
                        }else{
                            $_SESSION['passmsg']="Password Not Matches";
                            header('location:resetPassword.php');
                        }
                    }else{
                        $_SESSION['passmsg']="Token not found";
                        header('location:resetPassword.php');
                    }
                }
            ?>
            <h1>Reset Password</h1>
            <p .sessionText><?php if(isset($_SESSION['passmsg'])){
                echo $_SESSION['passmsg'];
            }else{
                $_SESSION['passmsg']="";
            }?></p>
            <form action="" method="post">

                <div class="form">
                    <input type="password" name="newpassword" id="" placeholder="newpassword" required>
                    <input type="password" name="cpassword" id="" placeholder="re enter" required>
                    <button class="btn" type="submit" name="submit">Reset Now</button>
                </div>
            </form>

        </div>
    </div>
</body>