<?php
include 'koneksi.php';

$id_pengiriman = $_POST['id_pengiriman'];
$metode_pembayaran = $_POST['metode_pembayaran'];

$query = "UPDATE pengiriman 
          SET metode_pembayaran = '$metode_pembayaran', status_pembayaran = 'menunggu konfirmasi'
          WHERE id_pengiriman = $id_pengiriman";

if ($conn->query($query)) {
    echo "<script>
        alert('Pembayaran berhasil diajukan. Menunggu konfirmasi admin.');
        window.location.href = 'status_pengiriman.php';
    </script>";
} else {
    echo "<script>
        alert('Gagal mengupdate status pembayaran.');
        window.history.back();
    </script>";
}

$conn->close();
?>
