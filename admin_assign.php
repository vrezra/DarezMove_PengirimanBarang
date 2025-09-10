<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pengiriman = $_POST['id_pengiriman'];
    $id_kurir = $_POST['id_kurir'];

    $query = "UPDATE pengiriman SET id_kurir='$id_kurir', status_pengiriman='Diproses' WHERE id_pengiriman='$id_pengiriman'";
    if ($conn->query($query)) {
        echo "<script>alert('Kurir berhasil diassign!'); window.location.href = 'admin_dashboard.php';</script>";
        exit;
    } else {
        echo "<script>alert('Terjadi kesalahan: " . addslashes($conn->error) . "');</script>";
    }
}

$pengiriman = $conn->query("SELECT * FROM pengiriman WHERE id_kurir IS NULL");
$kurir = $conn->query("SELECT * FROM kurir");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_assign.css">
    <title>Assign Kurir</title>
</head>
<body>
<h2>Assign Kurir ke Pengiriman</h2>
<form method="POST">
    <label>Pilih Pengiriman:</label><br>
    <select name="id_pengiriman" required>
        <?php while ($p = $pengiriman->fetch_assoc()): ?>
            <option value="<?= $p['id_pengiriman'] ?>">ID <?= $p['id_pengiriman'] ?> - <?= $p['nama_pengirim'] ?> ke <?= $p['nama_penerima'] ?></option>
        <?php endwhile; ?>
    </select><br><br>

    <label>Pilih Kurir:</label><br>
    <select name="id_kurir" required>
        <?php while ($k = $kurir->fetch_assoc()): ?>
            <option value="<?= $k['id_kurir'] ?>"><?= $k['nama_kurir'] ?> (<?= $k['kendaraan'] ?>)</option>
        <?php endwhile; ?>
    </select><br><br>

    <button type="submit">Assign Kurir</button>
</form>

<a href="admin_dashboard.php">Kembali ke Dashboard</a>
</body>
</html>
