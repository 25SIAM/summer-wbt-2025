<?php
$principale = 1000;
$rate = 4;
$time = 2;

$simple_interest = ($principle*$rate*$time)/100 ;
echo "Simple Interest: $simple_interest\n" ;

// 2. 
echo "Swap Two Numbers Without Third Variable";
$a = 10;
$b = 20;
echo "Before Swap: A = $a, B = $b";
$a = $a + $b;
$b = $a - $b;
$a = $a - $b;
echo "After Swap: A = $a, B = $b";

// 3.
echo "Leap Year Check";
$year = 2025;
if (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) {
    echo "$year is a Leap Year<br><br>";
} else {
    echo "$year is NOT a Leap Year<br><br>";
}

// 4.
echo "Factoria check"
$num = 5;
$factorial = 1;
for ($i = 1; $i <= $num; $i++) {
    $factorial *= $i;
}
echo "Factorial of $num is $factorial<br><br>";

// 5. Prime Numbers Between 1 to 50
echo "Prime Numbers";
for ($i = 2; $i <= 50; $i++) {
    $isPrime = true;
    for ($j = 2; $j <= sqrt($i); $j++) {
        if ($i % $j == 0) {
            $isPrime = false;
            break;
        }
    }
    if ($isPrime) {
        echo "$i ";
    }
}
echo "<br><br>";

// 6. Pattern Printing
echo "Pattern 1";
for ($i = 5; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}
echo "Pattern 2";
for ($i = 1; $i <= 4; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "$j ";
    }
    echo "<br>";
}

echo "Pattern 3";
for ($i = 1; $i <= 4; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo chr(64 + $i) . " ";
    }
    echo "<br>";
}

?>
