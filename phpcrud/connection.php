<?php

    $username = "root";
    $password = "";
    $server = 'localhost';
    $db = 'crudprac';

    $con = mysqli_connect($server,$username,$password,$db);

    if($con){
    ?>
        <script>
            console.log("successful");
        </script>
    <?php
    }
    else{?>
        <script>
            console.lg("successful");
        </script>
        <?php
    }
?>