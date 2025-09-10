<?php
session_start();
$conn = new mysqli("localhost", "root", "", "db_darezz");

// Cek apakah admin sudah login
if (!isset($_SESSION['admin_logged_in'])) {
    echo "<script>alert('Login sebagai Admin dulu!'); location.href='admin_login.php';</script>";
    exit();
}

// Update status pengiriman
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pengiriman = $_POST['id_pengiriman'];
    $status = $_POST['status_pengiriman'];

    $query = "UPDATE pengiriman SET status_pengiriman = ? WHERE id_pengiriman = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $status, $id_pengiriman);

    if ($stmt->execute()) {
        echo "<script>alert('Status berhasil diubah!'); location.href='admin_dashboard.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah status.'); location.href='admin_dashboard.php';</script>";
    }
}
?>
