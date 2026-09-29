<?php

$number = 12345;
$reversed = 0;

while ($number > 0) {
    $lastDigit = $number % 10;
    $reversed = ($reversed * 10) + $lastDigit;
    $number = (int)($number / 10);
}

echo "Reversed: $reversed";

?>