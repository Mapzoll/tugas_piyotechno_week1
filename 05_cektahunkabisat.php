<?php
function isKabisat($tahun) {
    if ($tahun % 400 == 0) {
        return true;
    } elseif ($tahun % 100 == 0) {
        return false;
    } elseif ($tahun % 4 == 0) {
        return true;
    }

    return false;
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Tahun Kabisat</title>
</head>
<body>
    <h1>Cek Tahun Kabisat</h1>
    <form method="post">
        <label for="tahun">Masukkan tahun:</label>
        <input type="number" id="tahun" name="tahun" min="1" required
            value="<?= htmlspecialchars($_POST['tahun'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        <button type="submit">Cek</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tahun'])) {
        $tahun = filter_var($_POST['tahun'], FILTER_VALIDATE_INT);
        if ($tahun !== false && $tahun > 0) {
            if (isKabisat($tahun)) {
                echo "<p>$tahun adalah tahun kabisat.</p>";
            } else {
                echo "<p>$tahun bukan tahun kabisat atau tahun biasa.</p>";
            }
        } else {
            echo '<p>Masukkan tahun yang valid.</p>';
        }
    }
    ?>
</body>
</html>


