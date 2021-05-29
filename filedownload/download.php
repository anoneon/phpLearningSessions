<?php
    $file =$_GET['file'] . ".pdf";

    header("content-disposition: attachment; filename=" . urlencode($file));

    $f = fopen($file,"r");

    while(!feof($f)){
        echo fread($f,8194);
        flush();
    }

    fclose($f);



?>