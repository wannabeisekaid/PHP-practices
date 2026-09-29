<?php

$a=50;

while($a >= 2)
    {
        if($a % 5 == 0 && $a % 2 ==0){
            echo "$a is divisible by both 5 and 2<br>";
            $a--;
            }
        else
            $a--;  
    }

?>