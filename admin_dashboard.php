<?php
session_start();
$conn = new mysqli("localhost", "root", "", "db_darezz");

// Cek apakah sudah login sebagai admin
if (!isset($_SESSION['admin_logged_in'])) {
    echo "<script>alert('Login sebagai Admin dulu!'); location.href='admin_login.php';</script>";
    exit();
}

// Cek apakah ada pencarian
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

$query = "SELECT pengiriman.*, alamat.alamat_pengirim, alamat.alamat_penerima, status_pengiriman, 
                 kurir.nama_kurir, kurir.no_hp_kurir, kurir.kendaraan, pengiriman.status_pembayaran
          FROM pengiriman
          JOIN alamat ON pengiriman.id_alamat = alamat.id_alamat
          LEFT JOIN kurir ON pengiriman.id_kurir = kurir.id_kurir";

if (!empty($search)) {
    $query .= " WHERE 
        pengiriman.nama_pengirim LIKE '%$search%' OR 
        alamat.alamat_penerima LIKE '%$search%' OR 
        pengiriman.id_pengiriman LIKE '%$search%'";
}

$result = $conn->query($query);

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="admin_dashboard.css">
</head>
<body>
    <h2>Dashboard Admin - Atur Status Pengiriman</h2>

    <!-- Form Pencarian -->
    <form method="get" action="" style="margin-bottom:20px;">
        <input type="text" name="search" placeholder="Cari nama pengirim" value="<?= htmlspecialchars($search); ?>">
        <button type="submit">Cari</button>
        <?php if (!empty($search)): ?>
            <a href="admin_dashboard.php" style="margin-left:10px;">Reset</a>
        <?php endif; ?>
    </form>     
   <a href="admin_assign.php">Assign Kurir</a>
    <table>
        <thead>
            <tr>
                <th>ID Pengiriman</th>
                <th>Nama Pengirim</th>
                <th>Alamat Tujuan</th>
                <th class="wide">Total Biaya</th>
                <th>Status</th>
                <th class="wide">Update Status</th>
                <th>Kurir</th>
                <th>Status Pembayaran</th>
                <th>Konfirmasi Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id_pengiriman']; ?></td>
                    <td><?= htmlspecialchars($row['nama_pengirim']); ?></td>
                    <td><?= htmlspecialchars($row['alamat_penerima']); ?></td>
                    <td>Rp <?= number_format($row['total_biaya'], 0, ',', '.'); ?></td>
                    <td><?= $row['status_pengiriman']; ?></td>
                    <td>
                        <form action="ubah_status.php" method="post" style="display:inline;">
                            <input type="hidden" name="id_pengiriman" value="<?= $row['id_pengiriman']; ?>">
                            <select name="status_pengiriman">
                                <option value="Proses" <?= $row['status_pengiriman'] == 'Proses' ? 'selected' : ''; ?>>Proses</option>
                                <option value="Dikirim" <?= $row['status_pengiriman'] == 'Dikirim' ? 'selected' : ''; ?>>Dikirim</option>
                                <option value="Selesai" <?= $row['status_pengiriman'] == 'Selesai' ? 'selected' : ''; ?>>Selesai</option>
                            </select>
                            <button type="submit">Ubah</button>
                        </form>
                    </td>
                    <td>
                        <?php if (!empty($row['nama_kurir'])): ?>
                            <button 
                                type="button" 
                                onclick="showKurir(
                                    '<?= htmlspecialchars($row['nama_kurir']); ?>', 
                                    '<?= htmlspecialchars($row['no_hp_kurir']); ?>', 
                                    '<?= htmlspecialchars($row['kendaraan']); ?>')">
                                Lihat Kurir
                            </button>
                        <?php else: ?>
                        Belum Assign
                        <?php endif; ?>
                    </td>
                    <td><?= $row['status_pembayaran'] ?? 'belum dibayar'; ?></td>
                    <td>
                        <?php if ($row['status_pembayaran'] === 'menunggu konfirmasi'): ?>
                            <form action="konfirmasi_pembayaran.php" method="post" onsubmit="return confirm('Yakin ingin konfirmasi pembayaran ini?')">
                                <input type="hidden" name="id_pengiriman" value="<?= $row['id_pengiriman']; ?>">
                                <button type="submit">Konfirmasi</button>
                            </form>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="7" style="text-align:center;">Data tidak ditemukan.</td></tr> 
            <?php endif; ?>
        </tbody>
    </table>
    <!-- Modal -->
    <div id="kurirModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%;
        background:rgba(0,0,0,0.5); justify-content:center; align-items:center;">
        <div style="background:white; padding:20px; border-radius:10px; width:300px; position:relative;">
            <h3>Detail Kurir</h3>
            <p><strong>Nama Kurir:</strong> <span id="namaKurir"></span></p>
            <p><strong>Telepon Kurir:</strong> <span id="teleponKurir"></span></p>
            <p><strong>Kendaraan:</strong> <span id="kendaraanKurir"></span></p>
            <button onclick="closeModal()">Tutup</button>
        </div>
    </div>
    <script>
        function showKurir(nama, telepon, kendaraan) {
        document.getElementById('namaKurir').textContent = nama;
        document.getElementById('teleponKurir').textContent = telepon;
        document.getElementById('kendaraanKurir').textContent = kendaraan;
        document.getElementById('kurirModal').style.display = 'flex';
        }


        function closeModal() {
            document.getElementById('kurirModal').style.display = 'none';
        }
    </script>
</body>
</html>
