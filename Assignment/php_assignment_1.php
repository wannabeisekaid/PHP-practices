<?php

// ===================================================================
// PHP Assignment 1 - All Questions Combined
// ===================================================================

echo "<h2>Question 1: Greatest and Smallest of Three Numbers</h2>";

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


echo "<h2>Question 2: Divisible by 3, 5, Both, or Neither</h2>";

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


echo "<h2>Question 3: Odd Numbers (2-20) and Even Numbers (35-7)</h2>";

$a = 2;
while ($a <= 19) {
    $a++;
    if ($a % 2 == 1)
        echo "$a,";
}

echo "<br>";

$b = 35;
do {
    $b--;
    if ($b % 2 == 0)
        echo "$b,";
} while ($b > 7);


echo "<h2>Question 4: Divisible by Both 2 and 5 (50 down to 2)</h2>";

$a = 50;
while ($a >= 2) {
    if ($a % 5 == 0 && $a % 2 == 0) {
        echo "$a is divisible by both 5 and 2<br>";
        $a--;
    } else {
        $a--;
    }
}


echo "<h2>Question 5: Reverse a Number</h2>";

$number = 12345;
$reversed = 0;

while ($number > 0) {
    $lastDigit = $number % 10;
    $reversed = ($reversed * 10) + $lastDigit;
    $number = (int)($number / 10);
}

echo "Reversed: $reversed";


echo "<h2>Question 6: LCM of Two Numbers</h2>";

$a = 6;
$b = 1;
while ($a % 4 != 0) {
    $a = 6 * $b;
    $b++;
}
echo "the lcm of 6 and 4 is =" . $a;


echo "<h2>Question 7: HCF of Two Numbers</h2>";

$num1 = 34;
$num2 = 64;

echo "$num1 <br>";
echo "$num2 <br>";


$hcf = 1;
$i = $num1;

while ($i > 0) {
    if ($num1 % $i == 0 && $num2 % $i == 0) {
        $hcf = $i;
        break;
    }
    $i--;
}

echo "the hcf is $hcf";


echo "<h2>Question 8: Multiplication Table</h2>";

echo '<table border="1">';

for ($i = 1; $i <= 12; $i++) {
    echo '<tr>';
    for ($j = 1; $j <= 12; $j++) {
        echo "<td>" . ($i * $j) . "</td>";
    }
    echo '</tr>';
}

echo '</table>';


echo "<h2>Question 9: Prime or Non-Prime Check</h2>";

$num1 = 25;

$isprime = true;

for ($i = 2; $i <= ($num1 - 1); $i++) {
    if ($num1 % $i == 0) {
        $isprime = false;
        break;
    }
}

if ($isprime) {
    echo "$num1 is a prime number";
} else {
    echo "$num1 is not a prime";
}


echo "<h2>Question 10: Prime Numbers in a Range (10-50)</h2>";

$isprime = true;
$primenum = 0;

for ($i = 10; $i <= 50; $i++) {
    $num1 = $i;
    for ($j = 2; $j <= ($num1 - 1); $j++) {
        if ($num1 % $j != 0) {
            $primenum = $num1;
        } else {
            $isprime = false;
        }
    }
    if ($isprime) {
        echo "$primenum is a prime number<br>";
    }
    $isprime = true;
}

?>
