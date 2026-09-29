<?php

$num1= 25;

$isprime= true;

for($i=2;$i<=($num1 -1);$i++)
    {
        if ($num1 % $i ==0){
            $isprime = false;
            break;
        }
    }

if($isprime)
    {
        echo "$num1 is a prime number";
    }
else
    echo "$num1 is not a prime";
?>