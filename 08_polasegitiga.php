<?php
$tinggi = 5;

for ($baris = 1; $baris < $tinggi; $baris++) { 
    for ($kolom = 1; $kolom <= $baris; $kolom++) {
        echo "* ";
    }
    echo "\n";
}

for ($baris = $tinggi; $baris >= 1; $baris--) {
    for ($kolom = 1; $kolom <= $baris; $kolom++) {
        echo "* ";
    }
    echo "\n";
}
?>