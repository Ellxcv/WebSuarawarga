<?php
session_start(); // Mulai session

// Cek apakah pengguna sudah login
if (isset($_SESSION["username"])) {
    header("Location: admin.php");
    exit;
}

// Simpan data pengguna dalam array sementara (hanya untuk contoh ini)
$users = isset($_SESSION['users']) ? $_SESSION['users'] : [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari formulir login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cari pengguna yang cocok
    foreach ($users as $user) {
        if ($user['username'] === $username && password_verify($password, $user['password'])) {
            // Login berhasil, set session
            $_SESSION["username"] = $username;
            
            // Set cookie jika login berhasil
            setcookie("username", $username, time() + (86400 * 30), "/"); // Cookie berlaku selama 30 hari

            // Redirect ke halaman index.php setelah login sukses
            header("Location: index.php");
            exit;
        }
    }

    // Jika login gagal, tampilkan pesan error
    $login_error = "Username atau password salah. Silakan coba lagi.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/login.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <form action="login.php" method="post">
            <h1>Login</h1>
            <?php if (isset($login_error)) echo "<p style='color:red;'>$login_error</p>"; ?>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
                <i class="bx bx-user-circle"></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="remember-forget">
                <label><input type="checkbox"> Remember me</label>
                <a href="#">Forgot password?</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="register.php">Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>
