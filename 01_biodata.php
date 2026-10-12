<!-- <?php
$Nama = "Alfian";
$Umur = 20;
$Jenis_kelamin = "Laki-laki";
$Alamat = "Jalan Perintis Bulak Jaya No 70, Jakarta Timur";

echo "Nama: $Nama \n";
echo "Umur: $Umur \n";
echo "Jenis Kelamin: $Jenis_kelamin \n";
echo "Alamat: $Alamat \n";
?> -->

<?php
$nama = trim($_POST['nama'] ?? '');
$umur = trim($_POST['umur'] ?? '');
$jenisKelamin = $_POST['jenis_kelamin'] ?? '';
$alamat = trim($_POST['alamat'] ?? '');
$sudahDikirim = $_SERVER['REQUEST_METHOD'] === 'POST';
$error = '';

if ($sudahDikirim) {
    if ($nama === '' || $umur === '' || $jenisKelamin === '' || $alamat === '') {
        $error = 'Semua kolom wajib diisi.';
    } elseif (filter_var($umur, FILTER_VALIDATE_INT) === false || (int) $umur < 0) {
        $error = 'Umur harus berupa angka bulat nol atau lebih.';
    } elseif (!in_array($jenisKelamin, ['Laki-laki', 'Perempuan'], true)) {
        $error = 'Pilih jenis kelamin yang tersedia.';
    }
}

function aman(string $nilai): string
{
    return htmlspecialchars($nilai, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input Biodata</title>
    <style>
        body {
            margin: 0;
            padding: 32px 16px;
            background: #f1f5f9;
            color: #1e293b;
            font-family: Arial, sans-serif;
        }
        main {
            max-width: 520px;
            margin: 0 auto;
            padding: 28px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(15, 23, 42, .08);
        }
        h1 { margin-top: 0; }
        label {
            display: block;
            margin: 16px 0 6px;
            font-weight: bold;
        }
        input, select, textarea, button {
            box-sizing: border-box;
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font: inherit;
        }
        textarea { min-height: 90px; resize: vertical; }
        button {
            margin-top: 20px;
            border: 0;
            background: #2563eb;
            color: white;
            cursor: pointer;
        }
        button:hover { background: #1d4ed8; }
        .pesan {
            margin-top: 20px;
            padding: 14px;
            border-radius: 6px;
            background: #eff6ff;
        }
        .error { color: #b91c1c; }
    </style>
</head>
<body>
<main>
    <h1>Form Biodata</h1>
    <p>Isi formulir berikut, lalu tekan tombol untuk menampilkan biodata.</p>

    <?php if ($error !== ''): ?>
        <p class="error" role="alert"><?= aman($error) ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label for="nama">Nama</label>
        <input id="nama" name="nama" type="text" value="<?= aman($nama) ?>" required>

        <label for="umur">Umur</label>
        <input id="umur" name="umur" type="number" min="0" step="1" value="<?= aman($umur) ?>" required>

        <label for="jenis_kelamin">Jenis kelamin</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="">-- Pilih jenis kelamin --</option>
            <option value="Laki-laki" <?= $jenisKelamin === 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
            <option value="Perempuan" <?= $jenisKelamin === 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
        </select>

        <label for="alamat">Alamat</label>
        <textarea id="alamat" name="alamat" required><?= aman($alamat) ?></textarea>

        <button type="submit">Tampilkan Biodata</button>
    </form>

    <?php if ($sudahDikirim && $error === ''): ?>
        <section class="pesan" aria-live="polite">
            <h2>Biodata Anda</h2>
            <p><strong>Nama:</strong> <?= aman($nama) ?></p>
            <p><strong>Umur:</strong> <?= aman($umur) ?> tahun</p>
            <p><strong>Jenis kelamin:</strong> <?= aman($jenisKelamin) ?></p>
            <p><strong>Alamat:</strong> <?= nl2br(aman($alamat)) ?></p>
        </section>
    <?php endif; ?>
</main>
</body>
</html>