<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <form action="register.php" method="POST">
        <h4>Register User</h4>
        <img src="png/Dare.png">
        <input type="text" name="username" placeholder="Username"><br><br>
        <input type="text" name="nama_lengkap" placeholder="Nama Lengkap"><br><br>
        <input type="number" name="no_telepon" placeholder="Nomor Telepon"><br><br>
        <input type="password" name="password" placeholder="Password"><br><br>
        <input type="password" placeholder="Repeat Password"><br><br>
        <a href="form_login.php">Sudah Punya Akun?</a><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>