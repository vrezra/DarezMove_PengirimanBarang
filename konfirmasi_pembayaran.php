<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['admin_logged_in'])) {
    echo "<script>alert('Harap login sebagai admin!'); location.href='admin_login.php';</script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_pengiriman'])) {
    $id = intval($_POST['id_pengiriman']);
    $query = "UPDATE pengiriman SET status_pembayaran = 'terkonfirmasi' WHERE id_pengiriman = $id";

    if ($conn->query($query)) {
        echo "<script>alert('Pembayaran dikonfirmasi.'); location.href='admin_dashboard.php';</script>";
    } else {
        echo "<script>alert('Gagal mengkonfirmasi pembayaran.'); history.back();</script>";
    }
} else {
    echo "<script>alert('Permintaan tidak valid.'); history.back();</script>";
}
?>
