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
<?php
                include 'dbcon.php';

                if(isset($_POST['submit'])){
                    $email=mysqli_real_escape_string($conn,$_POST['email']);
                    $password=mysqli_real_escape_string($conn,$_POST['password']);

                    $selectQuery = "select * from registration where email='$email' and status='active'";
                    $sQueryExe = mysqli_query($conn,$selectQuery);

                    $emailCount = mysqli_num_rows($sQueryExe);
                
                    if($emailCount){
                        ?>
                            <script>
                                alert("user exists");
                            </script>
                            <?php   
                                    $fetchPass = mysqli_fetch_assoc($sQueryExe);
                                    $passH = $fetchPass['password'];
                                    $status = $fetchPass['status'];
                                    $_SESSION['name'] = $fetchPass['name'];
                                    $passVerify = password_verify($password,$passH);
                                    if($passVerify){
                                        if(isset($_POST['rememberme'])){
                                            setcookie('user',$email,time()+86400);
                                            setcookie('pass',$password,time()+86400);
                                            header('location:home.php');
                                        }
                                        else{
                                            header('location:home.php');
                                        }

                                        
                                    }
                                    else{
                                        echo "entered wrong password"; 
                                    }
                    }
                    else{
                            ?>
                                <script>
                                    alert("user doesn't exists");
                                </script><?php
                        }
                    }
                
            ?>
    <div class="outerContainer">
        <div class="innerContainer">
            <h1>Create Account</h1>
            <p>Create a free account todaY</p>
            <a href="">Gmail</a>
            <a href="">Facebook</a>
            <p>OR</p>
            <div class="sessionText">
            <p><?php 
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                }else{
                    echo $_SESSION['msg']="you are logged out login again";
                }?></p>
            </div>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
                <div class="form">
                    <input type="email" name="email" id="" placeholder="email" value="<?php if(isset($_COOKIE['user'])){echo $_COOKIE['user'];}?>"autofocus required>
                    <input type="password" name="password" id="" placeholder="password" value="<?php if(isset($_COOKIE['pass'])){echo $_COOKIE['pass'];}?>" required>
                    <input type="checkbox" name="rememberme" id="">Remember Me
                    <button class="btn" type="submit" name="submit">LOGIN</button>
                </div>
            </form>
            <p>Don't Have Accout</p>
            <a href="registration.php">SignUp Here</a>
        </div>
    </div>
</body>
</html>