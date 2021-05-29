<?php

    $username = "root";
    $password = "";
    $server = 'localhost';
    $db = 'upload';

    $con = mysqli_connect($server,$username,$password,$db);

    if($con){
    ?>
        <script>
            alert("successful");
        </script>
    <?php
    }
    else{?>
        <script>
            alert("unsuccessful");
        </script>
        <?php
    }
?>