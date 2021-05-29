<?php

    $conn = mysqli_connect('localhost','root','','emailverification');

    if($conn){
        ?><script> alert("connected successfully");</script><?php
    }else{
        ?><script>alert("connection unsuccessful");</script><?php
    }
    ?>