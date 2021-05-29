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
            <h1>Create Account</h1>
            <p>Create a free account todaY</p>
            <a href="">Gmail</a>
            <a href="">Facebook</a>
            <p>OR</p>
            <?php
                include 'dbcon.php';

                if(isset($_POST['submit'])){
                    $name=mysqli_real_escape_string($conn,$_POST['name']);
                    $email=mysqli_real_escape_string($conn,$_POST['email']);
                    $number=mysqli_real_escape_string($conn,$_POST['number']);
                    $password=mysqli_real_escape_string($conn,$_POST['password']);
                    $cpassword=mysqli_real_escape_string($conn,$_POST['cpassword']);

                    $passH = password_hash($password,PASSWORD_BCRYPT);
                    $cpassH = password_hash($cpassword,PASSWORD_BCRYPT);

                    $selectQuery = "select * from registration where email='$email'";
                    
                    $sQueryExe = mysqli_query($conn,$selectQuery);

                    $emailCount = mysqli_num_rows($sQueryExe);

                    $token = bin2hex(random_bytes(15));
                
                    if($emailCount>0){
                        ?>
                            <script>
                                alert("Email already exists use another");
                            </script>
                            <?php
                    }
                    else{
                        if($password===$cpassword){
                            $insertQuery="insert into registration(name,email,number,password,cpassword,token,status) VALUES ('$name','$email','$number','$passH','$cpassH','$token','inactive')";

                            $iQueryExec = mysqli_query($conn,$insertQuery);

                            if($iQueryExec){
                                $to=$email;
                                $from="From: your@gmail.com";
                                $sub = "Email activation";
                                $body= "go to the followed link fo activation http://localhost/practice/mail%20verification/activate.php?token=$token";
                                if(mail($to,$sub,$body,$from)){
                                    $_SESSION['msg']="goto your mail for activation $email";
                                    header('location:login.php');
                                }else{
                                    echo "email sending failed";
                                }
                            }else{
                                echo " mail not sent";
                            }
                            
                        }
                        else{
                            ?>
                                <script>
                                    alert("Password Doesn't Matches");
                                </script><?php
                        }
                    }
                }
            ?>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">

                <div class="form">
                    <input type="text" name="name" id="" placeholder="Name" required>
                    <input type="email" name="email" id="" placeholder="email" required>
                    <input type="text" name="number" id="" placeholder="num" required>
                    <input type="password" name="password" id="" placeholder="password" required>
                    <input type="password" name="cpassword" id="" placeholder="re enter" required>
                    <button class="btn" type="submit" name="submit">create Now</button>
                </div>
            </form>
            <p>Forgot Password</p>
            <a href="resetMail.php">Reset Password</a>
            <p>Have account already</p>
            <a href="login.php">LOGIN</a>

        </div>
    </div>
</body>
</html>