<?php

$num1 = 34;
$num2 = 64;

$hcf=1;
$i=$num1;

while ($i >0 )
    {
        if ($num1 % $i == 0 && $num2 % $i ==0)
            {
                $hcf= $i;
                break;
            }
        $i--;
    }

echo "the hcf is $hcf";

?>