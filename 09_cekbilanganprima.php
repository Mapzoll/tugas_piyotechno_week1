<?php
function cekBilanganPrima($n) {
    if ($n <= 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}
echo "Program Cek Bilangan Prima \n";
echo "Masukkan angka yang ingin dicek: ";
$input = fgets(STDIN);
$angka = intval(trim($input));
echo "\nHasil\n";
if (cekBilanganPrima($angka)) {
    echo "Angka $angka adalah BILANGAN PRIMA.\n";
} else {
    echo "Angka $angka BUKAN bilangan prima.\n";
}
?>