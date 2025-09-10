<?php
session_start();
$conn = new mysqli("localhost", "root", "", "db_darezz");

if (!isset($_SESSION['id_pengirim'])) {
    echo "<script>alert('Anda belum login!');location.href='form_login.php';</script>";
    exit();
}

// Ambil data dari form
$nama_pengirim = $_POST['nama_pengirim'];
$alamat_pengirim = $_POST['alamat_pengirim'];
$nama_penerima = $_POST['nama_penerima'];
$alamat_penerima = $_POST['alamat_penerima'];
$berat = $_POST['berat'];
$kendaraan = $_POST['kendaraan'];
$tanggal = $_POST['tanggal'];
$metode_pembayaran = $_POST['metode_pembayaran'];

$id_pengirim = $_SESSION['id_pengirim'];

// Gunakan jarak default (misalnya 10 km)
$jarak = 10;  // Jarak default dalam kilometer

// Hitung total biaya
$biaya_kendaraan = 0;
switch ($kendaraan) {
    case 'Motor': $biaya_kendaraan = 10000; break;
    case 'Mobil': $biaya_kendaraan = 20000; break;
    case 'Pickup': $biaya_kendaraan = 30000; break;
    case 'Van': $biaya_kendaraan = 40000; break;
    case 'Truck': $biaya_kendaraan = 50000; break;
    case 'Motor Listrik': $biaya_kendaraan = 8000; break;
    case 'Mobil Listrik': $biaya_kendaraan = 15000; break;
    default: $biaya_kendaraan = 0; break;
}

// Total biaya (biaya berdasarkan jarak, berat, dan jenis kendaraan)
$total_biaya = ($jarak * 2000) + ($berat * 500) + $biaya_kendaraan;

$status = 'Diproses'; // Status awal pengiriman

// Insert data ke tabel alamat
$conn->query("INSERT INTO alamat (alamat_pengirim, alamat_penerima) VALUES ('$alamat_pengirim', '$alamat_penerima')");
$id_alamat = $conn->insert_id; // Mendapatkan id alamat yang baru saja diinsert

// Insert data pengiriman ke tabel pengiriman
$sql = "INSERT INTO pengiriman (id_pengirim, id_alamat, nama_pengirim, nama_penerima, jarak, berat, kendaraan, tanggal_pengiriman, metode_pembayaran, total_biaya, status_pengiriman)
        VALUES ('$id_pengirim', '$id_alamat', '$nama_pengirim', '$nama_penerima', '$jarak', '$berat', '$kendaraan', '$tanggal', '$metode_pembayaran', '$total_biaya', '$status')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Data pengiriman berhasil disimpan!');location.href='status_pengiriman.php';</script>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
