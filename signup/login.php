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
    <?php include 'links/links.php';?>
</head>
<body>
<?php
                include 'dbcon.php';

                if(isset($_POST['submit'])){
                    $email=mysqli_real_escape_string($con,$_POST['email']);
                    $password=mysqli_real_escape_string($con,$_POST['password']);

                    $selectQuery = "select * from registration where email='$email'";
                    $sQueryExe = mysqli_query($con,$selectQuery);

                    $emailCount = mysqli_num_rows($sQueryExe);
                
                    if($emailCount){
                        ?>
                            <script>
                                alert("user exists");
                            </script>
                            <?php   
                                    $fetchPass = mysqli_fetch_assoc($sQueryExe);
                                    $passH = $fetchPass['password'];
                                    $_SESSION['username'] = $fetchPass['username'];
                                    $passVerify = password_verify($password,$passH);
                                    if($passVerify){
                                        ?><script>
                                            location.replace("home.php");
                                            </script><?php
                                    }
                                    else{
                                        ?>
                                        <script>
                                            alert("entered wrong password");
                                        </script> <?php
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
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
                <div class="form">
                    <input type="email" name="email" id="" placeholder="email" required>
                    <input type="password" name="password" id="" placeholder="password" required>
                    <button class="btn" type="submit" name="submit">LOGIN</button>
                </div>
            </form>
            <p>Don't Have Accout</p>
            <a href="registration.php">SignUp Here</a>
        </div>
    </div>
</body>
</html>