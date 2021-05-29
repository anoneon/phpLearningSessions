<?php
    include 'connection.php';

    $idDel=$_GET['id'];

    $delQuery="delete from jobregistration where id={$idDel}";
    $exeQuery=mysqli_query($con,$delQuery);

    if($exeQuery){
                        
        ?>
        <script>
            alert("Data deleted successfully");
        </script>
        <?php header('location:display.php');
    }
    else{
        ?>
        <script>
            alert("deletion unsucessful");
        </script>
        <?php 
    }
?>