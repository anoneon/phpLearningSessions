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
                    $username=mysqli_real_escape_string($con,$_POST['username']);
                    $email=mysqli_real_escape_string($con,$_POST['email']);
                    $number=mysqli_real_escape_string($con,$_POST['number']);
                    $password=mysqli_real_escape_string($con,$_POST['password']);
                    $rpassword=mysqli_real_escape_string($con,$_POST['rpassword']);

                    $passH = password_hash($password,PASSWORD_BCRYPT);
                    $rpassH = password_hash($rpassword,PASSWORD_BCRYPT);

                    $selectQuery = "select * from registration where email='$email'";
                    
                    $sQueryExe = mysqli_query($con,$selectQuery);

                    $emailCount = mysqli_num_rows($sQueryExe);
                
                    if($emailCount>0){
                        ?>
                            <script>
                                alert("Email already exists");
                            </script>
                            <?php
                    }
                    else{
                        if($password===$rpassword){
                            $insertQuery="insert into registration(username,email,number,password,rpassword) VALUES ('$username','$email','$number','$passH','$rpassH')";

                            $iQueryExec = mysqli_query($con,$insertQuery);

                            if($iQueryExec){
                                ?>
                                    <script>
                                        alert("Account Successfully Created");
                                    </script>
                                    <?php
                            }
                            else{
                                ?>
                                    <script>
                                        alert("Account Successfully Created");
                                    </script>
                                    <?php
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
                    <input type="text" name="username" id="" placeholder="Name" required>
                    <input type="email" name="email" id="" placeholder="email" required>
                    <input type="text" name="number" id="" placeholder="num" required>
                    <input type="password" name="password" id="" placeholder="password" required>
                    <input type="password" name="rpassword" id="" placeholder="re enter" required>
                    <button class="btn" type="submit" name="submit">create Now</button>
                </div>
            </form>
            <p>Have account already</p>
            <a href="login.php">LOGIN here</a>

        </div>
    </div>
</body>
</html>