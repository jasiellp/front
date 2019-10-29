<?php 
$i = 1;
do{
    $count = 0;
    for($j = 1; $j <= 15; $j++){

        if($i % $j == 0){
            $count++;
        }
    }

    if($count == 15){
        echo "<br/>$i";
    }
    $i++;
}while($count < 15);

