<?php
$a = 1;
$b = 2;
$c = 3;

// Greatest
if ($a > $b && $a > $c) {
    echo "Greatest: $a <br>";
} elseif ($b > $a && $b > $c) {
    echo "Greatest: $b <br>";
} else {
    echo "Greatest: $c <br>";
}

// Smallest
if ($a < $b && $a < $c) {
    echo "Smallest: $a";
} elseif ($b < $a && $b < $c) {
    echo "Smallest: $b";
} else {
    echo "Smallest: $c";
}
?>