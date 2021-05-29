<?php
    $heads = 0;
    $tails = 0;
    for($i=1;$i<=100;$i++){
        $randomNum = rand(1,2);
        if($randomNum ==1){
            ++$heads;
        }
        else{
            ++$tails;
        }
    }
    echo "heads = {$heads}, tails = {$tails}";
    if($heads>$tails){
        echo "<br>i Won";
    }
    elseif($tails>$heads){
        echo "<br>you Won";
    }
    else{
        echo "<br>Its a tie";
    }
?>