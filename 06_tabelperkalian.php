<?php
header('Content-Type: text/plain; charset=UTF-8');

echo "Tabel Perkalian 1 sampai 10\n\n";

printf("%4s", "x");
for ($kolom = 1; $kolom <= 10; $kolom++) {
    printf("%4d", $kolom);
}
echo PHP_EOL;

for ($baris = 1; $baris <= 10; $baris++) {
    printf("%4d", $baris);

    for ($kolom = 1; $kolom <= 10; $kolom++) {
        printf("%4d", $baris * $kolom);
    }

    echo PHP_EOL;
}
