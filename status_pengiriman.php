<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="status_pengiriman.css">
    <title>Status Pengiriman</title>
</head>
<body>
<?php
session_start();
include 'koneksi.php';

$id_pengirim = $_SESSION['id_pengirim'];

$query = "SELECT pengiriman.*, kurir.nama_kurir, kurir.no_hp_kurir, kurir.kendaraan 
          FROM pengiriman 
          LEFT JOIN kurir ON pengiriman.id_kurir = kurir.id_kurir 
          WHERE pengiriman.id_pengirim = $id_pengirim";
$result = $conn->query($query);

echo "<h1>Status Pengiriman Anda</h1>";

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
            <th>ID Pengiriman</th>
            <th>Tanggal</th>
            <th>Total Biaya</th>
            <th>Status</th>
            <th>Kurir</th>
            <th>Metode Pembayaran</th>
            <th>Aksi</th>
            <th>Status Pembayaran</th>
          </tr>";
    while($row = $result->fetch_assoc()) {
        $kurirInfo = !empty($row['nama_kurir']) 
            ? $row['nama_kurir'] . "<br>Telp: " . $row['no_hp_kurir'] . "<br>Kendaraan: " . $row['kendaraan'] 
            : "Belum ditetapkan";

        echo "<tr>";
        echo "<td>" . $row['id_pengiriman'] . "</td>";
        echo "<td>" . $row['tanggal_pengiriman'] . "</td>";
        echo "<td>Rp " . number_format($row['total_biaya'] ?? 0) . "</td>";
        echo "<td data-status='" . strtolower($row['status_pengiriman']) . "'>" . $row['status_pengiriman'] . "</td>";
        echo "<td>$kurirInfo</td>";
        echo "<td>" . ($row['metode_pembayaran'] ?? 'Belum dipilih') . "</td>";

        echo "<td>";
        $status = strtolower($row['status_pengiriman'] ?? '');

        $status_pembayaran = strtolower($row['status_pembayaran'] ?? 'belum dibayar');

        if ($status == 'diproses' && $status_pembayaran !== 'terkonfirmasi') {
            echo "<form action='pembayaran.php' method='POST'>
                <input type='hidden' name='id_pengiriman' value='" . $row['id_pengiriman'] . "'>
                <input type='hidden' name='metode_pembayaran' value='" . $row['metode_pembayaran'] . "'>
                <button type='submit'>Lanjutkan Pembayaran</button>
            </form>";
        } else {
            echo "-";
        }
        echo "</td>";
        echo "<td data-payment='" . strtolower($row['status_pembayaran'] ?? 'belum dibayar') . "'>" . ($row['status_pembayaran'] ?? 'belum dibayar') . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Belum ada pengiriman.";
}

$conn->close();
?>
</body>
</html>
