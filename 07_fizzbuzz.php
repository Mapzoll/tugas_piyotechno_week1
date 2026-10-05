<?php
for ($i = 1; $i <= 100; $i++) {
    // kelipatan 3 dan 5 (kelipatan 15)
    if ($i % 15 == 0) {
        echo "FizzBuzz\n";
    } 
    // kelipatan 3
    elseif ($i % 3 == 0) {
        echo "Fizz\n";
    } 
    // kelipatan 5
    elseif ($i % 5 == 0) {
        echo "Buzz\n";
    } 
    // Jika bukan kelipatan keduanya, cetak angkanya
    else {
        echo $i . "\n";
    }
}
?>