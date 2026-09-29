<?php

$isprime = true;
$primenum = 0;

for ($i =10;$i <= 50;$i++)
    {
        $num1 = $i;
        for($j=2;$j<=($num1-1);$j++)
            {
                if($num1 % $j !=0)
                    {
                       $primenum = $num1;
                    }
                else
                    $isprime = false;
            }
        if($isprime)
            {
                echo "$primenum is a prime number<br>";
            }
        $isprime = true;
    }


?>