<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping Platform | Form Kirim Barang</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap">
    <link rel="stylesheet" href="form_kirim.css">
</head>
<body>
    <div class="header">
        <div class="header-content">
            <div class="logo">Darez<span>Move</span></div>
        </div>
    </div>

    <div class="container">
        <div class="form-card">
            <h1>Form Kirim Barang</h1>

            <form action="detail_pengiriman.php" method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <label class="required-field">Nama Pengirim</label>
                        <input type="text" name="nama_pengirim" required>
                    </div>
                    <div class="form-group">
                        <label class="required-field">Nama Penerima</label>
                        <input type="text" name="nama_penerima" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="required-field">Alamat Pengirim</label>
                    <input type="text" name="alamat_pengirim" required>
                </div>

                <div class="form-group">
                    <label class="required-field">Alamat Penerima</label>
                    <input type="text" name="alamat_penerima" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="required-field">Berat Barang (kg)</label>
                        <input type="number" step="0.1" min="0.1" name="berat" required>
                    </div>
                    <div class="form-group">
                        <label class="required-field">Tanggal Pengiriman</label>
                        <input type="date" name="tanggal" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="required-field">Kendaraan</label>
                        <select name="kendaraan" required>
                            <option value="" disabled selected>Pilih Kendaraan</option>
                            <option value="Motor">Motor</option>
                            <option value="Mobil">Mobil</option>
                            <option value="Pickup">Pickup</option>
                            <option value="Van">Van</option>
                            <option value="Truck">Truck</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="required-field">Metode Pembayaran</label>
                        <select name="metode_pembayaran" required>
                            <option value="" disabled selected>Pilih Metode</option>
                            <option value="Cash">Cash</option>
                            <option value="Transfer Bank">Transfer Bank</option>
                            <option value="E-Wallet">E-Wallet</option>
                        </select>
                    </div>
                </div>

                <button type="submit">Continue</button>
            </form>
        </div>
    </div>
</body>
</html>