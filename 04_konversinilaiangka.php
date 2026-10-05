<?php
$nilai = '';
$huruf = null;
$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$nilai = trim($_POST['nilai'] ?? '');

	if ($nilai === '' || !is_numeric($nilai) || $nilai < 0 || $nilai > 100) {
		$pesan = 'Masukkan nilai angka antara 0 dan 100.';
	} else {
		$angka = (float) $nilai;
		if ($angka >= 80) {
			$huruf = 'A';
		} elseif ($angka >= 70) {
			$huruf = 'B';
		} elseif ($angka >= 60) {
			$huruf = 'C';
		} elseif ($angka >= 50) {
			$huruf = 'D';
		} else {
			$huruf = 'E';
		}
	}
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Konversi Nilai Angka ke Huruf</title>
</head>
<body>
	<h1>Konversi Nilai Angka ke Huruf</h1>
	<form method="post">
		<label for="nilai">Masukkan nilai (0–100):</label>
		<input type="number" id="nilai" name="nilai" min="0" max="100" step="any" required
                value="<?= htmlspecialchars($nilai, ENT_QUOTES, 'UTF-8') ?>">
		<button type="submit">Konversi</button>
	</form>

	<?php if ($pesan !== ''): ?>
		<p><?= htmlspecialchars($pesan, ENT_QUOTES, 'UTF-8') ?></p>
	<?php elseif ($huruf !== null): ?>
		<p>Nilai huruf: <strong><?= $huruf ?></strong></p>
	<?php endif; ?>
</body>
</html>
