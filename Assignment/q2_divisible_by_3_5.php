<?php
$num = 15;

if ($num % 3 == 0 && $num % 5 == 0) {
    echo "$num is divisible by both 3 and 5";
} elseif ($num % 3 == 0) {
    echo "$num is divisible by 3";
} elseif ($num % 5 == 0) {
    echo "$num is divisible by 5";
} else {
    echo "$num is not divisible by 3 or 5";
}
?>