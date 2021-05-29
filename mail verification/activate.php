<?php
    session_start();

    include 'dbcon.php';
    
    if(isset($_GET['token'])){
        $token=$_GET['token'];

        $updateQuery = "update registration set status='active' where token='$token'";
        $exec = mysqli_query($conn,$updateQuery);

        if($exec){
            if(isset($_SESSION['msg'])){
                $_SESSION['msg']="account activation successful enter details to login";
                header('location:login.php');
            }else{
                $_SESSION['msg']="you are logged out";
                header('location:login.php');
            }
        }else{
            $_SESSION['msg']="Unsuccessful";
                header('location:registration.php');
        }
    }

?>