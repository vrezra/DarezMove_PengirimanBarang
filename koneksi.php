<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_darezz";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
