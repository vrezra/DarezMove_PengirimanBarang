<?php
session_start();

// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "db_darezz");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $password = $_POST['password'];

    // Validasi jika field kosong
    if (empty($name) || empty($password)) {
        echo "<script>alert ('username dan Password wajib di isi!');
    location.href = 'form_login.php';
    </script>";
    } else {
        // Cek email di database
        $sql = "SELECT * FROM user WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Verifikasi password
            if (password_verify($password, $row['password'])) {
                $_SESSION['id_pengirim'] = $row['id_pengirim'];
                $_SESSION['username'] = $row['username'];
                echo "<script>
                alert ('Login Berhasil');
                location.href = 'form_kirim.php'
                </script>";
                exit();
            } else {
                echo "<script>alert ('Password salah!')
                location.href = 'form_login.php';
                </script>";
            }
        } else {
            echo "<script>alert ('username tidak terdaftar!')
            location.href = 'form_login.php';
            </script>";
        }
        $stmt->close();
    }
}
$conn->close();
?>
