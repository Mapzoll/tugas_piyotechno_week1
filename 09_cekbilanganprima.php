<?php
function cekBilanganPrima($n) {
    // Angka kurang dari atau sama dengan 1 bukan bilangan prima
    if ($n <= 1) {
        return "$n bukan bilangan prima.";
    }

    // Cek pembagian dari angka 2 sampai $n - 1
    for ($i = 2; $i < $n; $i++) {
        if ($n % $i == 0) {
            return "$n bukan bilangan prima (habis dibagi $i).";
        }
    }

    return "$n adalah bilangan prima.";
}

// Contoh penggunaan:
$angka = 97;
echo cekBilanganPrima($angka);
?>