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
            <h1>Reset Password Of Account</h1>
            <?php
                include 'dbcon.php';

                if(isset($_POST['submit'])){
                   
                    $email=mysqli_real_escape_string($conn,$_POST['email']);

                    $selectQuery = "select * from registration where email='$email'";
                    
                    $sQueryExe = mysqli_query($conn,$selectQuery);

                    $emailCount = mysqli_num_rows($sQueryExe);
                
                    if($emailCount){
                                $fetch = mysqli_fetch_assoc($sQueryExe);
                                $token=$fetch['token'];
                                $to=$email;
                                $from="From: your@gmail.com";
                                $sub = "Reset Password";
                                $body= "Go to the followed link fo resetting password http://localhost/practice/mail%20verification/resetPassword.php?token=$token";
                                if(mail($to,$sub,$body,$from)){
                                    $_SESSION['msg']="goto your mail for password resetting";
                                    header('location:login.php');
                                }else{
                                    echo "email sending failed";
                                }
                    }
                    else{
                       
                        $_SESSION['msg']="Email Doesn't Exists";
                        header('location:login.php');
                    }
                }
            ?>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">

                <div class="form">
                    
                    <input type="email" name="email" id="" placeholder="email" required>
                    
                    <button class="btn" type="submit" name="submit">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>