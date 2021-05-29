<?php
    session_start();

    session_destroy();

    setcookie('user','',time()-86400);
    setcookie('pass','',time()-86400);
    header('location:login.php');
?>