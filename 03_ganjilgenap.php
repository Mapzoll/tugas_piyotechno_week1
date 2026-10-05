<?php
if (isset($_GET['angka']) && $_GET['angka'] !== '') {
    $angka = filter_var($_GET['angka'], FILTER_VALIDATE_INT);
    if ($angka !== false) {
        $hasil = ($angka % 2 === 0) ? 'genap' : 'ganjil';
    } else {
        $error = 'Masukkan bilangan bulat yang valid.';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cek Ganjil Genap</title>
</head>

<body>
    <h1>Cek Bilangan Ganjil atau Genap</h1>
    <form method="get">
        <label for="angka">Masukkan bilangan bulat:</label>
        <input type="number" name="angka" id="angka" step="1" required>
        <button type="submit">Periksa</button>
    </form>

    <?php if (isset($hasil)): ?>
        <p>Bilangan <?= htmlspecialchars((string) $angka, ENT_QUOTES, 'UTF-8') ?> adalah <strong><?= $hasil ?></strong>.</p>
    <?php elseif (isset($error)): ?>
        <p><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>
</body>
</html>