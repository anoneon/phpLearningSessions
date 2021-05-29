<?php
    $val = $_GET['selectedvalue'];

    $f1 = array('laravel','codeignitor');
    $f2 = array('react','angular');
    $f3 = array('flask','django');

    switch($val){
        case 'PHP':foreach($f1 as $f){
            echo "<option>$f</option>";
        }
    break;
        case 'JS':foreach($f2 as $f){
            echo "<option>$f</option>";
        }
    break;
        case 'PYTHON':foreach($f3 as $f){
            echo "<option>$f</option>";
        }
    break;
    }

?>