<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "db_darezz");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Lnama = $_POST['nama_lengkap'];
    $Uname = $_POST['username'];
    $nomor_telepon = $_POST['no_telepon'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash Password

    // Validasi jika field kosong
    if (empty($Lnama) || empty($Uname) || empty($nomor_telepon) || empty($_POST['password'])) {
        echo "<script>
        alert('Semua field harus diisi!');
        location.href = 'form_register.php';
        </script>";
    } else {
        // Cek apakah username sudah terdaftar
        $cekUsername = $conn->prepare("SELECT id_pengirim FROM user WHERE username = ?");
        $cekUsername->bind_param("s", $Uname);
        $cekUsername->execute();
        $cekUsername->store_result();

        if ($cekUsername->num_rows > 0) {
            // Username sudah ada
            echo "<script>
            alert('Username sudah terdaftar. Silakan gunakan username lain.');
            location.href = 'form_register.php';
            </script>";
        } else {
            // Username belum ada, lanjut insert data
            $sql = "INSERT INTO user (nama_lengkap, username, no_telepon, password) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $Lnama, $Uname, $nomor_telepon, $password);
            
            if ($stmt->execute()) {
                echo "<script>
                alert('Registrasi berhasil! Silakan login.');
                location.href = 'form_login.php';
                </script>";
            } else {
                echo "Registrasi gagal: " . $conn->error;
            }

            $stmt->close();
        }
        $cekUsername->close();
    }
}
$conn->close();
?>
